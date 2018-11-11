@extends('layouts.app')

@section('mobile-title')
<section class="nav-center">
    <h4 class="title">{{--{{ __('Login') }}--}}Posts</h4>
</section>
@endsection

@section('content')
<section class="post-index">
    @each('post.card', $posts, 'post', 'post.noCards')
</section>
@endsection
