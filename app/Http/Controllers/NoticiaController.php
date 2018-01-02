<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use Auth;
use Session;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();

        return view('noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $noticia = new Noticia;

        $this->validate($request, $noticia->rules());

        $noticia->titulo = $request->titulo;
        $noticia->corpo = $request->corpo;
        $noticia->usuario_id = Auth::user()->id;
        $noticia->save();

        Session::flash('success', 'Noticia criada com sucesso');

        return redirect()->route('noticias.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $noticia = Noticia::findOrFail($id);

        return view('noticias.show', compact('noticia'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);

        return view('noticias.edit', compact('noticia'));
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
        
        $noticia = Noticia::findOrFail($id);

        $this->validate($request, $noticia->rules());

        $noticia->titulo = $request->titulo;
        $noticia->corpo = $request->corpo;
        $noticia->save();

        Session::flash('success', 'Noticia editada com sucesso');

        return redirect()->route('noticias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Noticia::findOrFail($id)->delete();

        Session::flash('success', 'Noticia deletada com sucesso');

        return redirect()->route('noticias.index');
    }

    /**
     * Mostrar noticias no index publico do blog.
     * @return view
     */
    public function publicIndex()
    {

        $noticias = Noticia::all();

        return view('index', compact('noticias'));

    }
}
