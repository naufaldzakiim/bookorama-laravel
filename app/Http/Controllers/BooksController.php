<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    function list(){
        $books = DB::select("SELECT b.isbn as isbn, b.author as author, b.title as title, c.name as category, b.price as price, b.stock as stock FROM books b, categories c WHERE b.categoryid = c.categoryid");

        return view('list.books', ['books' => $books]);
    }

    function detail($id){
        $book = DB::select("SELECT b.isbn as isbn, b.author as author, b.title as title, c.name as category, b.price as price, b.stock as stock FROM books b, categories c WHERE b.categoryid = c.categoryid AND b.isbn = ?", [$id]);
        
        $review = DB::select("SELECT * from book_reviews WHERE isbn = ?", [$id]);

        return view('detail.books', ['book' => $book[0], 'reviews' => $review]);
    }

    function add(){
        $categories = DB::select("SELECT * FROM categories");
        return view('add.books', ['categories' => $categories]);
    }
}
