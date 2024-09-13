<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @var User
     */
    
    private $user;

    public function __construct(){
        $this->user = new User();
    }

    public function index(){
        return view('user.index',['users'=>User::all()]);
    }

    public function show($id){
        return view('user.show',['user'=>User::find($id)]);
    }

    public function store(Request $request){

        $dados = $request->all();

        if(User::create($dados)){
            return redirect('/users');
        }else dd("Erro!!!");
    }

    public function create(){
        return view('user.create');
    }

    public function update(Request $request, $id){

        $dados = $request->all();

        if(!User::find($id)->update($dados))
            dd("Erro!!!");

        return redirect('/users');
    }

    public function edit($id){
        return view('user.edit',['user'=>User::find($id)]);
    }

    public function destroy($id){
        if(!User::destroy($id))
            dd("Erro!!!");

        return redirect('/users');
    }
}
