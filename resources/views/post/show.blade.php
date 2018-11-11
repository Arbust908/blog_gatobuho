@extends('layouts.app')

@section('mobile-title')
<section class="nav-center">
    <h4 class="title">{{--{{ __('Login') }}--}}{{ $post->titulo }}</h4>
</section>
@endsection

@section('content')
<section class="post-show">
    @include('post.view')
</section>
@endsection
