<?php

namespace App\Http\Controllers;

use App\Models\Photofiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PhotofileRequest;

class PhotofilesController extends Controller
{
    public function __construct(photofiles $photofile){
        return $this->photofile = $photofile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photofile = $this->photofile->latest()->paginate(5);
        return view("photofile.index",compact('photofile'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotofileRequest $request)
    {

        //dd($request->all());
        $img = $request->file("imagem");
        $imagem = $img->store('imagem','public');

        $this->photofile->create([
            'titulo'=>$request['titulo'],
            'autor'=>$request['autor'],
            'imagem'=>$imagem,
            'descricao'=>$request['descricao'],
        ]);


        return redirect()->back()->with('sucesso','Eba! , postado com sucesso :)');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photofiles  $photofiles
     * @return \Illuminate\Http\Response
     */
    public function update(PhotofileRequest $request, $id)
    {
        if(!$photofile = $this->photofile->find($id)->first()){
            return redirect()->back();
        }
        if($request->file("imagem")){
                Storage::disk('public')->delete($photofile->imagem);
        }
        $img = $request->file("imagem");
        $imagem = $img->store('imagem','public');

        $photofile->update([
            'titulo'=>$request['titulo'],
            'autor'=>$request['autor'],
            'imagem'=>$imagem == '' ? $photofile->imagem : $imagem,
            'descricao'=>$request['descricao'],
        ]);


        return redirect()->back()->with('sucesso','Eba! , atualizado com sucesso :)');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photofiles  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$photofile = $this->photofile->find($id)->first()){
            return redirect()->back();
        }

        Storage::disk('public')->delete($photofile->imagem);
        $photofile->delete();


        return redirect()->back()->with('sucesso','Eba! , deletado com sucesso :)');
    }


    public function search(request $request){
        $photofile = $this->photofile->search($request->filter);
        return view('photofile.index',compact('photofile'));
    }
}
