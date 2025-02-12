<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    # Listar todoso os veículos
    public function index()
    {
        # incluir categoria na list de veículos
        return Veiculo::with('categoria')->get();
    }

    # Método para mostrar uma categoria específica
    public function show($id_veiculo)
    {
        $veiculo = Veiculo::with('categoria')->find($id_veiculo);
        if (!$veiculo) {
            return response()->json(
                ["error" => "Veículo não encontrado."],
                404
            );
        }
        return $veiculo;
    }

    # Método para gravar os dados na tabela
    public function store(Request $request)
    {
        $data = $request->validate([
            "marca" => "required|string|max:50",
            "modelo" => "required|string|max:50",
            "ano" => "required|integer",
            "cor" => "required|string|max:30",
            "combustivel" => "required|string|max:20",
            "quilometragem" => "required|integer|min:0",
            "preco" => "required|numeric|min:0",
            "id_categoria" => "required|exists:categorias,id_categoria",
        ]);

        $veiculo = Veiculo::create($data);
        return response()->json($veiculo, 201);
    }
}
