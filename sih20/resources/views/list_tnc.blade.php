@extends('layouts.dashboard')
@section('css')
<link href="{{ url('css/addons/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <p class="h1 text-center">All T&Cs <a href="{{ url('tnc/create') }}" class="btn blue-gradient btn-rounded waves-effect waves-light"><i class="fas fa-plus"></i>Create T&C</a></p>
        <table class="table table-bordered" id="table">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Title</th>
                 <th>Created</th>
                 <th>Action</th>
             </tr>
         </thead>
     </table>
 </div>
</div>
@endsection
@section('script')
<script src="{{ url('js/addons/datatables.min.js') }}"></script>
<script>
 $(function() {
   $('#table').DataTable({
       processing: true,
       serverSide: true,
       ajax: '{{ url('list_tnc_data') }}',
       columns: [
       { data: 'id', name: 'id' },
       { data: 'title', name: 'title' },
       { data: 'created_at', name: 'created_at' },
       { data: 'action', name: 'action' }
       ]
   });
});
</script>

@endsection