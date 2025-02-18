<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::get('/', function (){
    $books = DB::select("SELECT books.id, books.title, authors.name AS author, books.year, books.available
                        FROM books
                        JOIN authors ON books.author_id = authors.id");
    return view('pages.Home', ['books' => $books]);
});

Route::get('/books/{id}', function ($id) {
    $book = DB::select("SELECT books.id, books.title, authors.name AS author, books.year, books.available
                            FROM books
                            JOIN authors ON books.author_id = authors.id
                            WHERE books.id = ?", [$id]);
    return view('pages.show', ['book' => $book[0]]);
});

Route::get('/create', function () {
    $authors = DB::select("SELECT id, name FROM authors"); // Recupera gli autori dal DB
    return view('pages.create', ['authors' => $authors]);
});

Route::post('/create', function (Request $request) {
    $title = $request->input('title');
    $author_name = $request->input('author'); // Nome dell'autore inserito dall'utente
    $year = $request->input('year');

    // Controlla se l'autore esiste già
    $author = DB::selectOne("SELECT id FROM authors WHERE name = ?", [$author_name]);

    if (!$author) {
        // Se l'autore non esiste, lo inserisce e ne prende l'ID
        DB::insert("INSERT INTO authors (name) VALUES (?)", [$author_name]);
        $author_id = DB::getPdo()->lastInsertId(); // Recupera l'ID appena creato
    } else {
        $author_id = $author->id;
    }

    // Inserisce il nuovo libro con l'ID dell'autore
    DB::insert("
        INSERT INTO books (title, author_id, year, available)
        VALUES (?, ?, ?, ?)
    ", [$title, $author_id, $year, 1]);

    return redirect('/')->with('success', 'Libro aggiunto con successo!');
});


/* Route::get('/author', function () {
    $authors = DB:: select('SELECT * FROM authors');
    return view('authors.index', ['authors' => $authors]);
});

Route::get('/loans/{id}', function ($id) {
    $loans = DB::select("SELECT loans.id, books.title, loans.borrower_name, loans.borrower_at, loans.return_date
                        FROM loans
                        JOIN books ON loans.book_id = books.id");
    return view('loans.index', ['loans' => $loans]);
}); */