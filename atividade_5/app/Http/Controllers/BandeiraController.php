<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bandeira;

class BandeiraController extends Controller
{
    /**
     * @var Bandeira
     */
    
    private $bandeira;

    public function __construct(){
        $this->bandeira = new Bandeira();
    }

    public function index(){
        return view('bandeira.index',['bandeiras'=>Bandeira::all()]);
    }

    public function show($id){
        return view('bandeira.show',['bandeira'=>Bandeira::find($id)]);
    }

    public function store(Request $request){

        $dados = $request->all();

        if(Bandeira::create($dados)){
            return redirect('/bandeiras');
        }else dd("Erro!!!");
    }

    public function create(){
        return view('bandeira.create');
    }

    public function update(Request $request, $id){

        $dados = $request->all();

        if(!Bandeira::find($id)->update($dados))
            dd("Erro!!!");

        return redirect('/bandeiras');
    }

    public function edit($id){
        return view('bandeira.edit',['bandeira'=>Bandeira::find($id)]);
    }

    public function destroy($id){
        if(!Bandeira::destroy($id))
            dd("Erro!!!");

        return redirect('/bandeiras');
    }
}
