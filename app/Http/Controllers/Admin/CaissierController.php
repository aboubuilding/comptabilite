<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;



use App\Models\Annee;
use App\Models\Caisse;

use App\Models\Detail;
use App\Models\Caissier;

use App\Models\Inscription;

use App\Models\Paiement;

use App\Models\Souscription;
use App\Models\User;


use App\Types\StatutPaiement;
use App\Types\TypeCaissier;
use App\Types\TypePaiement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Excel;

class CaissierController extends Controller
{



    /**
     * Affiche la  liste de tous les Caissiers
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= [] ;
        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];
        $compte_id = $session['compte_id'];

        $user = User::rechercheUserById($compte_id);


        $role = null;
        if ($user->role == \App\Types\Role::COMPTABLE) {

            $role = $compte_id;
        }

      

        $caissiers = User::getListe($annee_id, null, $role, null, TypeCaissier::Caissier );






        foreach($caissiers as  $caissier ){


            $data[]  = array(

                "id" => $caissier->id,
                "libelle" => $caissier->libelle == null ? ' ' : $caissier->libelle,
                "date_Caissier" => $caissier->created_at == null ? ' ' : $caissier->created_at,
             
                "montant" => $caissier->montant == null ? ' ' : $caissier->montant,

                   "type_Caissier" => $caissier->type_Caissier == null ? ' ' : $caissier->type_Caissier,

                "caisse" => $caissier->caisse_id == null ? ' ' : $caissier->caisse->libelle,
                "utilisateur" => $caissier->utilisateur_id == null ? ' ' : $caissier->utilisateur->nom.' '.$caissier->utilisateur->prenom,


              

            );
        }

        return view('admin.Caissier.index')->with(
            [
                'data' => $data,

              

            ]


        );


    }





   






  











    /**
     * Afficher  un  detail d un Caissier
     *
     * @param  int $id

     * * @return \Illuminate\Http\JsonResponse
     */
    public function detail ($id)
    {
        $data= [] ;
        $caissier = Caissier::rechercheCaissierById($id);
        $caisse  = Caisse::rechercheCaisseById($caissier->caisse_id);
        $responsable  = User::rechercheUserById($caisse->responsable_id);
       
       

        return response()->json(

            ['code'=>1,

                'Caissier'=>$caissier,
                'depense'=>$depense,
                'caisse'=>$caisse,
               
                'data'=>$data,


            ]);


    }





}
