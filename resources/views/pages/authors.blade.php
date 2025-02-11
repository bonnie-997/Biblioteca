@extends('layouts.app')


@section('content')
    <h1>Ti presentiamo gli autori presenti nella biblioteca</h1>
        @foreach ($authors as $author)
            <p>{{ $author->name}}</p>
        @endforeach
@endsection