@extends('layouts.dashboard')
@section('title', 'Personal Data')
@section('content')

@if(session()->has('message'))

<div class="alert alert-success ">
     <button type="button" class="close" data-dismiss="alert">x</button>
     {{session()->get('message')}}
</div>
@endif
<table class="table">

    <tbody>
        @foreach ($about as $info)
            <tr>
                <th>Name</th>
                <td>{{$info->full_name}}</td>
                
            </tr>
            <tr>
                <th>Image</th>
                <td><img src="{{Storage::disk('local')->url($info->image) }}" width="50" height="50"></td>
                
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$info->email }}</td>
                
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$info->address }}</td>
                
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$info->phone }}</td>
                
            </tr>
            <tr>
                <th>About me</th>
                <td>{{$info->about_me }}</td>
                
            </tr>
            <tr>

                <th rowspan="5">Social links</th>
                <tr><td><b>Facebook:</b> <a href="{{$info->facebook }}">{{$info->facebook }}</a></td></tr>
                <tr><td><b>Twitter:</b> <a href="{{$info->twitter }}">{{$info->twitter }}</a></td></tr>
                <tr><td><b>Instagram:</b> <a href="{{$info->instagram }}">{{$info->instagram }}</a></td></tr>
                <tr><td><b>Linkedin:</b> <a href="{{$info->linkedin }}">{{$info->linkedin }}</a></td></tr>
                   
            </tr>
        @endforeach
    </tbody>
    
</table>
<center>
    <div class="mb-4">
        <a href="{{route('dashboard.edit',$info->id)}}" class="btn  btn-outline-primary">Edit</a>
    </div>
</center>

    
@endsection