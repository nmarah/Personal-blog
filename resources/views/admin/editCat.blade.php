@extends('layouts.dashboard')
@section('title','Edit Category')
@section('content')

 
<form action="{{ route('dashboard.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
<table class="table">

    <tbody>
       
            <tr>
                <th>Name</th>
                <td><input name="name" type="text" value="{{$category->name}}"></td>
                
            </tr>
            <tr>
                <th>Parent</th>
                
                <td>
                    <div class="mb-3">

                        <select name="parent_id" id="parent_id" class="form-control">
                            @foreach ($parents as $parent)
                            <option value="{{$parent->id}}">{{$parent->name}}</option>
            
                            @endforeach
                        </select>
                    </div>
                </td>
                
            </tr>
            <tr>
                <th>Title</th>
                <td><input name="title" type="text" value="{{$category->title }}"></td>
                
            </tr>
            <tr>
                <th>Image</th>
                <td><input name="image" type="file" value="{{$category->image }}"></td>
                
            </tr>
          
            <tr>
                <th>Discription</th>
                <td><input name="disc" type="text" value="{{$category->disc }}"></td>
                
            </tr>

    </tbody>
    
</table>
<center>
    <div class="mb-4">
         <button type="submit" id="form-submit" class="btn  btn-outline-primary">Update</button>
        </div>
    </center>
</form>
@endsection