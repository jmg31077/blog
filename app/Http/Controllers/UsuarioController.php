<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
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
        $usuario = User::findOrFail($id);

        $this->validate($request, $usuario->rulesForUpate());

        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->save();

        Session::flash('success', 'Dados atualizados com sucesso');

        return redirect()->route('usuarios.edit', $usuario->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        Session::flash('success', 'Usuário deletado com sucesso.');

        return redirect()->route('usuarios.index');
    }

    public function getNews($id)
    {
        $usuario = User::findOrFail($id);

        return view('usuarios.news', compact('usuario'));
    }
}
