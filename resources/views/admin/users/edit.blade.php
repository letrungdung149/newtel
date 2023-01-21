@extends('layouts.app')
@section('content')
<form action="/admin/user-update/{{ $user->id }}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="Name"
            placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection