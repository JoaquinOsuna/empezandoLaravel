<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
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
        return "Hola mundo recurso";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.post.create");
    }

    /**
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
            //'url-clean' => 'required|min:5|max:500'
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
