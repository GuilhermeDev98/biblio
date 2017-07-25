@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-heading">
            	<div class="pull-right">
            		<a href="{{route('book.create')}}" class="btn btn-xs btn-primary">Cadastrar Aluno</a>
                    <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalBookSearch"><i class="fa fa-search"></i></a>
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
                    @forelse($users as $user)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->group}}</td>
                            <td class="text-center">
                                <a href="" class="btn btn-xs btn-warning">Editar</a>
                                <a href="" class="btn btn-xs btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-warning text-center">Nenhum Aluno Adicionado !</div>
                    @endforelse
                    </tbody>
                </table>
                <div class="text-center">{{$users->links()}}</div>
            </div>
    	</div>
	</div>
    @include('book.modal.search')
@endsection
