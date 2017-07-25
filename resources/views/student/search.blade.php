@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-heading">
            	<div class="pull-right">
            		<a href="{{route('student.index')}}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i></a>
            	</div>
            	Busca
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
                    @forelse($searchs as $search)
                        <tr>
                            <td>{{$search->id}}</td>
                            <td>{{$search->name}}</td>
                            <td>{{$search->group}}</td>
                            <td class="text-center">
                                <a href="{{route('student.edit', $search->id)}}" class="btn btn-xs btn-warning">Editar</a>
                                <a href="{{route('student.destroy', $search->id)}}" class="btn btn-xs btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-warning text-center">Nenhum aluno foi achado !</div>
                    @endforelse
                    </tbody>
                </table>
                <div class="text-center">
                    {{$searchs->links()}}
                </div>
            </div>
    	</div>
	</div>
    @include('book.modal.search')
@endsection
