@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <p class="h1 text-center">Create new Terms & Condition</p>
        <form method="POST" action="{{ route('tnc_create') }}">
            @csrf
            <div class="md-form">
                <i class="fas fa-user prefix"></i>
                <input type="text" id="orangeForm-name" class="form-control @error('title') is-invalid @enderror" name="title" required>
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="orangeForm-name">Title</label>
            </div>
            <div class="text-center">
                <button class="btn btn-indigo btn-rounded mt-5">Create new Terms & Condition</button>
            </div>
        </form>
    </div>
</div>

@endsection