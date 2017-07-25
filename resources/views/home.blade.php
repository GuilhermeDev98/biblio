@extends('layouts.app')

@section('content')
<div class="col-md-4">
    <div class="panel panel-danger">
        <div class="panel-heading">Empréstimos Vencidos</div>

        <div class="panel-body text-center">
            <a href="{{route('loan.notReturned')}}">
            	<i class="fa fa-exclamation fa-2x"></i> {{$notReturned}} Vencidos
            </a>
       	</div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-success">
        <div class="panel-heading">Livros Cadastrados</div>

        <div class="panel-body text-center">
            <i class="fa fa-book fa-2x"></i> {{$books}}
       	</div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-success">
        <div class="panel-heading">Alunos Cadastrados</div>

        <div class="panel-body text-center">
            <i class="fa fa-users fa-2x"></i> {{$users}}
       	</div>
    </div>
</div>
@endsection
