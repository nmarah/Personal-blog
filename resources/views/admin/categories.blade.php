@extends('layouts.dashboard')
@section('title','Categories')
@section('content')

@if(session()->has('message'))

<div class="alert alert-success ">
     <button type="button" class="close" data-dismiss="alert">x</button>
     {{session()->get('message')}}
</div>
@endif

<div class='mb-4'>
    <a href="{{ route('dashboard.categories.create') }}" class="btn btn-outline-primary">
        <i class="fa fa-plus">NEW</i></a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Title</th>
            <th>Discription</th>
            <th>Image</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_name }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->disc }}</td>
                <td>
                    @if($category->image)
                    <img src="{{Storage::disk('local')->url($category->image) }}" width="70" height="70">
                    @endif
                </td>
            
                <td>
                    <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('dashboard.categories.delete',$category->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i>-Delete
                        </button>

                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection