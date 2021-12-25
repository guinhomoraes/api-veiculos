<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Veiculo;

class ApiController extends Controller
{
    public function getVeiculos()
    {
        $veiculos = Veiculo::get()->toJson(JSON_PRETTY_PRINT);
        return response($veiculos, 200);
    }

    public function getVeiculosByFilter(Request $request)
    {
        dd("passou");
    }

    public function store(Request $request)
    {

        try
        {
            $veiculo = new Veiculo;
            $veiculo->veiculo = $request->veiculo;
            $veiculo->marca = $request->marca;
            $veiculo->descricao = $request->descricao;
            $veiculo->vendido = $request->vendido;
            $veiculo->ano = $request->ano;
            $veiculo->save();

            return response()->json([
                "message" => "veiculo cadastrado"
            ], 200);
        }
        catch(Exception $err)
        {
            return response()->json([
                "message" => "erro ao cadastrar o veiculo"
            ], 500);
        }
    }

  
    public function show($id)
    {
        if (Veiculo::where('id', $id)->exists()) 
        {
            $veiculo = Veiculo::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($veiculo, 200);
        } 
        else 
        {
            return response()->json([
              "message" => "Veículo não encontrado!"
            ], 404);
          }
    }

    public function update(Request $request, $id)
    {
        if (Veiculo::where('id', $id)->exists()) 
        {
            try
            {
                $veiculo = Veiculo::find($id);
                $veiculo->veiculo = $request->veiculo;
                $veiculo->marca = $request->marca;
                $veiculo->descricao = $request->descricao;
                $veiculo->vendido = $request->vendido;
                $veiculo->ano = $request->ano;
                $veiculo->save();
        
                return response()->json([
                    "message" => "Registro atualizado"
                ], 200);
            }
            catch(Exception $err)
            {
                return response()->json([
                    "message" => "erro ao atualizar o veiculo"
                ], 500);
            }
        } 
        else 
        {
            return response()->json([
                "message" => "Veículo não encontrado"
            ], 404);
            
        }
        
    }


    public function destroy($id)
    {
        if(Veiculo::where('id', $id)->exists()) 
        {
            $veiculo = Veiculo::find($id);
            $veiculo->delete();
    
            return response()->json([
              "message" => "Veículo excluído"
            ], 200);
        } 
        else 
        {
            return response()->json([
              "message" => "Não foi possível excluir o veículo"
            ], 404);
        }
    }
}
