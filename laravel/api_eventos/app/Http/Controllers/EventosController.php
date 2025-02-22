<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function index()
    {
        return Evento::all();
    }

    public function store(Request $resquest)
    {
        $data = $resquest->validate([
            'data' => 'required|date',
            'nome' => 'required|string|max:100',
            'local' => 'required|string|max:200'
        ]);

        $evento = Evento::create($data);
        return response()->json($evento, 201);
    }

    public function show($id_evento)
    {
        $evento = Evento::find($id_evento);
        if(!$evento) {
            return response()->json(
                ['error' => 'Evento não encontrado'],
                404
            );
        }
        return response()->json($evento, 200);
    }

    public function update(Request $request, $id_evento)
    {
        $evento = Evento::find($id_evento);
        if(!$evento) {
            return response()->json(
                ['error' => 'Evento não encontrado'],
                404
            );
        }

        $data = $request->validate([
            'data' => 'required|date',
            'nome' => 'required|string|max:100',
            'local' => 'required|string|max:200'
        ]);

        $evento->update($data);
        return response()->json(null, 204);
    }

    public function destroy($id_evento)
    {
        $evento = Evento::find($id_evento);
        if(!$evento) {
            return response()->json(['error' => 'Eventonão encontrao'], 404);
        }
        $evento->delete();
        return response()->json(null, 204);
    }
}
