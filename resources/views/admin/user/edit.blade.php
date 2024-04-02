<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title') Trang Quan ly @endsection 
<!-- breadcrumb --> 
@section('breadcrumb') User @endsection 
<!-- content --> 
@section('content')
<div class="container">
    <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ip_name">Username</label>
            <input type="text" class="form-control" name="name" id="ip_name"  value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="ip_email">Email</label>
            <input type="email" class="form-control" name="email" id="ip_email" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="ip_phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="ip_phone" value="{{$user->phone}}"> 
        </div>

        <div class="form-group">
            <label for="ip_password">Password</label>
            <input type="password" class="form-control" name="password" id="ip_password" value="{{$user->password}}">
        </div>
        <div class="row">
            <div class="col-md-8"> 
                <div class="form-group">
                    <label for="ip_avatar">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <img src="{{ asset('images/users/' . $user->avatar) }}" width="100px"class="img-thumbnail" alt="avatar">
            </div>
            <div class="col-md-4">        
            <label for="ip_avatar">Role</label>
                <select class="form-control" name="role">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
    </form>
</div>
@endsection