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
}
