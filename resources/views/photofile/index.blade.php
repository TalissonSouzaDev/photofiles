
@extends('photofile.corpo.index')
@section('titulo')
@section('header')
@include('photofile.header.index')

@stop

@section('body')
@include('photofile.alert.index')
    @foreach($photofile as $files)
    <div class="elemento">
    @component('photofile.card.index',['files'=>$files])@endcomponent
     </div>
    @include('photofile.Modal.edit')
    @endforeach


@include('photofile.Modal.index')

<div class="paginate">
{{$photofile->links()}}
</div>



@endsection
