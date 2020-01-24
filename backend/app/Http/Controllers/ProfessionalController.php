<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professional;
use App\Technology;

class ProfessionalController extends Controller
{
    public function show(){
        $listProfessionals = Professional::all();
        
        // Response é uma palavra reservada do Laravel
        return response()->json($listProfessionals);
    }
    // Na função create, eu dependo dos dados enviados via Request, então preciso colocar esses dados dentro do () da função
    public function create(Request $request){
        // Pegando id de tecnologia enviado no form
        $technologyId = $request->technology;

        $newProfessional = new Professional();
        $newProfessional->name = $request->name;
        $newProfessional->github = $request->github;
        $technology = Technology::find($technologyId);
        if($technology){
            //attach - agregar informação na tabela intermediária
            $technology->professionals()->attach($newProfessional->id);
        }else{
            return response()->json(["error"=>"O id da tecnologia não existe"]);
        }
        $result = $newProfessional->save();

        
        
        // dd($technologyId);
        
        // Para exibir no json todos os dados do usuário que acabei de cadastrar, coloco a variável $newProfessional no () do json. Se eu retornasse $result, ele traria apenas true.
        return response()->json($newProfessional);
    }
}
