<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\Categoria;
use Auth;
use PDF;
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
        $this->authorize('criar_noticia');  
        $categorias = Categoria::all();

        return view('noticias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->authorize('criar_noticia');
        $noticia = new Noticia;

        $this->validate($request, $noticia->rules());

        $noticia->titulo = $request->titulo;
        $noticia->corpo = $request->corpo;
        $noticia->usuario_id = Auth::user()->id;

        if ($request->hasFile('imagem')) {
            
            $imagem_nome = time().'.'.$request->imagem->extension();
            $request->imagem->move(public_path('uploads'), $imagem_nome);
            $noticia->caminho_de_imagem = 'uploads/'.$imagem_nome;
            
        }

        if($noticia->save()){
            $noticia->categorias()->attach($request->categorias);
        }

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
        
        $this->authorize('ver_noticia');
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
        $this->authorize('editar_noticia');
        $noticia = Noticia::findOrFail($id);

        $categorias = Categoria::all(); 

        $ids_de_categorias_relacionadas = $noticia->categorias->pluck('id')->toArray();

        return view('noticias.edit', compact('noticia', 'categorias', 'ids_de_categorias_relacionadas'));
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

        $noticia->categorias()->sync($request->categorias);

        if ($request->hasFile('imagem')) {
            
            $imagem_nome = time().'.'.$request->imagem->extension();
            $request->imagem->move(public_path('uploads'), $imagem_nome);

            if (isset($noticia->caminho_de_imagem) && file_exists(public_path($noticia->caminho_de_imagem))) {

                unlink(public_path($noticia->caminho_de_imagem));
                
            }

            $noticia->caminho_de_imagem = 'uploads/'.$imagem_nome;
            
        }

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

    public function pdfGenerate($id)
    {
        $noticia = Noticia::findOrFail($id);

        $pdf = PDF::loadView('noticias.pdf', compact('noticia'));

        return $pdf->inline();
    }
}
