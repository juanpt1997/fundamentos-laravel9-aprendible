<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SavePostRequest;

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
    public function show(Post $post)
    {
        // return Post::findOrFail($post); // Retorna error 404
        // return $post;

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create', ['post' => new Post]);
    }

    public function store(SavePostRequest $request)
    {
        // return request(); // ? Sin inyectar la clase request como parámetro igual funciona
        // return $request->input('title');
        
        // ? Pudimos quitar esto por completo debido al form request que creamos 
        // $validated = $request->validate([
        //     'title' => 'required|min:4',
        //     'body' => 'required'
        // ]);

        // ? Create es otra alternativa como método estático
        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();
        // ? Esta es la segunda alternativa pero podemos utilizar la variable $validated para ahorrar código
        // Post::create([
        //     'title' => $request->input('title'),
        //     'body' => $request->input('body')
        // ]);
        Post::create($request->validated());

        // Mensajes de sesión
        // ? Se puede juntar esta línea de abajo con la de to_route como está más abajo
        // session()->flash('status', 'Post created!');
        // Redireccionar
        // return redirect('/blog'); // ? Esto funciona pero recordemos que estamos utilizando nombres de rutas
        // return redirect()->route('posts.index'); // ? Tenemos un helper en laravel que se llama to_route
        // return to_route('posts.index');
        return to_route('posts.index')->with('status', 'Post created!');
    }

    public function edit(Post $post)
    {
        // return Post::findOrFail($post); // Retorna error 404
        // return $post;

        return view('posts.edit', ['post' => $post]);
    }

    public function update(SavePostRequest $request, Post $post)
    {
        // ? Pudimos quitar esto por completo debido al form request que creamos 
        // $validated = $request->validate([
        //     'title' => 'required|min:4',
        //     'body' => 'required'
        // ]);

        // ? Más abajo utilizamos la otra alternativa para actualizar el post
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save();
        // ? Esta es la segunda alternativa pero podemos utilizar la variable $validated para ahorrar código
        // $post->update([
        //     'title' => $request->input('title'),
        //     'body' => $request->input('body')
        // ]);
        $post->update($request->validated());

        // Mensajes de sesión
        // ? Se puede juntar esta línea de abajo con la de to_route como está más abajo
        // session()->flash('status', 'Post updated!');
        // Redireccionar
        // return to_route('posts.show', $post);
        return to_route('posts.show', $post)->with('status', 'Post updated');
    }

    public function destroy(Post $post){
        $post->delete();
        return to_route('posts.index')->with('status', 'Post deleted!');
    }
}
