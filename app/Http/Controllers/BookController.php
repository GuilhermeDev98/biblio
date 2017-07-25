<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index(){
    	$books = Book::paginate(30);
    	return view('book.index')
    			->with('books', $books);
    }

    public function create(){
    	return view('book.create');
    }

    public function store(BookRequest $request){
    	$request = $request->except('_token');

    	$create = Book::create($request);

    	if($create){
            $notification = array(
                'message' => 'Livro Adicionado !', 
                'alert-type' => 'success'
            );
            return redirect()->route('book.create')->with($notification);
    	}else{
            $notification = array(
                'message' => 'Livro não adicionado !', 
                'alert-type' => 'warning'
            );
            return redirect()->route('book.create')->with($notification);
    	}

    	return view('book.create');
    }

    public function edit(Book $book){
    	return view('book.edit')->with('book',$book);
    }

    public function update(Book $book, BookRequest $request){
    	$request = $request->except('_token');

    	$create = Book::where('id', $book->id)->update($request);

    	if($create){
            $notification = array(
                'message' => 'Livro editado !', 
                'alert-type' => 'success'
            );
            return redirect()->route('book.edit', $book->id)->with($notification);
    	}else{
            $notification = array(
                'message' => 'Livro não editado !', 
                'alert-type' => 'warning'
            );
            return redirect()->route('book.edit', $book->id)->with($notification);
    	}

    	$notification = array(
                'message' => 'Erro Desconhecido!', 
                'alert-type' => 'warning'
        );
        return redirect()->route('book.edit', $book->id)->with($notification);
    }

    public function destroy(Book $book){
    	Book::destroy($book->id);
    	$notification = array(
                'message' => 'Livro Apagado!', 
                'alert-type' => 'success'
        );
        return redirect()->route('book.index')->with($notification);
    }

    public function search(Request $request){
    	$searchs = Book::where('title','like','%'.$request->search.'%')
    				->OrWhere('author','like','%'.$request->search.'%')
			        ->paginate(20);
		return view('book.search')->with('searchs', $searchs);
    }

    public function ajaxSearch(Request $request){
        $searchs = Book::where('title','like','%'.$request->search.'%')
                    ->OrWhere('author','like','%'.$request->search.'%')
                    ->select(['id', 'title'])
                    ->get();

        return response()->json($searchs);
    }
}
