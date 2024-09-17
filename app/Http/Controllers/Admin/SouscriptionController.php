<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Detail;
use App\Models\FraisEcole;
use App\Models\Inscription;
use App\Types\TypePaiement;
use App\Models\Souscription;
use Illuminate\Http\Request;
use App\Types\StatutPaiement;
use App\Types\StatutValidation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SouscriptionController extends Controller
{

    /**
     * Affiche la  liste des  abonnes a la cantine
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCantine()
    {

        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];

        $compte_id = $session['compte_id'];

        $data= [] ;

        $total_ont_payer= 0;



        $total_cantine_gouter  =  Detail::getTotalSouscription(TypePaiement::CANTINE, StatutPaiement::ENCAISSE,  $annee_id, 1) ;
        $total_cantine_dejeuner  =  Detail::getTotalSouscription(TypePaiement::CANTINE, StatutPaiement::ENCAISSE,  $annee_id,  2) ;

        $souscriptions = Detail::getListeCantine(TypePaiement::CANTINE, StatutPaiement::ENCAISSE,  $annee_id);



        $total_cantine  =  Detail::getTotalSouscription(TypePaiement::CANTINE, StatutPaiement::ENCAISSE,  $annee_id);
        foreach($souscriptions as $souscription ){

            if($souscription->total_a_payer == $souscription->montant_deja_paye )

            {

                $total_ont_payer += 1 ;

            }



            $data []  = array(

                "id"=>$souscription->inscription_id,

                  "nom_eleve"=>$souscription->nom_eleve == null ? ' ' :$souscription->nom_eleve.' '.$souscription->prenom_eleve,
                "reference"=>$souscription->reference == null ? ' ' :$souscription->reference,

                  "offre"=>$souscription->offre == null ? ' ' :FraisEcole::rechercheFraisEcoleById($souscription->offre)->libelle,

                    "cycle"=>$souscription->libelle_cycle == null ? ' ' :$souscription->libelle_cycle,

                      "niveau"=>$souscription->niveau_libelle == null ? ' ' :$souscription->niveau_libelle,

                        "montant_deja_paye"=>$souscription->montant_deja_paye == null ? ' ' :(float)$souscription->montant_deja_paye,
                        "total_a_payer"=>$souscription->total_a_payer == null ? ' ' :(float)$souscription->total_a_payer,




            );
        }



        return view('admin.souscription.cantine')->with(
            [
                'data' => $data,
                'total_cantine' => $total_cantine,
                'total_cantine_gouter' => $total_cantine_gouter,
                'total_cantine_dejeuner' => $total_cantine_dejeuner,
                'total_ont_payer' => $total_ont_payer,




            ]


        );


    }







     /**
     * Affiche la  liste des  souscriptions du parc
     *
     * @return \Illuminate\Http\Response
     */
    public function parc()
    {
        $data= [] ;

        $souscriptions = Souscription::getListe();

        foreach($souscriptions as $souscription ){
            $data []  = array(

                "id"=>$souscription->id,
                "date_souscription"=>$souscription->date_souscription == null ? ' ' :$souscription->date_souscription,

                  "montant_annuel_prevu"=>$souscription->montant_annuel_prevu == null ? ' ' :$souscription->montant_annuel_prevu,

                    "type_paiement"=>$souscription->type_paiement == null ? ' ' :$souscription->type_paiement,

                      "niveau"=>$souscription->niveau_id == null ? ' ' :$souscription->niveau->libelle,

                        "nom_eleve"=>$souscription->inscription_id == null ? ' ' :$souscription->inscription->eleve->nom.' '.$souscription->inscription->eleve->prenom,




            );
        }

        return view('admin.souscription.parc')->with(
            [
                'data' => $data,

            ]


        );


    }




    public function store(Request $request){



        $validator = \Validator::make($request->all(),[
            'inscription_id'=>'required',





        ],[
            'inscription_id.required'=>'L eleve   est obligatoire ',




        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{


                 Souscription::addSouscription(

                    $request->date_souscription,
                    $request->montant_annuel_prevu,
                    $request->taux_remise,
                    $request->type_paiement,
                    $request->frais_ecole_id,
                    $request->niveau_id,
                    $request->annee_id,
                    $request->inscription_id,
                    $request->utilisateur_id,
                    $request->ligne_id,




                );



                return response()->json(['code'=>1,'msg'=>'Souscription  ajoutée avec succès ']);
            }
        }



    public function update(Request $request, $id){

        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];
        $validator = \Validator::make($request->all(),[

           'inscription_id'=>'required',

        ],[
            'inscription_id.required'=>'L eleve   est obligatoire ',



        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

                Souscription::updateSouscription(

                    $request->date_souscription,
                    $request->montant_annuel_prevu,
                    $request->taux_remise,
                    $request->type_paiement,
                    $request->frais_ecole_id,
                    $request->niveau_id,
                    $request->annee_id,
                    $request->inscription_id,
                    $request->utilisateur_id,
                    $request->ligne_id,

                    $id


                );



                return response()->json(['code'=>1,'msg'=>'Souscription modifié  avec succès ']);
            }
        }






    /**
     * Afficher  un Souscription
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $souscription = Souscription::rechercheSouscriptionById($id);


        return response()->json(['code'=>1, 'Souscription'=>$souscription]);


    }







    /**
     * Supprimer   une  Souscription scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {



        $delete = Souscription::deleteSouscription($id);


        // check data deleted or not
        if ($delete) {
            $success = true;
            $message = "Souscription  supprimée ";
        } else {
            $success = true;
            $message = "Souscription  non trouvée   ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }







}
