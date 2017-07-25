<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Loan;
use App\Book;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now()->format('Y-m-d');
        $loans = Loan::where([['return_date', '<=', $date], ['status', 0]])->count();

        $users = User::all()->count();
        $books = Book::all()->count();

        return view('home')
                ->with('notReturned', $loans)
                ->with('users', $users)
                ->with('books', $books);
    }
}
