<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Access;
use App\Tnc;
use Auth;
use DataTables;
use App\User;

class TncController extends Controller
{
    public function create(Request $request)
    {
        $vaidatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            ]);
        $data = $request->all();
        $tnc = Tnc::create([
            'title' => $data['title'],
            'user_id' => Auth::id(),
        ]);

        $etherpad = new \EtherpadLite\Client(config('etherpad.api_key'), config('etherpad.url'));
        $authorID = $etherpad->createAuthorIfNotExistsFor(Auth::id(), Auth()->user()->name)->getData('authorID');
        $groupID = $etherpad->createGroupIfNotExistsFor($tnc->id)->getData('groupID');
        $etherpad->createGroupPad($groupID, 'node');
        $padID = $groupID . '$node';
        $readOnlyID = $etherpad->getReadOnlyID($padID)->getData('readOnlyID');
        $sessionTime = time() + 24 * 60 * 60;
        $sessionID = $etherpad->createSession($groupID, $authorID, $sessionTime)->getData('sessionID');
        $host = parse_url(config('etherpad.url'), PHP_URL_HOST);
        setcookie('sessionID', $sessionID, $sessionTime, '/', $host);

        $tnc->pad_id = $padID;
        $tnc->pad_read_id = $readOnlyID;
        $tnc->save();

        Access::create([
            'tnc_id' => $tnc->id,
            'user_id' => Auth::id(),
            'access' => 3,
        ]);

        return redirect('tnc/'.$tnc->id);
    }

    public function show($id)
    {
        $access = Access::select('access')->where('user_id', Auth::id())->where('tnc_id', $id)->first()->access;
        $users = User::where('id', '<>', Auth::id());
        $user_ids = $users->pluck('id')->toArray();

        $user_ids_with_access = Access::where('tnc_id', $id)->pluck('user_id')->toArray();
        $user_ids_not_given_access = array_diff($user_ids, $user_ids_with_access);
        $users_not_given_access = User::where('id', '<>', Auth::id())->whereIn('id', $user_ids_not_given_access)->get();
        $users_with_access = $users->whereIn('id', $user_ids_with_access)->get();
        $tnc = Tnc::find($id);
        $padID = $tnc->pad_id;
        if ($access == 2 || $access == 3 || Auth::user()->is_admin == 1) {
            $etherpad = new \EtherpadLite\Client(config('etherpad.api_key'), config('etherpad.url'));
            $authorID = $etherpad->createAuthorIfNotExistsFor(Auth::id(), Auth()->user()->name)->getData('authorID');
            $groupID = $etherpad->createGroupIfNotExistsFor($id)->getData('groupID');
            $sessionTime = time() + 24 * 60 * 60;
            $sessionID = $etherpad->createSession($groupID, $authorID, $sessionTime)->getData('sessionID');
            $host = parse_url(config('etherpad.url'), PHP_URL_HOST);
            setcookie('sessionID', $sessionID, $sessionTime, '/', $host);
        } else {
            $padID = $tnc->pad_read_id;
        }
        return view('tnc_show', [
            'access' => $access,
            'padID' => $padID,
            'title' => $tnc->title,
            'users_not_given_access' => $users_not_given_access,
            'users_with_access' => $users_with_access,
            'tnc_id'   => $id,
        ]);
    }

    public function listTncs()
    {
        if (Auth::user()->is_admin != 1) {
            $tnc = Tnc::whereIn('id', Access::select('tnc_id')->where('user_id', Auth::id())->get()->toArray())->get();
        } else {
            $tnc = Tnc::get();
        }
        return Datatables::of($tnc)
            ->editColumn('title', function (Tnc $t) {
                return '<a href="'.url('tnc/'.$t->id).'" target="_blank"><u>'.$t->title.'</u><a>';
            })
            ->editColumn('created_at', function (Tnc $t) {
                return $t->created_at->diffForHumans();
            })
            ->addColumn('action', function (Tnc $t) {
                return '<a href="'.route('tncs.edit', $t->id).'" target="_blank" class="d-inline btn btn-primary">
            	<i class="fas fa-pencil-alt mr-1"></i> Edit Title</a> &nbsp;
            	<form action="'.route('tncs.destroy', $t->id).'" method="POST" class="d-inline-block">
                	'.csrf_field().'
                	<input type="hidden" name="_method" value="DELETE">
                	<button class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i> Delete</button>
            	</form>';
            })
            ->rawColumns([
                'title',
                'action'
            ])
            ->make(true);
    }

    public function editTnc($id)
    {
        $tnc = Tnc::find($id);
        if (isset($tnc)) {
            return view('tnc_edit', compact('tnc'));
        }
    }

    public function updateTnc(Request $request, $id)
    {
        $tnc = Tnc::find($id);
        $data = $request->all();
        $vaidatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            ]);
        if (isset($tnc)) {
            $tnc->title = $data['title'];
            $tnc->save();
        }
        return redirect(url('/tncs'))->with(['msg' =>'Tnc details has been updated successfully', 'class' => 'alert-success']);
    }

    public function destroyTnc($id)
    {
        $tnc  = Tnc::find($id);
        if (isset($tnc)) {
            $tnc->delete();
        }
        return back()->with(['msg' =>'Tnc deleted successfully', 'class' => 'alert-success']);
    }

    public function grantAccess(Request $request, $id)
    {
        if (isset($request->users)) {
            foreach ($request->users as $user_id) {
                $access = new Access;
                $access->tnc_id = $id;
                $access->user_id = $user_id;
                $access->access = $request->access;
                $access->save();
            }
        }
        return back()->with(['msg' =>'Tnc access rights has been updated successfully', 'class' => 'alert-success']);
    }

    public function updateAccess(Request $request, $id)
    {
        foreach ($request->access as $user_id => $access_id) {
            $access = Access::where('tnc_id', $id)->where('user_id', $user_id);
            if ($access_id == 0) {
                $access->delete();
            } else {
                $access->update(['access' => $access_id]);
            }
        }
        return back()->with(['msg' =>'Tnc access rights has been updated successfully', 'class' => 'alert-success']);
    }
}
