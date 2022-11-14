
    <div class="modal" id="editModal{{$files->id}}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Atualizar {{$files->titulo}}</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <form action="{{route('put',[$files->id])}}" method="post" class="form-inline" enctype="multipart/form-data">
            @csrf
            @method('put')




        <div class="modal-body">
            <input type="text" class="form-control @error('autor') is-invalid @enderror" name="autor" id="" placeholder="Autor" value="{{$files->autor}}">
            @error('autor')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
         @enderror

          <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="" placeholder="Titulo" value="{{$files->titulo}}">
          @error('titulo')
          <div class="invalid-feedback">
             {{ $message }}
          </div>
       @enderror

          <input type="file" class="form-control @error('imagem') is-invalid @enderror" name="imagem" ref="{{$files->imagem}}">
          @error('imagem')
          <div class="invalid-feedback">
             {{ $message }}
          </div>
       @enderror

          <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="" cols="30" rows="10">{{$files->descricao}}</textarea>
          @error('descricao')
          <div class="invalid-feedback">
             {{ $message }}
          </div>
       @enderror
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </form>

      </div>
    </div>
  </div>
