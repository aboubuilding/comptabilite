<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Detail;
use App\Models\Inscription;
use App\Models\Paiement;
use App\Models\Souscription;
use App\Models\User;
use App\Types\StatutPaiement;
use App\Types\TypePaiement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaiementController extends Controller
{




    /**
     * Affiche la  liste de tous les paiements
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

        $debutsemaine = \Illuminate\Support\Carbon::now()->startOfWeek()->format('Y-m-d');
        $finsemaine = Carbon::now()->endOfWeek()->format('Y-m-d');

        // aujourdhui

        $aujourdhui = Carbon::today()->format('Y-m-d');

        $debutmois = \Illuminate\Support\Carbon::now()->startOfMonth()->format('Y-m-d');
        $finmois = Carbon::now()->endOfMonth()->format('Y-m-d');

        $paiements = Paiement::getListe($annee_id, $role);


        // Totaux paiements
        $total_montant = Detail::getMontantTotal($annee_id, null, null, null, null, StatutPaiement::ENCAISSE, null, null, null, null, null, null, $role);
        $total__montant_mois = Detail::getMontantTotal($annee_id, null,  null, null, null, StatutPaiement::ENCAISSE,$debutmois, $finmois,  null, null, null, null, $role);
        $total__montant_semaine = Detail::getMontantTotal($annee_id, null,  null, null, null,StatutPaiement::ENCAISSE,  $debutsemaine, $finsemaine, null, null, null, null, $role);
        $total__montant_jour = Detail::getMontantTotal($annee_id, null,  null, null, null, StatutPaiement::ENCAISSE, $aujourdhui, null,  null, null, null, null, $role);


        // totaux es nombres


        $total = Paiement::getTotal($annee_id,  $role);
        $total_mois = Paiement::getTotal($annee_id,  $role, null, null, null, $debutmois, $finmois);
        $total_semaine = Paiement::getTotal($annee_id,  $role, null, null, null, $debutsemaine, $finsemaine);
        $total_jour = Paiement::getTotal($annee_id,  $role, null, null, null, $aujourdhui);




        foreach($paiements as  $paiement ){


            $data []  = array(

                "id" => $paiement->id,
                "nom_eleve" => $paiement->inscription_id == null ? ' ' : $paiement->inscription->eleve->nom . ' ' .  $paiement->inscription->eleve->prenom,
                "niveau" => $paiement->inscription_id == null ? ' ' : $paiement->inscription->niveau->libelle,
                "reference" => $paiement->reference == null ? ' ' : $paiement->reference,
                "date_paiement" => $paiement->date_paiement == null ? ' ' : $paiement->date_paiement,
                "statut_paiement" => $paiement->statut_paiement == null ? ' ' : $paiement->statut_paiement,
                "mode_paiement" => $paiement->mode_paiement == null ? ' ' : $paiement->mode_paiement,
                "montant" => Detail::getMontantTotal($annee_id, $paiement->id),
                "utilisateur" => $paiement->utilisateur_id == null ? ' ' : $paiement->utilisateur->nom.' '.$paiement->utilisateur->prenom,


            );
        }

        return view('admin.paiement.index')->with(
            [
                'data' => $data,

                'total' => $total,
                'total_mois' => $total_mois,
                'total_semaine' => $total_semaine,
                'total_jour' => $total_jour,

                'total_montant' => $total_montant,
                'total__montant_mois' => $total__montant_mois,
                'total__montant_semaine' => $total__montant_semaine,
                'total__montant_jour' => $total__montant_jour,





            ]


        );


    }







    public function store(Request $request)
    {

        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];

        $compte_id = $session['compte_id'];

        $validator = \Validator::make($request->all(), [

            'inscription_id' => 'required',
            'payeur' => 'required',
            'mode_paiement' => 'required'

        ], [

            'inscription_id.required' => 'Le choix de l eleve   est obligatoire ',

             'payeur.required' => 'Le payeur  est obligatoire ',

               'mode_paiement.required' => 'Le mode de paiement  est obligatoire ',


        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $ligne_details = $request->ligne_details;

       DB::beginTransaction();
    try {

                $numero = Paiement::genererNumero();

                // Enregistrement du paiement

                $paiement = Paiement::addPaiement(

                    $numero,
                    $request->payeur,
                    null,
                    $request->telephone_payeur,
                    Carbon::now(),
                    StatutPaiement::NON_ENCAISSE,
                   (int) $request->mode_paiement,
                    $request->inscription_id,
                    $compte_id,
                    null,
                    $annee_id



                );

                //Enregistrement des details

              if ($request->ligne_details) {

                  foreach ($ligne_details as $ligne) {

                      $souscription = Souscription::rechercheSouscriptionById($ligne['souscription_id']);

                      if((int)$ligne['montant']){

                          Detail::addDetail(
                              $ligne['montant'],
                              "Paiement  de " . $souscription->fraisecole->libelle ,
                              $paiement->id,
                              $souscription->type_paiement,
                              $paiement->inscription_id,
                              $souscription->frais_ecole_id,
                              StatutPaiement::NON_ENCAISSE,
                              $annee_id,
                              $souscription->id,
                              null,
                              $compte_id,
                              null,
                              Carbon::now(),
                              null




                          );

                      }


                  }
              }








            DB::commit();

                return response()->json(
                    [
                        'code' => 1,
                        'msg' => 'Paiement  ajoutée avec succès ',
                        'paiement_reference' => $numero,
                        'montant' => Detail::getMontantTotal($annee_id, $paiement->id)




                    ]

                );
   } catch (\Exception $e) {
                // En cas d'erreur, annulez la transaction
                DB::rollback();

                // Gérez l'erreur ou lancez une exception personnalisée
                // throw new CustomException('Une erreur s'est produite');

                return response()->json(
                    [
                        'code' => 0,
                        'msg' => "Une erreur s'est produite !",
                        'data' => $request->all()


                    ]

                );
            }
        }
    }





    /**
     * Afficher  un  detail de paiement
     *
     * @param  int $id

     * * @return \Illuminate\Http\JsonResponse
 */
    public function detail ($id)
    {
        $data= [] ;
        $paiement = Paiement::recherchePaiementById($id);
        $inscription = Inscription::rechercheInscriptionById($paiement->inscription_id);

        $details = Detail::getListe($paiement->id);

        foreach($details as  $detail ){


            $data []  = array(

                "id" => $detail->id,
                "libelle" => $detail->libelle == null ? ' ' : $detail->libelle,
                "type_paiement" => $detail->type_paiement == null ? ' ' : $detail->type_paiement,
                "frais_ecole" => $detail->frais_ecole_id == null ? ' ' : $detail->fraisecole->libelle,
                "statut_paiement" => $detail->statut_paiement == null ? ' ' : $detail->statut_paiement,
                "souscription_id" => $detail->souscription_id == null ? ' ' : $detail->souscription_id,
                "montant" => $detail->montant == null ? ' ' : $detail->montant,

            );
        }

        return response()->json(

            ['code'=>1,

            'paiement'=>$paiement,
            'inscription'=>$inscription,
            'data'=>$data,


        ]);


    }




    /**
     * Afficher   la page d ' ajout de paiement '
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
 */
    public function add ()
    {



       return view('admin.paiement.add')->with(
            [


            ]


        );


    }



    /**
     * Charger les frais lié à un eleve
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function charger($id)
    {

        $data= [] ;
        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];


        $paiement  = Paiement::recherchePaiementById($id);

        $payeur = $paiement->payeur;
        $eleve = $paiement->inscription->eleve->nom.' '.$paiement->inscription->eleve->prenom;
        $niveau = $paiement->inscription->niveau->libelle;
        $montant = Detail::getMontantTotal($annee_id, $paiement->id);

        $details = Detail::getListe($paiement->id);

        foreach($details as  $detail ){


            $type_paiement = TypePaiement::getTypePaiement($detail->type_paiement);
            $data []  = array(

                "id" => $detail->id,
                "libelle" => $detail->libelle == null ? ' ' : $detail->libelle,
                "type_paiement" => $detail->type_paiement == null ? ' ' : $type_paiement,
                "frais_ecole" => $detail->frais_ecole_id == null ? ' ' : $detail->fraisecole->libelle,
                "statut_paiement" => $detail->statut_paiement == null ? ' ' : $detail->statut_paiement,
                "souscription_id" => $detail->souscription_id == null ? ' ' : $detail->souscription_id,
                "montant" => $detail->montant == null ? ' ' : $detail->montant,


            );
        }


        return response()->json([
            'code' => 1,
            'payeur' => $payeur,
            'eleve' => $eleve,
            'niveau' => $niveau,
            'montant' => $montant,
            'data' => $data,
            'paiement' => $paiement,

        ]);
    }



    /**
     * Supprimer   une  paiement  scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {



        $delete = Paiement::supprimerPaiement( $request->motif,$id );


        // check data deleted or not
        if ($delete) {
            $success = true;
            $message = "Paiement   supprimé ";
        } else {
            $success = true;
            $message = "Paiement  non trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
