@extends('layouts.app')

@section('mobile-title')

@endsection

@section('content')
<section class="perfil">
    <article>
        <h3 class="title">{{ Auth::user()->name }}</h3>
        <h5 class="title">{{Auth::user()->email}}</h5>
        @if (Auth::user()->created_at)
        <h6 class="title">Miembro desde {{Auth::user()->created_at}}</h6>
        @endif
    </article>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @auth
        <article class="adminPanel">
            <a class="btn btn-invert" href="{{ route('admin.migrar') }}">Migrar</a>
            <br>
            <a class="btn btn-invert" href="{{ route('admin.refresh') }}">Refrescar</a>
            <br>
            <a class="btn btn-invert" href="{{ route('admin.fresh') }}">Romper todo</a>
        </article>
        @endauth
</section>
@endsection
