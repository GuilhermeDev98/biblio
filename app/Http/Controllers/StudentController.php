<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\User;

class StudentController extends Controller
{
    public function index(){
    	$students = User::where('status', 'student')->paginate(20);

    	return view('student.index')
    			->with('students', $students);
    }

    public function create(){
    	return view('student.create');
    }

    public function store(StudentRequest $request){
    	$student = new User;
    	$student->name = $request->name;
    	$student->group = $request->group;
    	$student->status = 'student';
    	$student->save();

    	if($student){
    		$notification = array(
				'message' => 'Aluno Criado', 
				'alert-type' => 'success'
			);
    		return redirect()->route('student.create')->with($notification);
    	}else{
    		$notification = array(
				'message' => 'Não foi Possível Adicionar o Aluno!', 
				'alert-type' => 'error'
			);
    		return redirect()->route('student.create')->with($notification);
    	}

    	$notification = array(
				'message' => 'Erro Desconhecido !', 
				'alert-type' => 'error'
		);
    	return redirect()->route('student.create')->with($notification);
    }

    public function edit(User $user){
    	return view('student.edit')
    			->with('student', $user);
    }

    public function update(User $user, StudentRequest $request){
    	$request = $request->except('_token');

    	$student = User::where('id', $user->id)->update($request);

    	if($student){
    		$notification = array(
				'message' => 'Aluno Editado!', 
				'alert-type' => 'success'
			);
			return redirect()->route('student.edit', $user->id)->with($notification);
    	}else{
    		$notification = array(
				'message' => 'Não foi Possível Editar o Aluno, Tente Novamente Mais Tarde !', 
				'alert-type' => 'error'
			);
			return redirect()->route('student.edit', $user->id)->with($notification);
    	}

    	$notification = array(
				'message' => 'Erro Desconhecido !', 
				'alert-type' => 'error'
		);
    	return redirect()->route('student.index')->with($notification);
    }

    public function destroy(User $user){
    	User::destroy($user->id);
    	$notification = array(
				'message' => 'Aluno Apagado !', 
				'alert-type' => 'success'
			);
			return redirect()->route('student.index')->with($notification);
    }

    public function search(Request $request){
    	$searchs = User::where([['name','like','%'.$request->search.'%'], ['status' ,'=', 'student']])
    				->OrWhere([['group','like','%'.$request->search.'%'], ['status', '=', 'student']])
			        ->paginate(20);
		return view('student.search')->with('searchs', $searchs);
    }

    public function ajaxSearch(Request $request){
        $searchs = User::where([['name','like','%'.$request->search.'%'], ['status' ,'=', 'student']])
                    ->OrWhere([['group','like','%'.$request->search.'%'], ['status', '=', 'student']])
                    ->select(['id', 'name'])
                    ->get();
        return response()->json($searchs);
    }
}
