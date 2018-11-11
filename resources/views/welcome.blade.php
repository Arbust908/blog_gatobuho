@extends('layouts.app')

@section('content')
<section class="home">
    <article class="title">
        <h2>La Taberna del <strong>Gatobúho</strong></h2>
        <p>Bienvenido a la taberna del Gatobúho, un lugar fantastico donde vamos a ver muchas cosas relacionadas a juegos de rol como DyD y otros.</p>
    </article>
    <article class="links">
        <a  class="button" href="{{ route('post.index') }}">Posts</a>
        @auth
        <a  class="button" href="{{ route('post.create') }}">Nuevo Post</a>
        <a  class="button" href="{{ route('post.history') }}">Posts Inactivos</a>
        @endauth
    </article>
</section>
@endsection

