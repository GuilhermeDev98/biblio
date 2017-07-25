@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-heading">
            	<div class="pull-right">
            		<a href="{{route('student.create')}}" class="btn btn-xs btn-primary">Cadastrar Aluno</a>
                    <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalStudentSearch"><i class="fa fa-search"></i></a>
            	</div>
            	Alunos
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nome</td>
                            <td>Série</td>
                            <td class="text-center"><i class="fa fa-cogs"></i></td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->group}}</td>
                            <td class="text-center">
                                <a href="{{route('student.edit', $student->id)}}" class="btn btn-xs btn-warning">Editar</a>
                                <a href="{{route('student.destroy', $student->id)}}" class="btn btn-xs btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-warning text-center">Nenhum Aluno Adicionado !</div>
                    @endforelse
                    </tbody>
                </table>
                <div class="text-center">{{$students->links()}}</div>
            </div>
    	</div>
	</div>
    @include('student.modal.search')
@endsection
