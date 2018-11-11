<section class="post-hero" style="background-image:url('{{$post->img}}')">
    <h2 class="title">{{$post->titulo}}</h2>
    @auth
        <a class="btn-edit" href="{{ route('post.edit', ['id' => $post->id]) }}"><i class="fas fa-edit fa-md"></i></a>
    @endauth
</section>
<section class="post-text">
    <p class=""> {{$post->body}} </p>
</section>
