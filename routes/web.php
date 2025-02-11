<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/author', function () {
    $authors = DB:: select('SELECT * FROM authors');
    return view('authors.index', ['authors' => $authors]);
});

Route::get('/loans/{id}', function ($id) {
    $loans = DB::select("SELECT loans.id, books.title, loans.borrower_name, loans.borrower_at, loans.return_date
                        FROM loans
                        JOIN books ON loans.book_id = books.id");
    return view('loans.index', ['loans' => $loans]);
});