<!-- resources/views/animals/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Animal Details</h1>
    
    <p>Species: {{ $animal->species }}</p>
    <p>Gender: {{ $animal->gender }}</p>
    @if ($animal->profile_image)
        <img src="{{ asset($animal->profile_image) }}" alt="Profile Image">
    @endif
@endsection
