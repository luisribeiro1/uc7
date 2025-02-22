<?php

namespace App\Http\Controllers;

use App\Models\Convite;
use Illuminate\Http\Request;

class ConvitesController extends Controller
{
    public function index()
    {
        return Convite::with(['evento', 'contato'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_evento' => 'required|integer',
            'id_contato' => 'required|integer',
            'confirmacao' => 'required|boolean'
        ]);

        $convite = Convite::create($data);
        return response()->json($convite, 201);
    }

    public function show($id_convite)
    {
        $convite = Convite::find($id_convite);
        if(!$convite) {
            return response()->json(
                ['error' => 'Convite não encontrado'],
                404
            );
        }
        return response()->json($convite, 200);
    }

    public function update(Request $request, $id_convite)
    {
        $convite = Convite::find($id_convite);
        if(!$convite) {
            return response()->json(
                ['error' => 'Convite não encontrado'],
                404
            );
        }

        $data = $request->validate([
            'id_evento' => 'required|integer',
            'id_contato' => 'required|integer',
            'confirmacao' => 'required|boolean'
        ]);

        $convite->update($data);
        return response()->json(null, 204);
    }

    public function destroy($id_convite)
    {
        $convite = Convite::find($id_convite);
        if(!$convite) {
            return response()->json(['error' => 'Convite não encontrao'], 404);
        }
        $convite->delete();
        return response()->json(null, 204);
    }
}
