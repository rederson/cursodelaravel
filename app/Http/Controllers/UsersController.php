<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        //dd('cheguei aqui...');
        $data =  $request->only(['name', 'email']);

        $data['password'] = bcrypt('password');

        User::create($data);

        //return redirect()->back();
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::find($id); // retorna dado direto
        //$user = User::where('id', $id)->get();// retorna um array com o dado
        //$user = User::where('id', $id)->first();
        //dd($user);
        return view('user.show', [
            'usuario' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', [
            'usuario' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //dd($request->except(['_method', '_token'])); // ou
        //dd($request->only(['name', 'email']));
        $data =  $request->only(['name', 'email']);
        $user = User::find($id);
        //dd($user);
        $user->update($data); // atualiza os dados no banco
        return redirect()->back(); // retornar para o formuláio novamente
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user =  User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
