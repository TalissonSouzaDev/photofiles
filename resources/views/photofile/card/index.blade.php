
<div class="container">
    <h2>{{$files->titulo}}</h2>
    <div class="card" style="width:600px">
      <img class="card-img-top" src='{{asset("storage/$files->imagem")}}' alt="Card image" style="width:100%; height:300px">
      <div class="card-body">
        <i class="card-title"><b>Autor</b> {{$files->autor}}</i>
        <p class="card-text"><b>Descrição:</b>  {{$files->descricao}}</p>

        <div class="flex-button">


        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{$files->id}}">Edita</a>


        <form action="{{route('destroy',[$files->id])}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>

      </div>
    </div>
