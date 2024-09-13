<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bandeira;
use Illuminate\Http\Request;

class BandeiraController extends Controller
{
    public function index()
    {
        return response()->json(Bandeira::all());
    }

    public function store(Request $request)
    {
        try {
            $newBandeira = $request->all();
            $storedBandeira = Bandeira::create($newBandeira);
            return response()->json([
                'msg'=>'Bandeira inserida com sucesso!',
                'bandeira' => $storedBandeira
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao inserir nova bandeira",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function show($id)
    {
        try {
            return response()->json(Bandeira::findOrFail($id));
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "A bandeira com id:$id não foi encontrada!",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $bandeira = Bandeira::findOrFail($id);
            $bandeira->update($request->all());
            return response()->json([
                'msg'=>'Bandeira atualizada com sucesso!',
                'bandeira' => $bandeira
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao atualizar bandeira",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function remove($id)
    {
        try {
            $bandeira = Bandeira::findOrFail($id);
            $bandeira->delete();
            return response()->json([
                'msg'=>'Bandeira deletada com sucesso!',
                'bandeira' => $bandeira
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao deletar bandeira",
                'Exception' => $error->getMessage()];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
    }
}
    }
