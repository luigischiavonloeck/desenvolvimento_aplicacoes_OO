<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posto;

class PostoController extends Controller
{
    /**
     * @var Posto
     */
    
    private $posto;

    public function __construct(){
        $this->posto = new Posto();
    }

    public function index(){
        return view('posto.index',['postos'=>Posto::all()]);
    }

    public function show($id){
        return view('posto.show',['posto'=>Posto::find($id)]);
    }

    public function store(Request $request){

        $dados = $request->all();

        if(Posto::create($dados)){
            return redirect('/postos');
        }else dd("Erro!!!");
    }

    public function create(){
        return view('posto.create');
    }

    public function update(Request $request, $id){

        $dados = $request->all();

        if(!Posto::find($id)->update($dados))
            dd("Erro!!!");

        return redirect('/postos');
    }

    public function edit($id){
        return view('posto.edit',['posto'=>Posto::find($id)]);
    }

    public function destroy($id){
        if(!Posto::destroy($id))
            dd("Erro!!!");

        return redirect('/postos');
    }
}
