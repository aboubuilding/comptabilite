<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\Caisse;
use App\Models\Mouvement;
use App\Models\User;
use App\Types\StatutCaisse;

use App\Types\TypeMouvement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class CaisseController extends Controller
{

    /**
     * Affiche la  liste des  années
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];
        $compte_id = $session['compte_id'];

        $user = User::rechercheUserById($compte_id);

        $data= [] ;


        $role = null;
        if ($user->role == \App\Types\Role::COMPTABLE) {

            $role = $compte_id;
        }


        $caisses = Caisse::getListe(null, null, $role, $annee_id);

        foreach($caisses as $caisse ){
            $data []  = array(

                "id"=>$caisse->id,
                "libelle"=>$caisse->libelle == null ? ' ' :$caisse->libelle,
                "solde_initial"=>$caisse->solde_initial == null ? ' ' :(float) $caisse->solde_initial,
                "solde_final"=>$caisse->solde_final == null ? ' ' :(float)$caisse->solde_final,
                "total_encaissement"=> Mouvement::getMontantTotal($annee_id, $caisse->id, null, null, TypeMouvement::ENCAISSEMENT),
                "statut"=>$caisse->statut == null ? ' ' :$caisse->statut,
                "responsable"=>$caisse->responsable_id == null ? ' ' : $caisse->responsable->nom.' '.$caisse->responsable->prenom,
                "createur"=>$caisse->utilisateur_id == null ? ' ' : $caisse->utilisateur->nom.' '.$caisse->utilisateur->prenom,


            );
        }

        return view('admin.caisse.index')->with(
            [
                'data' => $data,

            ]


        );


    }



 

    public function store(Request $request){


        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];
        $compte_id = $session['compte_id'];

        $validator = \Validator::make($request->all(),[
            'libelle'=>'required|string|max:25',




        ],[
            'libelle.required'=>'Le libellé  est obligatoire ',
            'libelle.string'=>'Le libellé  doit etre une chaine de caracteres ',
            'libelle.max'=>'Le libellé  ne peut pas depasser 25 caracteres ',





        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{


                 Caisse::addCaisse(

                    $request->libelle,
                    $request->solde_initial,
                    null,
                    Carbon::now(),
                   null,
                    StatutCaisse::OUVERT,
                     $compte_id,
                     $compte_id,
                     $annee_id,




                );



                return response()->json(['code'=>1,'msg'=>'Caisse  ajoutée avec succès ']);
            }
        }



    public function update(Request $request, $id){

        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];
        $compte_id = $session['compte_id'];


        $validator = \Validator::make($request->all(),[

            'libelle'=>'required|string|max:25',




        ],[
            'libelle.required'=>'Le libellé  est obligatoire ',
            'libelle.string'=>'Le libellé  doit etre une chaine de caracteres ',
            'libelle.max'=>'Le libellé  ne peut pas depasser 25 caracteres ',



        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $caisse = Caisse::rechercheCaisseById($id);

                Caisse::updateCaisse(

                    $request->libelle,
                    $request->solde_initial,
                    $caisse->solde_final,
                    $caisse->date_ouverture,
                    $caisse->date_cloture,
                    $caisse->statut,
                    $caisse->utilisateur_id,
                    $caisse->responsable_id,
                    $caisse->annee_id,

                    $id


                );



                return response()->json(['code'=>1,'msg'=>'Caisse modifiée  avec succès ']);
            }
        }






    /**
     * Afficher  un Caisse
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $caisse = Caisse::rechercheCaisseById($id);


        return response()->json(['code'=>1, 'caisse'=>$caisse]);


    }







    /**
     * Supprimer   une  Caisse scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {



        $delete = Caisse::deleteCaisse($id);


        // check data deleted or not
        if ($delete) {
            $success = true;
            $message = "Caisse  supprimée ";
        } else {
            $success = true;
            $message = "Caisse  non trouvée   ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }




    /**
     * Afficher  un detail d une caisse
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function detail ($id)
    {
        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];

        $compte_id = $session['compte_id'];

        $data_encaissements = [];
        $data_decaissements = [];

        $caisse = Caisse::rechercheCaisseById($id);

        $encaissements  = Mouvement::getListe($annee_id, $id, null, null, TypeMouvement::ENCAISSEMENT);
        $decaissements  = Mouvement::getListe($annee_id, $id, null, null, TypeMouvement::DECAISSEMENTS);
        $total_decaissements  = Mouvement::getMontantTotal($annee_id, $id, null, null, TypeMouvement::DECAISSEMENTS);
        $total_encaissements  = Mouvement::getMontantTotal($annee_id, $id, null, null, TypeMouvement::ENCAISSEMENT);



        foreach ($encaissements as $encaissement) {


            $data_encaissements[]  = array(

                "id" => $encaissement->id,
                "reference" => $encaissement->paiement->reference == null ? ' ' : $encaissement->paiement->reference,
                "date_operation" => $encaissement->created_at == null ? ' ' : $encaissement->created_at,
                "paiement_id" => $encaissement->paiement_id == null ? ' ' : $encaissement->paiement_id,
                "montant" => $encaissement->montant == null ? ' ' : $encaissement->montant,
                "etat" => $encaissement->etat == null ? ' ' : $encaissement->etat,


                "eleve" => $encaissement->paiement->inscription->eleve == null ? ' ' : $encaissement->paiement->inscription->eleve->nom . ' ' . $encaissement->paiement->inscription->eleve->prenom,

            );
        }


        foreach ($decaissements as $decaissement) {


            $data_decaissements[]  = array(

                "id" => $decaissement->id,
                "reference" => $decaissement->depense->reference == null ? ' ' : $decaissement->depense->reference,
                "date_operation" => $decaissement->created_at == null ? ' ' : $decaissement->created_at,
                "depense_id" => $decaissement->depense_id == null ? ' ' : $decaissement->depense_id,
                "montant" => $decaissement->montant == null ? ' ' : $decaissement->montant,
                "etat" => $decaissement->etat == null ? ' ' : $decaissement->etat,
                "beneficiaire" => $decaissement->beneficiaire == null ? ' ' : $decaissement->beneficaire,


            );
        }



        return view('admin.caisse.detail')->with(
            [

                'caisse'=>$caisse,
                'data_encaissements'=>$data_encaissements,
                'data_decaissements'=>$data_decaissements,
                'encaissements'=>$encaissements,
                'decaissements'=>$decaissements,
                'total_decaissements'=>$total_decaissements,
                'total_encaissements'=>$total_encaissements,





            ]);


    }





    public function cloturer(Request $request, $id){


        $validator = \Validator::make($request->all(),[

            'solde_final'=>'required'




        ],[
            'solde_final.required'=>'Le solde final  est obligatoire '



        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $caisse = Caisse::rechercheCaisseById($id);

                Caisse::updateCaisse(

                    $caisse->libelle,
                    $caisse->solde_initial,
                    $request->solde_final,
                    $caisse->date_ouverture,
                      Carbon::now(),
                     StatutCaisse::CLOTURE,
                    $caisse->utilisateur_id,
                    $caisse->responsable_id,
                    $caisse->annee_id,

                    $id


                );



                return response()->json(['code'=>1,'msg'=>'Caisse cloturée   avec succès ']);
            }
        }









}
