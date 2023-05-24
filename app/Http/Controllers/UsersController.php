<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('user.index', [
            'usuarios' => $users
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request)
    {
        //dd('cheguei aqui...');
        $attributes =  $request->validated();

        $attributes['password'] = bcrypt('password');
        dd($attributes);
        
        User::create($attributes);

        //return redirect()->back();
        return redirect()->route('user.index');
    }

    public function show($user)
    {
        return view('user.show', [
            'usuario' => $user
        ]);
    }

    public function edit($user)
    {

        return view('user.edit', [
            'usuario' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        //dd($request->except(['_method', '_token'])); // ou
        //dd($request->only(['name', 'email']));
        $data =  $request->only(['name', 'email']);
        //dd($user);
        $user->update($data); // atualiza os dados no banco
        return redirect()->back(); // retornar para o formuláio novamente
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $user->delete();
        return redirect()->back();
    }
}
