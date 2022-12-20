@extends('layouts.dashboard')
@section('title','ASks')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Ask no.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($asks as $ask)
            <tr>
                <td>{{ $ask->id }}</td>
                <td>{{ $ask->name }}</td>
                <td>{{ $ask->email }}</td>
                <td>{{ $ask->subject }}</td>
                <td>{{ $ask->message }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
