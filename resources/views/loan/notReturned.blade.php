@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-heading">
                Empréstimos Vencidos
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Aluno</td>
                            <td>Livro</td>
                            <td>Data do Empréstimo</td>
                            <td>Data de Devolução</td>
                            <td class="text-center"><i class="fa fa-cogs"></i></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($loans as $loan)
                            <tr>
                                <td>{{$loan->id}}</td>
                                <td>{{$loan->user->name}}</td>
                                <td>{{$loan->book->title}}</td>
                                <td>{{$loan->loan_date}}</td>
                                <td>{{$loan->return_date}}</td>
                                <td class="text-center">
                                    <a href="{{route('loan.returned', $loan->id)}}" class="btn btn-xs btn-success">Devolvido</a>
                                    <a href="{{route('loan.destroy', $loan->id)}}" class="btn btn-xs btn-danger">Apagar</a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-warning text-center">Nenhum Empréstimo Vencido!</div>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center">{{$loans->links()}}</div>
            </div>
    	</div>
	</div>
    @include('book.modal.search')
@endsection
