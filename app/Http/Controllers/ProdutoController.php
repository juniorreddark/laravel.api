<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();

        return response()->json([
            'status' => true,
            'produto' => $produtos
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
        $produtos = Produto::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Produto Criado com sucesso!",
            'produto' => $produtos
        ], 200);
    }




    public function edit(Produto $produto)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produtos = Produto::find($id);
        if (!$produtos) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $produtos -> delete();
        return response()->json(['message' => 'Produto removido com sucesso']);
    }

    public function update(Request $request, $id)
    {
        $produtos = Produto::find($id);
        if (!$produtos) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nome' => 'string|max:255',
            'valor' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['erros'=> $validator->erros()],  422);
        }

        $produtos->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "produto atualizado com sucesso!",
            'produto' => $produtos
        ], 200);
    }

    public function show($id)
    {
            $produtos = Produto::find($id);

            if (!$produtos) {
                return response()->json(['message' => 'Produto não encontrado'], 404);
            }

            return response()->json([
                'status' => true,
                'produto' =>$produtos
            ]);

    }


}
