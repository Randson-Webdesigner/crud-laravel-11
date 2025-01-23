<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\User;


class UserController extends Controller
{
    public function index(){

        $users = User::orderByDesc('id')->get();
        return view("users.index", ["users"=> $users]);
    }

    public function show(user $user){
         
         return view('users.show', ['user'=> $user]);
    }

    public function create(){
        return view("users.create");
    }

    public function store(UserRequest $request){
        $request->validated();

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]
        );

            return redirect()->route('user.index')->with('success','Usuário Cadastrado com Sucesso!');
        
    }

      public function edit(user $user){
        return view('users.edit', ['user'=> $user]);
      }

      public function update(UserRequest $request, User $user){
        
        $request->validated();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuário Editado com Sucesso!');

      }

      public function destroy(user $user){

        $user->delete();
        return redirect()->route('user.index')->with('success','Usuário Apagado com Sucesso!');
      }

}