<div class="modal fade" id="modalStudentSearch" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Busca</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('student.search')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <label for="search">Nome do Aluno ou Série</label>
            <input type="text" name="search" id="search" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-block btn-primary">Procurar</button>
        </form>
      </div>
    </div>
  </div>
</div>