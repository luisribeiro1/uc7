<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    # Método para gravar os dados na tabela
    public function store(Request $request)
    {
        $data = $request->validate([
            "nome_categoria" => "required|string|max:100",
            "status" => "required|boolean",
        ]);

        $categoria = Categoria::create($data);
        return response()->json($categoria, 201);
    }

    # Método para mostrar uma categoria específica
    public function show($id_categoria)
    {
        $categoria = Categoria::find($id_categoria);
        if (!$categoria) {
            return response()->json(
                ["error" => "Categoria não encontrada"],
                404
            );
        }
        return $categoria;
    }

    # Método para alterar os dados de uma categoria
    public function update(Request $request, $id_categoria)
    {
        $categoria = Categoria::find($id_categoria);    # Cria o objeto $categoria
        if (!$categoria) {
            return response()->json(
                ["error" => "Categoria não encontrada"],
                404
            );
        }

        $data = $request->validate([
            "nome_categoria" => "required|string|max:100",
            "status" => "required|boolean",
        ]);

        $categoria->update($data);          # Chama o método update do objeto já criado
        return response()->json(null, 204);
    }

    public function destroy($id_categoria)
    {
        $categoria = Categoria::find($id_categoria);    # Cria o objeto $categoria
        if (!$categoria) {
            return response()->json(
                ["error" => "Categoria não encontrada"],
                404
            );
        }

        $categoria->delete();          # Chama o método detele do objeto já criado
        return response()->json(
            ["message" => "Categoria deletada com sucesso"],
            200
        );
    }
}
