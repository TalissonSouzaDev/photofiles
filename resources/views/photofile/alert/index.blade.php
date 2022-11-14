@if($errors->any())

@foreach($errors->all() as $error)
<div class="alert alert-danger">
    <strong>{{$error}}</strong>
  </div>
@endforeach
@endif

@if(session('sucesso'))
<div class="alert alert-success fade in">
    <strong>{{session('sucesso')}}</strong>
  </div>
@endif
