<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:gerente', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = [];

        if($request->has('email')){
            $users = User::with('roles')->where('email', $request->get('email'))->get();
        }
        else{
            $users = User::with('roles')->get();
        }

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '<>', 'cliente')->get();
        return view('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $roles = $request->input('roles');

        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        foreach($roles as $role){

            $user->roles()->attach($role);
        }

        $user->save();

        Flash::success('Novo usuário adicionado.');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id == null){
            abort(404);
        }
        $user = User::with('roles')->find($id);

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id == null){
            abort(404);
        }
        $user = User::with('roles')->find($id);

        $roles = Role::where('name', '<>', 'cliente')->get();

        return view('users.edit')->with('user', $user)->with('roles', $roles);
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
       if($id == null){
           abort(404);
       }
        $roles = $request->get('roles');

        $user = User::find($id);

        $user->update($request->all());

        $user->roles()->detach();

        $user->save();

        foreach($roles as $role){
            $user->roles()->attach($role);
        }

        $user->save();

        Flash::success("Usuário atualizado");

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == null){
            abort(404);
        }
        User::destroy($id);

        Flash::success('Usuário removido.');

        return redirect()->route('users.index');
    }
}
