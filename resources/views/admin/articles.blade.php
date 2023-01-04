@extends('layouts.dashboard')
@section('title', 'Articles')
@section('content')

@if(session()->has('message'))

<div class="alert alert-success ">
     <button type="button" class="close" data-dismiss="alert">x</button>
     {{session()->get('message')}}
</div>
@endif
    <form action="{{ route('dashboard.articles.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <?php foreach ($parents as $category): ?>
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="disc">Description</label>
            <textarea name="disc" id="disc" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <div class="form-group">
                <label for="video">Video</label>
                <input type="file" name="video" id="video" class="form-control">
            </div>
            <div class="form-group">
                <label for="video">File</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
