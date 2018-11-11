@extends('layouts.app')

@section('mobile-title')
<section class="nav-center">
    <h4 class="title">{{--{{ __('Login') }}--}}Editar {{$post->titulo}}</h4>
</section>
@endsection

@section('content')
<section>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <article>
        <h6>Slug: </h6><p class="badge" >{{$post->slug}}</p>
        <label for="titulo">Titulo</label>
        </article>
        <input type="text" name="titulo"value=" {{$post->titulo}} ">

        <label for="description">Description</label>
        <input type="text" name="description"value=" {{$post->description}} ">

        <label for="body">Texto</label>
        <textarea type="text" name="body"> {{$post->body}} </textarea>

        <label for="img">Imagen Vieja</label>
        <img src=" {{$post->img}} " alt="Imagen vieja de {{$post->titulo}}">
        <label for="img">Imagen Nueva?</label>
        <input type="file" name="img" id="">

        <button class="btn btn-main" type="submit">Actualizar</button>
    </form>
    <form action="" method="post">
        @csrf
        @method('patch')
        @if ($post->status == 0)
            <button type="submit"><i class="far fa-eye"></i>Activar</button>
        @elseif ($post->status == 1)
            <button type="submit"><i class="far fa-eye-slash"></i>Desactivar</button>
        @endif
    </form>
    <form action="" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Borrar</button>
    </form>
</section>
@endsection
