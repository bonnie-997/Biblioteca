@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Aggiungi un Nuovo Libro</h1>

        <form action="/create" method="POST" class="bg-white p-6 rounded shadow">
            @csrf

            <label class="block mb-2">Titolo</label>
            <input type="text" name="title" class="w-full p-2 border rounded mb-4" required>

            <label class="block mb-2">Autore</label>
            <input type="text" name="author" id="author" class="w-full p-2 border rounded mb-4"/>

            <label class="block mb-2">Anno di Pubblicazione</label>
            <input type="number" name="year" class="w-full p-2 border rounded mb-4" required min="1000" max="{{ date('Y') }}">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Salva Libro
            </button>
        </form>
    </div>
@endsection