<?php

namespace App\Http\Controllers;

use App\Models\Contatos;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    public function index()
    {
        return Contatos::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "nome" => "required|string|max:100",
            "whatsapp" => "required|string|max:20",
            "email" => "required|string|max:100",
            "sexo" => "required|string|max:1"
        ]);

        $contato = Contatos::create($data);
        return response()->json($contato, 201);
    }

    public function show($id_contato)
    {
        $contato = Contatos::find($id_contato);
        if (!$contato) {
            return response()->json(["error" => "Contato não encontrado"], 404);
        }
        return response()->json($contato, 200);
    }

    public function update(Request $request, $id_contato)
    {
        $contato = Contatos::find($id_contato);
        if (!$contato) {
            return response()->json(["error" => "Contato não encontrado"], 404);
        }

        $data = $request->validate([
            "nome" => "required|string|max:100",
            "whatsapp" => "required|string|max:20",
            "email" => "required|string|max:100",
            "sexo" => "required|string|max:1"
        ]);

        $contato->update($data);
        return response()->json(null, 204);
    }

    public function destroy($id_contato)
    {
        $contato = Contatos::find($id_contato);
        if (!$contato) {
            return response()->json(["error" => "Contato não encontrado"], 404);
        }
        $contato->delete();
        return response()->json(null, 204);
    }

}
