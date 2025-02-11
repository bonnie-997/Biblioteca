@extends('layouts.app')

@section('content')
<h1 class="text-xl">{{ $book->title }}</h1>
<p>Autore: {{ $book->author }}</p>
<p>Anno di pubblicazione: {{ $book->year}}</p>
<p>Disponibilita: {{ $book->available ? 'Disponibile' : 'Non disponibile'}}</p>
<a href="/">Torna alla Homepage</a>
@endsection