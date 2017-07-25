@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-heading">
            	<div class="pull-right">
            		<a href="{{route('book.create')}}" class="btn btn-xs btn-primary">Adicionar Livro</a>
                    <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modalBookSearch"><i class="fa fa-search"></i></a>
            	</div>
            	Livros
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Nome</td>
                            <td>Author</td>
                            <td class="text-center"><i class="fa fa-cogs"></i></td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td class="text-center">
                                <a href="{{route('book.edit', $book->id)}}" class="btn btn-xs btn-warning">Editar</a>
                                <a href="{{route('book.destroy', $book->id)}}" class="btn btn-xs btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-warning text-center">Nenhum Livro Adicionado !</div>
                    @endforelse
                    </tbody>
                </table>
            </div>
    	</div>
	</div>
    @include('book.modal.search')
@endsection