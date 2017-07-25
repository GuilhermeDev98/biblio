@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-heading">
            	<div class="pull-right">
            		<a href="{{route('book.index')}}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> </a>
            	</div>
            	Adicionar Livro
            </div>

            <div class="panel-body">
                <form action="{{route('book.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Autor</label>
                        <input type="text" name="author" id="author" class="form-control" required>
                    </div>
                    <button class="btn btn-primary btn-block">Adicionar</button>
                </form>
            </div>
    	</div>
	</div>
@endsection
