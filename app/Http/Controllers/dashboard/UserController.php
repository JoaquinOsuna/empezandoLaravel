<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5); 

        return view("dashboard.user.index", ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.user.create", ['user' => new User()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        User::create(
            [
                'name' => $request['name'],
                'rol_id' => 1,
                'surname' => $request['surname'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]
        ); //Se envian los datos 
 
        return back()->with('status', 'User creado con exito'); //redireccion a la pagina anterior una vez que se manda la informacion


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("dashboard.user.show", ["user" =>$user] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("dashboard.user.edit", ["user" =>$user] );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {
        //echo $request->route('user')->id;
        $user->update(
            [
                'name' => $request['name'],
                'surname' => $request['surname'],
                'email' => $request['email'],
            ]
        ); //UPDATE
        return back()->with('status', 'Usuario actualizado con exito'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        echo "borrar";
        $user->delete();
        return back()->with('status', 'user eliminado con exito'); 
    }
}
