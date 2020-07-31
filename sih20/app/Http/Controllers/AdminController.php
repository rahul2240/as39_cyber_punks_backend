<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use DataTables;

class AdminController extends Controller
{
    public function createNewUser()
    {
        return view('register');
    }

    public function storeNewUser(Request $request)
    {
        $vaidatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);


        $data = $request->all();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => isset($data['super_admin']) ? 1 : 0,
        ]);
        return back()->with(['msg' =>'User created successfully', 'class' => 'alert-success']);
    }

    public function listUsers()
    {
        return Datatables::of(User::query())
            ->editColumn('name', function (User $u) {
                return '<a href="'.url('user/'.$u->id).'" target="_blank"><u>'.$u->name.'</u><a>';
            })
            ->editColumn('created_at', function (User $u) {
                return $u->created_at->diffForHumans();
            })
            ->addColumn('action', function (User $u) {
                if ($u->id != Auth::id()) {
                    return '<a href="'.route('users.edit', $u->id).'" target="_blank" class="d-inline btn btn-primary">
                	<i class="fas fa-pencil-alt mr-1"></i> Edit</a> &nbsp;
                	<form action="'.route('users.destroy', $u->id).'" method="POST" class="d-inline-block" id="delete_user">
                    	'.csrf_field().'
                    	<input type="hidden" name="_method" value="DELETE">
                    	<button class="btn btn-danger" id="delete_user_button"><i class="fas fa-trash-alt mr-1"></i> Delete</button>
                	</form>';
                }
            })
            ->rawColumns([
                'name',
                'action'
            ])
            ->make(true);
    }

    public function editUser($id)
    {
        $user = User::find($id);
        if (isset($user)) {
            return view('edit_user', compact('user'));
        }
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        $vaidatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        if (isset($user)) {
            $user->name = $data['name'];
            $user->password = Hash::make($data['password']);
            $user->is_admin = isset($data['super_admin']) ? 1 : 0;
            $user->save();
        }
        return back()->with(['msg' =>'User details has been updated successfully', 'class' => 'alert-success']);
    }

    public function destroyUser($id)
    {
        $user  = User::find($id);
        if (isset($user)) {
            $user->delete();
        }
        return back()->with(['msg' =>'User deleted successfully', 'class' => 'alert-success']);
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        if (Hash::check($data['password_old'], $user->password)) {
            $vaidatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
            if (isset($user)) {
                $user->name = $data['name'];
                $user->password = Hash::make($data['password']);
                $user->is_admin = isset($data['super_admin']) ? 1 : 0;
                $user->save();
            }
        }
        return back()->with(['msg' =>'Profile updated successfully', 'class' => 'alert-success']);
    }
}
