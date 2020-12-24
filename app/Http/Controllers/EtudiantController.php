<?php

namespace App\Http\Controllers;
use App\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createInfoBourse(Request $request, $numeroEtudiant){
        $etudiant  = Etudiant::where('numeroEtudiant', $numeroEtudiant)->first();
        
        if(!is_null($etudiant)){

            $etudiant->status = $request->status;
            $etudiant->montantBourse = $request->montantBourse;
            $etudiant->save();
       
            return response()->json('Mise à jour effectuée avec succés !');
            
        }else{
            return response()->json('Cet Etudiant n\'existe pas.');
        }
   
        
    }
    

    //
}
