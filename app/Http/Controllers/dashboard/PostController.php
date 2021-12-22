<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5); //Select * from posts    //Post

        return view("dashboard.post.index", ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        return view("dashboard.post.create", ['post' => new Post(), 'categories' => $categories]);
    }

    /**ee
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request) //se cambio el request, para que nos tomara todas las validaciones
    {


        //$request->validate([
           // 'title' => 'required|min:5|max:500',
         //   'content' => 'required|min:10'
            //'url_clean' => 'required|min:5|max:500'
        //]);                                    //validan los valores, en este caso el required para
                                               //se tenga que enviar, que se use un min de 5 y un max de 500

        //echo "Hola mundo" .$request->input('title');
        echo "Hola mundo: " .$request->title;
        
        // echo "Hola mundo" .request('title');

        Post::create($request->validated()); //Se envian los datos 


        return back()->with('status', 'Post creado con exito'); //redireccion a la pagina anterior una vez que se manda la informacion


    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id); //dos puntos es metodo estatico
        return view("dashboard.post.show", ["post" =>$post] );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        return view("dashboard.post.edit", ["post" =>$post, "categories" => $categories] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->update($request->validated()); //UPDATE
        return back()->with('status', 'Post actualizado con exito'); 
    }
    // public function image(Request $request, Post $post)
    // {
    //     $post->update($request->validated()); //UPDATE
    //     return back()->with('status', 'Post actualizado con exito'); 
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        echo "borrar";
        $post->delete();
        return back()->with('status', 'Post eliminado con exito'); 

    }
}
