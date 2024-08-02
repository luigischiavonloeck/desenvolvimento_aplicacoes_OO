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
        return view('posto.index',['postos'=>$this->posto->all()]);
    }

    public function show($id){
        return view('posto.show',['posto'=>$this->posto->find($id)]);
    }
}
