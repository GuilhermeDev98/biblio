@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-heading">
            	<div class="pull-right">
            		<a href="{{route('student.index')}}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> </a>
            	</div>
            	Adicionar Aluno
            </div>

            <div class="panel-body">
                <form action="{{route('student.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="group">Série</label>
                        <input type="text" name="group" id="group" class="form-control" required>
                    </div>
                    <button class="btn btn-primary btn-block">Adicionar</button>
                </form>
            </div>
    	</div>
	</div>
@endsection
