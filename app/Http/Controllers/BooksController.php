<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    function list()
    {
        $books = DB::select("SELECT b.isbn as isbn, 
                            b.author as author, 
                            b.title as title, 
                            c.name as category, 
                            b.price as price, 
                            b.stock as stock 
                            FROM books b, 
                            categories c WHERE b.categoryid = c.categoryid");

        return view('list.books', ['books' => $books]);
    }

    function detail($id)
    {
        $book = DB::select("SELECT b.isbn as isbn, b.author as author, b.title as title, c.name as category, b.price as price, b.stock as stock FROM books b, categories c WHERE b.categoryid = c.categoryid AND b.isbn = ?", [$id]);

        $review = DB::selectOne("SELECT * from reviews WHERE isbn = ?", [$id]);

        return view('detail.books', ['book' => $book[0], 'book_review' => $review]);
    }

    function review($id)
    {
        DB::table('reviews')->upsert([
            'isbn' => $id,
            'review' => request()->review
        ], ['isbn'], ['review']);

        return redirect()->route('books.detail', ['id' => $id]);
    }

    function viewAdd()
    {
        $categories = Categories::all();
        return view('add.books', ['categories' => $categories]);
    }

    function add()
    {
        // validate the input
        $validator = Validator::make(request()->all(), [
            'isbn' => 'required|string|unique:books,isbn',
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'categoryid' => 'required|numeric'
        ]);
        // if validation fails, it will redirect to the previous page
        // with the old input, and error messages
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // if validation passes, it will proceed to the next code
        DB::table('books')->insert([
            'isbn' => request()->isbn,
            'title' => request()->title,
            'author' => request()->author,
            'price' => request()->price,
            'stock' => request()->stock,
            'categoryid' => request()->categoryid
        ]);

        return redirect()->route('books.list');
    }

    function update($isbn)
    {

        // validate the input
        $validator = Validator::make(request()->all(), [
            'isbn' => 'required|string',
            'title' => 'required|string',
            'author' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'categoryid' => 'required|numeric'
        ]);

        $count_isbn = DB::table('books')->where('isbn', '=', $isbn)->count();
        if ($count_isbn == 0) {
            return redirect()->route('books.list');
        }

        // if validation fails, it will redirect to the previous page
        // with the old input, and error messages
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // if validation passes, it will proceed to the next code

        $data = [
            'isbn' => request()->isbn,
            'title' => request()->title,
            'author' => request()->author,
            'price' => request()->price,
            'stock' => request()->stock,
            'categoryid' => request()->categoryid
        ];
        DB::table('books')->where('isbn', '=', $isbn)->update($data);

        return redirect()->route('books.list');
    }
    function viewUpdate($id)
    {
        $book = DB::select("SELECT b.isbn as isbn, b.author as author, b.title as title,b.categoryid as categoryid, c.name as category, b.price as price, b.stock as stock FROM books b, categories c WHERE b.categoryid = c.categoryid AND b.isbn = ?", [$id]);

        $categories = DB::select("SELECT * FROM categories");

        return view('update.books', ['book' => $book[0], 'categories' => $categories]);
    }
    function delete($id)
    {
        DB::table('books')->where('isbn', '=', $id)->delete();
        return redirect()->route('books.list');
    }
}
