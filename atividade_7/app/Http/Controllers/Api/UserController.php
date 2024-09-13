<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        try {
            $newUser = $request->all();
            $storedUser = User::create($newUser);
            return response()->json([
                'msg'=>'Usuário inserido com sucesso!',
                'user' => $storedUser
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao inserir novo usuário",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function show($id)
    {
        try {
            return response()->json(User::findOrFail($id));
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "O usuário com id:$id não foi encontrado!",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return response()->json([
                'msg'=>'Usuário atualizado com sucesso!',
                'user' => $user
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao atualizar usuário",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }

    public function remove($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json([
                'msg'=>'Usuário deletado com sucesso!',
                'user' => $user
            ]);
        } catch (\Exception $error) {
            $responseError = [
                'Erro' => "Erro ao deletar usuário",
                'Exception' => $error->getMessage(),
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }
}
