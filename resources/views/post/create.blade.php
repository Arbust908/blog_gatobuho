@extends('layouts.app')

@section('mobile-title')
<section class="nav-center">
    <h4 class="title">{{--{{ __('Login') }}--}}Nuevo Post</h4>
</section>
@endsection

@section('content')
<section>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" >

        <label for="description">Description</label>
        <input type="text" name="description" >

        <label for="body">Texto</label>
        <textarea type="text" name="body" ></textarea>

        <label for="img">Img</label>
        <input type="file" name="img" id="">


        <button  class="btn btn-main" type="submit">Crear</button>
    </form>
</section>
@endsection
