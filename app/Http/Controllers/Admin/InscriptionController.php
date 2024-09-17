<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Cycle;
use App\Models\Detail;
use App\Models\Eleve;
use App\Models\FraisEcole;
use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\ParentEleve;
use App\Models\Souscription;
use App\Types\Sexe;
use App\Types\StatutPaiement;
use App\Types\StatutValidation;
use App\Types\TypeInscription;
use App\Types\TypePaiement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionController extends Controller
{

    /**
     * Affiche la  liste des  années
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= [] ;
       $session = session()->get('LoginUser');
       $annee_id = $session['annee_id'];

        $compte_id = $session['compte_id'];


        $total_inscrits = Inscription::getTotal($annee_id, null,  null, null, null, null,null, StatutValidation::VALIDE);
        $total_garcons = Inscription::getTotal($annee_id, null,  null, null, null, null,null, StatutValidation::VALIDE, null, null, null, null, null, null, Sexe::MASCULIN);
        $total_filles = Inscription::getTotal($annee_id, null,  null, null, null, null,null, StatutValidation::VALIDE, null, null, null, null, null, null, Sexe::FEMININ);
        $total_nouveaux = Inscription::getTotal($annee_id, null, null, null, null, null,TypeInscription::INSCRIPTION);


        $inscriptions = Inscription::getListe($annee_id, null, null, null, null, null,null,StatutValidation::VALIDE);



        foreach($inscriptions as $inscription ){


            $data []  = array(

                "id" => $inscription->id,
                "nom_eleve" => $inscription->eleve_id == null ? ' ' : $inscription->eleve->nom . ' ' . $inscription->eleve->prenom,
                "niveau" => $inscription->niveau_id == null ? ' ' : $inscription->niveau->libelle,
                "matricule" => $inscription->eleve->matricule == null ? ' ' : $inscription->eleve->matricule,


                "sexe" => $inscription->eleve_id == null ? ' ' : $inscription->eleve->sexe,
                "type_inscription" => $inscription->type_inscription == null ? ' ' : $inscription->type_inscription,
                "cycle" => $inscription->cycle_id == null ? ' ' : $inscription->cycle->libelle,
                "date_inscription" => $inscription->date_inscription == null ? ' ' : $inscription->date_inscription,


            );
        }

        return view('admin.inscription.index')->with(
            [
                'data' => $data,
                'total_inscrits' => $total_inscrits,
                'total_garcons' => $total_garcons,
                'total_filles' => $total_filles,
                'total_nouveaux' => $total_nouveaux

            ]


        );


    }



    /**
     * Affiche la  liste des  années
     *
     * @return \Illuminate\Http\Response
     */
    public function cycles()
    {
        $data= [] ;
        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];

        $compte_id = $session['compte_id'];




        $cycles = Cycle::getListe();

        foreach($cycles as $cycle ){


            $data []  = array(

                "id" => $cycle->id,
                "libelle" => $cycle->libelle == null ? ' ' : $cycle->libelle,
                "total_eleves" => Inscription::getTotal($annee_id, null,$cycle->id ),
                "total_garcons" => Inscription::getTotal($annee_id, null,$cycle->id, null, null, null, null, null, null, null, null, null, null, null, Sexe::MASCULIN ),
                "total_filles" => Inscription::getTotal($annee_id, null,$cycle->id, null, null, null, null, null, null, null, null, null, null, null, Sexe::FEMININ ),



            );
        }

        return view('admin.inscription.cycle')->with(
            [
                'data' => $data,


            ]


        );


    }



    /**
     * Affiche la  liste des eleves par classes
     *
     * @return \Illuminate\Http\Response
     */
    public function classes()
    {
        $data= [] ;
        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];

        $compte_id = $session['compte_id'];




        $classes = Classe::getListe(null, null, $annee_id);

        foreach($classes as $classe ){


            $data []  = array(

                "id" => $classe->id,
                "libelle" => $classe->libelle == null ? ' ' : $classe->libelle,
                "cycle" => $classe->cycle_id == null ? ' ' : $classe->cycle->libelle,
                "niveau" => $classe->cycle_id == null ? ' ' : $classe->niveau->libelle,
                "total_eleves" => Inscription::getTotal($annee_id, null, null, null,$classe->id  ),
                "total_garcons" => Inscription::getTotal($annee_id, null,null, null, $classe->id, null, null, null, null, null, null, null, null, null, Sexe::MASCULIN ),
                "total_filles" => Inscription::getTotal($annee_id, null,null,  null, $classe->id, null, null, null, null, null, null, null, null, null, Sexe::FEMININ ),



            );
        }

        return view('admin.inscription.classe')->with(
            [
                'data' => $data,


            ]


        );


    }




    /**
     * Affiche la  liste des eleves par niveaux
     *
     * @return \Illuminate\Http\Response
     */
    public function niveaux()
    {
        $data= [] ;
        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];

        $compte_id = $session['compte_id'];




        $niveaux = Niveau::getListe();

        foreach($niveaux as $niveau ){


            $data []  = array(

                "id" => $niveau->id,
                "libelle" => $niveau->libelle == null ? ' ' : $niveau->libelle,
                "cycle" => $niveau->cycle_id == null ? ' ' : $niveau->cycle->libelle,
                "total_eleves" => Inscription::getTotal($annee_id, null, null, $niveau->id ),
                "total_garcons" => Inscription::getTotal($annee_id, null,null, $niveau->id, null, null, null, null, null, null, null, null, null, null, Sexe::MASCULIN ),
                "total_filles" => Inscription::getTotal($annee_id, null,null,  $niveau->id, null, null, null, null, null, null, null, null, null, null, Sexe::FEMININ ),



            );
        }

        return view('admin.inscription.niveau')->with(
            [
                'data' => $data,


            ]


        );


    }





    /**
     * Afficher  une inscription
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $inscription = Inscription::rechercheInscriptionById($id);
        $eleve = Eleve::rechercheEleveById($inscription->eleve_id);
        $date_naissance_eleve = $eleve->date_naissance;


        return response()->json(['code'=>1,
            'inscription'=>$inscription,
            'eleve'=>$eleve,
            'date_naissance_eleve'=>$date_naissance_eleve,



        ]);


    }




    public function update(Request $request, $id){


        $validator = \Validator::make($request->all(),[

            'nom' => 'required|string|max:25',
            'prenom' => 'required|string|max:25',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'sexe' => 'required',
            'nationalite_id' => 'required',
            'niveau_id' => 'required',



        ],[
            'nom.required' => 'Le nom  est obligatoire ',
            'nom.max' => 'Le nom ne doit pas depasser 25 caracteres ',
            'nom.string' => 'Le nom  doit etre une chaine de caracteres ',

            'prenom.required' => 'Le prenom  est obligatoire ',
            'prenom.max' => 'Le prenom ne doit pas depasser 25 caracteres ',
            'prenom.string' => 'Le prenom  doit etre une chaine de caracteres ',

            'date_naissance.required' => 'La date de naissance est obligatoire ',
            'lieu_naissance.required' => 'Le lieu de naissance  est obligatoire ',
            'sexe.required' => 'Le sexe est obligatoire',
            'nationalite_id.required' => 'Le choix de la nationalite  est obligatoire  ',

            'niveau_id.required' => 'Le choix du niveau   est obligatoire  ',



        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $inscription = Inscription::rechercheInscriptionById($id);

            if ($inscription) {

                DB::beginTransaction();

                try {

                // mise a jour des infos de l eleve

                Eleve::modifierEleve(

                    $request->nom,
                    $request->prenom,
                    $request->date_naissance,
                    $request->lieu_naissance,
                    $request->sexe,
                    $request->nationalite_id,

                    $inscription->eleve_id

                );

                // Mise de l inscription

                Inscription::modifierInscription(


                    $request->classe_id,
                    $request->niveau_id,
                    $id

                );

                return response()->json(['code' => 1, 'msg' => 'Inscription modifiée  avec succès ']);


                } catch (\Exception $e) {
                    // En cas d'erreur, on annule la transaction
                    DB::rollBack();

                    // Retourner une réponse d'erreur
                    return response()->json(['message' => 'Erreur lors de la sauvegarde des données : ' . $e->getMessage()], 500);
                }

            } else {


                return response()->json(['code' => 0, 'msg' => 'Inscription  introuvable ']);

            }



            }
        }






    /**
     * Afficher  un Niveau
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
 */
    public function detail ($id)
    {
        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];

        $inscription = Inscription::rechercheInscriptionById($id);
        $eleve = Eleve::rechercheEleveById($inscription->eleve_id);
        $parent_principal = ParentEleve::rechercheParentEleveById($inscription->parent_id);

        return view('admin.inscription.detail')->with(
            [
            'inscription'=>$inscription,
            'eleve'=>$eleve,
            'parent_principal'=>$parent_principal,



        ]);


    }



    /**
     * Charger les frais lié à un eleve
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function charger($id)
    {
        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];

        $inscription  = Inscription::rechercheInscriptionById($id);

        $niveau = Niveau::rechercheNiveauById($inscription->niveau_id);




        $data= [] ;


        if( $inscription) {


            $frais = array(
                array("Frais scolarité",  $inscription->frais_scolarite, TypePaiement::FRAIS_SCOLARITE),
                array("Frais d' assurance",  $inscription->frais_assurance,  TypePaiement::FRAIS_ASSURANCE),



            );

            if( $inscription->type_inscription == TypeInscription::INSCRIPTION)
                {

                    $inscription_ligne = array("Frais d' inscription", $inscription->frais_inscription, TypePaiement::FRAIS_INSCRIPTION);
                    $frais[] = $inscription_ligne;
                }


                if( $inscription->is_cantine)
                {

                    $cantine_ligne = array("Frais de cantine", $inscription->frais_cantine, TypePaiement::CANTINE);
                    $frais[] = $cantine_ligne;
                }


                if( $inscription->is_bus)
                {

                    $bus_ligne = array("Frais bus ", $inscription->frais_bus, TypePaiement::BUS);
                    $frais[] = $bus_ligne;
                }


                if( $inscription->is_livre)
                {

                    $livre_ligne = array("Frais ligne  ", $inscription->livre_ligne, TypePaiement::LIVRE);
                    $frais[] = $livre_ligne;
                }


        }



        foreach($frais as $frai ){
            $data []  = array(

                $montant_deja =  Detail::getMontantTotal($annee_id, null,$frai[2], $id, null, StatutPaiement::ENCAISSE),

                $montant_prevu = (int) $frai[1],


                "type_paiement"=> $frai[2],
                "libelle"=> $frai[0],
                "montant_prevu"=> $montant_prevu,
                "montant_deja"=> $montant_deja,
                "reste"=> $montant_prevu - (int)$montant_deja,



            );
        }



        return response()->json([
            'code' => 1,
            'libelle_niveau' => $niveau->libelle,
            'data' => $data,

        ]);
    }



}
