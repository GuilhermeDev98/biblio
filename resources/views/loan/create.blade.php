@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-heading">
            	<div class="pull-right">
            		<a href="{{route('loan.index')}}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> </a>
            	</div>
            	Novo Empréstimo
            </div>

            <div class="panel-body">
                <form action="{{route('loan.create')}}" id="createLoan" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="book_search" id="book_search" placeholder="Nome do Livro" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6" id="book_search_result_div">
                            <select name="book" id="book" class="form-control">
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="student_search" id="student_search" placeholder="Nome do Aluno" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <select name="student" id="student" class="form-control">
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="created_at">Data do Empéstimo</label>
                                <input type="text" name="created_at" id="created_at" value="{{$loanDate}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="return_date">Data de Devolução</label>
                                <input type="text" name="return_date" id="return_date" value="{{$returnDate}}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block">Fazer Empréstimo</button>
                </form>
            </div>
    	</div>
	</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#createLoan').on('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) { 
                    e.preventDefault();
                    return false;
                }
            });
            $("#book_search").keyup(function(e) {
                console.log('hello');
                e.preventDefault();
                if(e.keyCode == 13)
                {
                    var search = $("#book_search").val();

                    var data = "&search=" + search;

                    $.ajax({
                        'url': '{{route('book.ajaxSearch')}}',
                        'method': 'post',
                        'data': data,
                        'success': function(data){
                            var options = '';    
                            $.each(data, function (key, val) {
                                options += '<option value="'+ val.id +'">'+ val.title +'</option>';
                            });
                            $("#book").empty();  
                            $("#book").append(options);
                        }
                    });
                }
            });

            $("#student_search").keyup(function(e) {
                e.preventDefault();
                if(e.keyCode == 13)
                {
                    var search = $("#student_search").val();

                    var data = "&search=" + search;

                    $.ajax({
                        'url': '{{route('student.ajaxSearch')}}',
                        'method': 'post',
                        'data': data,
                        'success': function(data){
                            var options = '';    
                            $.each(data, function (key, val) {
                                options += '<option value="'+ val.id +'">'+ val.name +'</option>';
                            });
                            $("#student").empty();        
                            $("#student").append(options);
                        }
                    });
                }
            });
        });
    </script>
@endsection
