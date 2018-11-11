@extends('layouts.app')

@section('mobile-title')
<section class="nav-center">
    <h4 class="title">{{--{{ __('Login') }}--}}{{ $post->titulo }}</h4>
</section>
@endsection

@section('content')
<code class="full-width"> Estado : {{$post->nameState()}} </code>
<section class="preview-post">
    <form action="{{ route('post.edit',['post' => $post->id]) }}" method="post">
        @csrf
        @method('patch')
        @if ($post->status == 0)
        <button type="submit"><i class="far fa-eye"></i>Activar</button>
        @elseif ($post->status == 1)
        <button type="submit"><i class="far fa-eye-slash"></i>Desactivar</button>
        @endif
    </form>
    <div class="post-index">
        @include('post.card', $post)
    </div>
    <hr>
    <div class="post-show">
        @include('post.view', $post)
    </div>
</section>
<code class="full-width"> Usuario : {{$post->user_id}} </code>
@endsection
