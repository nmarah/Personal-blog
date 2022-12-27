@extends('layouts.dashboard')
@section('title', 'Add Category')
@section('content')

    <form action="{{ route('dashboard.categories.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Catergory parent</label>
            <select name="parent_id" id="parent_id" class="form-control">
                 <option value="{{null}}">no parent</option>
                @foreach ($parents as $parent)
               
                <option value="{{$parent->id}}">{{$parent->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="disc" class="form-label">Discription</label>
            <input type="text" name="disc" id="disc" class="form-control">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" id="form-submit" class="site-btn">Send </button>
        </div>
    </form>
@endsection
