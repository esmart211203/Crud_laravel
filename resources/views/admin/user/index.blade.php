<!-- index.blade.php -->
@extends('admin.base')
<!-- title -->
@section('title') Trang Quan ly @endsection 
<!-- breadcrumb --> 
@section('breadcrumb') User @endsection 
<!-- content --> 
@section('content')
<div class="container">
@if(session('success'))
    <div class="alert alert-primary" role="alert">{{ session('success') }}</div>
@endif
@if(session('destroy'))
    <div class="alert alert-danger" role="alert">{{ session('destroy') }}</div>
@endif
@if(session('update'))
    <div class="alert alert-info" role="alert">{{ session('update') }}</div>
@endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Avatar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($users))
                @foreach($users as $key => $user)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                        <img src="{{ asset('images/users/' . $user->avatar) }}" width="50px"class="img-thumbnail" alt="avatar">
                        </td>
                        <td>
                            <form action="{{route('user.destroy', $user->id)}}" method="post">
                                @csrf
                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-sm btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button onclick="confirmDelete()" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>  
                @endforeach
            @endif
        </tbody>
    </table>
    <a href="{{route('user.create')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-user-plus"></i></a>
</div>
<script>
    function confirmDelete() {
            var result = confirm("Bạn có chắc muốn xóa?");
            if (result) {
                document.getElementById("deleteForm").submit();
            } else {
            }
        }
</script>
@endsection