<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * @var Usuario
     */
    
    private $usuario;

    public function __construct(){
        $this->usuario = new Usuario();
    }

    public function index(){
        return view('usuario.index',['usuarios'=>Usuario::all()]);
    }

    public function show($id){
        return view('usuario.show',['usuario'=>Usuario::find($id)]);
    }

    public function store(Request $request){

        $dados = $request->all();

        if(Usuario::create($dados)){
            return redirect('/usuarios');
        }else dd("Erro!!!");
    }

    public function create(){
        return view('usuario.create');
    }

    public function update(Request $request, $id){

        $dados = $request->all();

        if(!Usuario::find($id)->update($dados))
            dd("Erro!!!");

        return redirect('/usuarios');
    }

    public function edit($id){
        return view('usuario.edit',['usuario'=>Usuario::find($id)]);
    }

    public function destroy($id){
        if(!Usuario::destroy($id))
            dd("Erro!!!");

        return redirect('/usuarios');
    }
}
