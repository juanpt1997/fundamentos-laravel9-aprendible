<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //public function __invoke() // ? Controlador invocable, solo 1 método o acción
    public function index()
    {
        // $posts = [
        //     ['title' => 'Primero'],
        //     ['title' => 'Segundo'],
        //     ['title' => 'tercero'],
        //     ['title' => 'cuarto']
        // ];

        // $posts = DB::table('posts')->get(); // ? Esto es sin haber definido el modelo
        $posts = Post::get(); 

        return view('posts.index', ['posts' => $posts]);
    }

    // public function show($post){
    // ? Gracias a los Type Hints podemos idicar que la variable que recibimos es de tipo Post
    public function show(Post $post){
        // return Post::findOrFail($post); // Retorna error 404
        // return $post;

        return view('posts.show', ['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // return request(); // ? Sin inyectar la clase request como parámetro igual funciona
        // return $request->input('title');

        $request->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        // Mensajes de sesión
        session()->flash('status', 'Post created!');

        // return redirect('/blog'); // ? Esto funciona pero recordemos que estamos utilizando nombres de rutas
        // return redirect()->route('posts.index'); // ? Tenemos un helper en laravel que se llama to_route
        return to_route('posts.index');
    }

    public function edit(Post $post){
        // return Post::findOrFail($post); // Retorna error 404
        // return $post;

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        // Mensajes de sesión
        session()->flash('status', 'Post updated!');

        return to_route('posts.show', $post);
    }

}
