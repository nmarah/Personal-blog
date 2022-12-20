@extends('layouts.dashboard')
@section('title','Edit')
@section('content')
@foreach ($about as $info)
<form action="{{ route('dashboard.update',$info->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
<table class="table">

    <tbody>
       
            <tr>
                <th>Name</th>
                <td><input name="name" type="text" value="{{$info->full_name}}"></td>
                
            </tr>
            <tr>
                <th>Image</th>
                <td><input name="image" type="file" value="{{$info->image }}"></td>
                
            </tr>
            <tr>
                <th>Email</th>
                <td><input name="email" type="email" value="{{$info->email }}"></td>
                
            </tr>
            <tr>
                <th>Address</th>
                <td><input name="address" type="text" value="{{$info->address }}"></td>
                
            </tr>
            <tr>
                <th>Phone</th>
                <td><input name="phone" type="number" value="{{$info->phone }}"></td>
                
            </tr>
            <tr>
                <th>About me</th>
                <td><input name="about_me" type="text" value="{{$info->about_me }}"></td>
                
            </tr>
            <tr>

                <th rowspan="5">Social links</th>
                <tr><td><b>Facebook:</b> <input name="facebook" type="text" value="{{$info->facebook }}"></td></tr>
                <tr><td><b>Twitter:</b> <input name="twitter" type="text" value="{{$info->twitter }}"></td></tr>
                <tr><td><b>Instagram:</b> <input name="instagram" type="text" value="{{$info->instagram }}"></td></tr>
                <tr><td><b>Linkedin:</b> <input name="linkedin" type="text" value="{{$info->linkedin }}"></td></tr>
                   
            </tr>
        @endforeach
    </tbody>
    
</table>
<center>
    <div class="mb-4">
         <button type="submit" id="form-submit" class="btn  btn-outline-primary">Update</button>
        </div>
    </center>
</form>
@endsection