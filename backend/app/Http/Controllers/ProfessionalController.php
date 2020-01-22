<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professional;

class ProfessionalController extends Controller
{
    public function show(){
        $listProfessionals = Professional::all();
        
        // Response é uma palavra reservada do Laravel
        return response()->json($listProfessionals);
    }
    // Na função create, eu dependo dos dados enviados via Request, então preciso colocar esses dados dentro do () da função
    public function create(Request $request){
        $newProfessional = new Professional();
        $newProfessional->name = $request->name;
        $newProfessional->github = $request->github;

        $result = $newProfessional->save();

        // Para exibir no json todos os dados do usuário que acabei de cadastrar, coloco a variável $newProfessional no () do json. Se eu retornasse $result, ele traria apenas true.
        return response()->json($newProfessional);
    }
}
