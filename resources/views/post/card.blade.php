<a href="{{ route( $post->status === 0 ? 'post.preview' : 'post.show' , ['post' => $post->id]) }}">
    <article class="card">
        @if ($post->status === 0 || Auth::user())
            <i class="status far fa-eye-slash fa-ms" ></i>
        @endif
        <img class="full-width" src="{{$post->img}}" alt="Foto de {{$post->title}}">
        <h2 class="title">{{$post->titulo}}</h2>
        <p>{{$post->description}}</p>
    </article>
</a>
