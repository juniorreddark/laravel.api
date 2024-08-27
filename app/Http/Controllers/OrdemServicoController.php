<?php

namespace App\Http\Controllers;

use App\Models\OrdemServico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordemservicos = OrdemServico::with('cliente','servico')->get();

        return response()->json([
            'status' => true,
            'ordemservicos' => $ordemservicos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ordemservicos = OrdemServico::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Ordem Serviço Criado com sucesso!",
            'ordemservico' => $ordemservicos
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ordemservico = OrdemServico::with('cliente','servico')->find($id);

        if (!$ordemservico) {
            return response()->json(['message' => 'Ordem Serviço não encontrado'], 404);
        }

        return response()->json([
            'status' => true,
            'ordemservico' =>$ordemservico
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdemServico $ordemServico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ordemservicos = OrdemServico::find($id);
        if (!$ordemservicos) {
            return response()->json(['message' => 'Ordem Serviço não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [

            'data' => 'date'

        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=> $validator->erros()],  422);
        }

        $ordemservicos->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Ordem Serviço atualizado com sucesso!",
            'ordemservico' => $ordemservicos
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdemServico $id)
    {
        $ordemservicos = OrdemServico::find($id);
        if (!$ordemservicos) {
            return response()->json(['message' => 'Ordem Serviço não encontrado'], 404);
        }

        $ordemservicos -> delete();
        return response()->json(['message' => 'Ordem Serviço removido com sucesso']);
    }
}
