<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Posto;
use Illuminate\Http\Request;

class PostoController extends Controller
{

    public function index()
    {
        response()->json(Posto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $newPosto = $request->all();
            $storedPosto = Posto::create($newPosto);
            return response()->json([
                'msg'=>'Posto inserido com sucesso!',
                'posto' => $storedPosto
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao inserir novo posto",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            return response()->json(Posto::findOrFail($id));
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "O posto com id:$id não foi encontrado!",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $newPosto = Posto::findOrFail($id);
            $newPosto->update($data);
            return response()->json([
                "msg" => "Posto atualizado com sucesso",
                'posto' => $newPosto
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'Erro' => 'Erro ao atualizar um posto!',
                'Exception' => $error->getMessage()
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove($id)
    {
        try {
            if(Posto::findOrFail($id)->delete())
            return response()->json([
                "msg"=> "Posto com id:$id removido"
            ]);
        } catch (\Exception $error) {
            return response()->json([
                'Erro' => 'Erro ao excluir um posto!',
                'Exception' => $error->getMessage()
            ], 404);
        }
    }
}