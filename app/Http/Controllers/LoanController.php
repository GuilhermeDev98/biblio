<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use Carbon\Carbon;
use App\Http\Requests\LoanRequest;

class LoanController extends Controller
{
    public function index(){
    	$loans = Loan::where('status', 0)->orderBy('created_at', 'desc')->paginate(20);

    	return view('loan.index')->with('loans', $loans);
    }

    public function create(){
    	$c = Carbon::now();

    	$loanDate = $c->format('Y-m-d');
    	$returnDate = $c->addDays(7)->format('Y-m-d');

    	return view('loan.create')
    			->with('loanDate', $loanDate)
    			->with('returnDate', $returnDate);
    }

    public function store(LoanRequest $request){

        $loan = new Loan();
        $loan->book_id = $request->book;
        $loan->user_id = $request->student;
        $loan->loan_date = Carbon::parse($request->created_at);
        $loan->return_date = $request->return_date;
        $loan->save();

        if($loan){
            $notification = array(
                'message' => 'Empréstimo Feito com Sucesso !', 
                'alert-type' => 'success'
            );
            return redirect()->route('loan.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Não foi possível fazer o empréstimo !', 
                'alert-type' => 'error'
            );
            return redirect()->route('loan.create')->with($notification);
        }

        $notification = array(
                'message' => 'Erro Desconehcido !', 
                'alert-type' => 'error'
            );
            return redirect()->route('loan.create')->with($notification);
    }

    public function destroy(Loan $loan){
        Loan::destroy($loan->id);
        $notification = array(
                'message' => 'Empréstimo Apagado !', 
                'alert-type' => 'success'
            );
        return redirect()->route('loan.index')->with($notification);
    }

    public function notReturned(){

        $date = Carbon::now()->format('Y-m-d');
        $loans = Loan::where([['return_date', '<=', $date], ['status', 0]])->orderBy('created_at', 'asc')->paginate(20);

        return view('loan.notReturned')
                ->with('loans', $loans);
    }

    public function returned(Loan $loan){
        
        $loan->status = 1;
        $loan->save();

        if($loan){
            $notification = array(
                'message' => 'Livro Devolvido !', 
                'alert-type' => 'success'
            );
            return redirect()->route('loan.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Livro Não Devolvido !', 
                'alert-type' => 'error'
            );
            return redirect()->route('loan.index')->with($notification);
        }

        $notification = array(
                'message' => 'Erro Desconhecido !', 
                'alert-type' => 'success'
        );
        return redirect()->route('loan.index')->with($notification);
    }
}
