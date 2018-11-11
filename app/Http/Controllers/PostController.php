<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status','1')->paginate(6);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "titulo" => "required|bail|string|max:100",
            "description" => "required|string|max:255",
            "body" => "required|string",
            "img" => "required|image",
        ];

        $message = [
            "required" => "El campo :attribute es requerido",
            "unique" => "El :attribute ya existe en nuestra Base de Datos",
            "image" => ":attribute tiene que ser una imagen",
            "numeric" => ":attribute deberia ser un numero",
            "string" => ":attribute deberia ser un texto",
            "max" => ":attribute tiene muchos caracteres",
        ];

        $this->validate($request, $rules, $message);
        $post = new Post();

        $postImgPath = $this->imageSave($request->file("img"));

        $post->titulo = $request["titulo"];
        $post->slug = str_slug($request["titulo"]);
        $post->description = $request["description"];
        $post->body = $request["body"];
        $post->img = $postImgPath;

        $post->user_id = Auth::user()->id;
        $post->status = 0;
    //$post->owner_id = Auth::user()->id;

        $post->save();

        return redirect('post/'.$post->id.'/preview');
        /* return view('post.preview', compact('post')); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            "titulo" => "required|bail|string|max:100",
            "description" => "required|string|max:255",
            "body" => "required|string",
            "img" => "required|image",
        ];

        $message = [
            "required" => "El campo :attribute es requerido",
            "unique" => "El :attribute ya existe en nuestra Base de Datos",
            "image" => ":attribute tiene que ser una imagen",
            "numeric" => ":attribute deberia ser un numero",
            "string" => ":attribute deberia ser un texto",
            "max" => ":attribute tiene muchos caracteres",
        ];


        $this->validate($request, $reglas, $mensajes);

        $postImgPath = $post->img;

        if($request->file("img")){
            $postImgPath = $this->imageSave($request->file("img"));
        }

        $post->img = $postImgPath;


        $post->titulo = $request["titulo"];
        $post->slug = str_slug($request["titulo"]);
        $post->description = $request["description"];
        $post->body = $request["body"];


        $post->save();
        $VAC = compact('post');

        if ($post->status === 0) {
            return view('post.preview', $VAC);
        } elseif ($post->status === 1) {
            return view('post.show', $VAC);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->status = 9;
        $post->save();
        return redirect('/post/');
    }

    /**
     *
     */
    public function historial()
    {
        $posts = Post::where('status', '0')->get();
        return view('post.index',compact('posts'));
    }

    /**
     *
     */
    public function toggle(Post $post)
    {
        if($post->status === 0){
            $post->status = 1;
        }elseif($post->status === 1){
            $post->status = 0;
        }
        $post->save();
        return redirect('/post/'.$post->id.'/preview');
    }

    /**
     *
     */
    public function preview(Post $post)
    {
        return view('post.preview',compact('post'));
    }

    /**
     *
     */
    private function imageSave($img)
    {
        $image = $img;
        $imagePath = $image->storePublicly("public/posts/img");
        $imagePath = str_replace("public", "/storage", $imagePath);

        return $imagePath;
    }

    /* API METHODS */
    public function apiAll()
    {
        $posts = Post::where('status', '1')->get();
        return response()->json($posts);
    }
    public function apiOld()
    {
        $deactive = Post::where('status', '0')->get();
        $deleted = Post::where('status', '9')->get();
        $posts = [
            'deactive' => $deactive,
            'deleted'  => $deleted
        ];
        return response()->json($posts);
    }
    public function apiOne(Post $post)
    {
        if($post->status !== 1){
            $post = "No se encontro ningun post";
        }
        return response()->json($post);
    }
}
