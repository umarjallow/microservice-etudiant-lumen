<?php

namespace App\Http\Controllers;
use App\Bourse;
use \GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class BourseController extends Controller
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

    public function createInfoBourse(Request $request){
            $client = new \GuzzleHttp\Client();
            try {
                $res = $client->request('GET', 'localhost:9001/api/etudiant/'.$request->numeroEtudiant);
                $etudiant = json_decode($res->getBody(),true);
                $etudiant["numeroEtudiant"];
                $bourse  = new Bourse();
                $bourse->numeroEtudiant=$etudiant["numeroEtudiant"];
                $bourse->status = $request->status;
                $bourse->montantBourse = $request->montantBourse;
                $bourse->save(); 
                return response()->json('Bourse ajoutée  avec succés !');
            } catch (RequestException $e) {
                return response()->json(Psr7\Message::toString($e->getRequest()));
                if ($e->hasResponse()) {
                    return response()->json(Psr7\Message::toString($e->getResponse()));
                }
            }
    
        
    }
    

    //
}
