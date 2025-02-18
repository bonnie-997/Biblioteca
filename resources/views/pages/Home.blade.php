@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <p class="text-3xl font-bold text-center text-white">Benvenuto nella nostra Biblioteca!</p>
    <p class="text-xl font-bold mt-10 text-white text-center">I nostri libri</p>
        @foreach ($books as $book)
            <div class="my-5 flex flex-row gap-4 items-center">
                <p>{{ $book->title }} - {{ $book->author}}</p>
                <a href="/books/{{$book->id}}" class="text-white">Dettagli</a>
            </div>
        @endforeach
        <div class="flex justify-center mt-10">
            <a href="/create" class="btn btn-primary text-white rounded">
                + Aggiungi Libro
            </a>
        </div>
    
</div>
@endsection