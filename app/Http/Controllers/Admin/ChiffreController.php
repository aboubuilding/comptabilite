<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Cycle;
use App\Models\Detail;


use App\Models\Inscription;
use App\Models\Niveau;
use App\Types\StatutPaiement;
use App\Types\StatutValidation;
use App\Types\TypeInscription;
use App\Types\TypePaiement;

class ChiffreController extends Controller
{

    /**
     * Affiche le chaiffres d affaires previsionnel avec
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

        foreach($cycles as $cycle )

        {
            $data []  = array(

                "id"=>$cycle->id,

                "libelle"=>$cycle->libelle == null ? ' ' :$cycle->libelle,

                "scolarite_previsionnel"=>  Inscription::getScolaritePrevisionnel( $annee_id,$cycle->id),
                "cantine_previsionnel"=>  Inscription::getCantinePrevisionnel( $annee_id,$cycle->id),
                "bus_previsionnel"=>  Inscription::getBusPrevisionnel( $annee_id,$cycle->id),
                "livre_previsionnel"=>  Inscription::getBusPrevisionnel( $annee_id,$cycle->id),


                 "total_eleves"=>  Inscription::getTotal( $annee_id, null, $cycle->id, null,null,  null, null, StatutValidation::VALIDE),
                 "total_anciens"=>  Inscription::getTotal( $annee_id, null, $cycle->id, null,null,null, TypeInscription::REINSCRIPTION, StatutValidation::VALIDE),
                 "total_nouveau"=>  Inscription::getTotal( $annee_id, null, $cycle->id, null,null,null, TypeInscription::INSCRIPTION, StatutValidation::VALIDE),
                 "paiement_scolarite"=> Detail::getMontantTotal($annee_id,null, TypePaiement::FRAIS_SCOLARITE, null, null, StatutPaiement::ENCAISSE, null, null, null, null, null, null, null, $cycle->id ),
                 "paiement_cantine"=> Detail::getMontantTotal($annee_id,null, TypePaiement::CANTINE, null, null, StatutPaiement::ENCAISSE, null, null, null, null, null, null, null, $cycle->id ),
                 "paiement_bus"=> Detail::getMontantTotal($annee_id,null, TypePaiement::BUS, null, null, StatutPaiement::ENCAISSE, null, null, null, null, null, null, null, $cycle->id ),
                 "paiement_livre"=> Detail::getMontantTotal($annee_id,null, TypePaiement::LIVRE, null, null, StatutPaiement::ENCAISSE, null, null, null, null, null, null, null, $cycle->id ),






            );
        }

        return view('admin.chiffre.cycle')->with(
            [
                'data' => $data,

            ]


        );


    }







     /**
     * Affiche le chaiffres d affaires previsionnel avec
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

                "id"=>$niveau->id,


                "cycle"=>$niveau->cycle_id == null ? ' ' :$niveau->cycle->libelle,
                "libelle"=>$niveau->libelle == null ? ' ' :$niveau->libelle,

                  "total_eleves"=>  Inscription::getChiffreAffaire( $annee_id, null, $cycle->id),


                 "total_previsionnel"=>  Inscription::getChiffreAffaire( $annee_id, null, $cycle->id),
                 "total_reel"=> Detail::getMontantTotal($annee_id, null, null, null, null,
                  null, null, null, null,null, null, null, null, $cycle->id ),



            );
        }

        return view('admin.chiffre.niveau')->with(
            [
                'data' => $data,

            ]


        );


    }




    /**
     * Affiche le chaiffres d affaires previsionnel avec
     *
     * @return \Illuminate\Http\Response
     */
    public function classes()
    {
        $data= [] ;


        $session = session()->get('LoginUser');

        $annee_id = $session['annee_id'];
        $compte_id = $session['compte_id'];


        $classes = Classe::getListe();

        foreach($classes as $classe ){
            $data []  = array(

                "id"=>$classe->id,

                "cycle"=>$classe->cycle_id == null ? ' ' :$classe->cycle->libelle,
                "libelle"=>$classe->libelle == null ? ' ' :$classe->libelle,

                 "total_eleves"=>  Inscription::getChiffreAffaire( $annee_id, null, $cycle->id),

                 "total_previsionnel"=>  Inscription::getChiffreAffaire( $annee_id, null, $cycle->id),
                 "total_reel"=> Detail::getMontantTotal($annee_id, null, null, null, null,
                  null, null, null, null,null, null, null, null, $cycle->id ),



            );
        }

        return view('admin.chiffre.classe')->with(
            [
                'data' => $data,

            ]


        );


    }



     /**
     * Affiche le chaiffres d affaires previsionnel avec
     *
     * @return \Illuminate\Http\Response
     */
    public function eleves()
    {
        $data= [] ;


        $session = session()->get('LoginUser');

        $annee_id = $session['annee_id'];
        $compte_id = $session['compte_id'];


        $eleves = Inscription::getListe();

        foreach($eleves as $eleve ){
            $data []  = array(

                "id"=>$eleve->id,

                "cycle"=>$eleve->cycle_id == null ? ' ' :$eleve->cycle->libelle,
                "niveau"=>$eleve->niveau_id == null ? ' ' :$eleve->niveau->libelle,
                "nom_eleve"=>$eleve->_id == null ? ' ' :$eleve->eleve->nom.' '.$eleve->eleve->prenom,


                 "total_previsionnel"=>  Inscription::getChiffreAffaire( $annee_id, null, $cycle->id),
                 "total_reel"=> Detail::getMontantTotal($annee_id, null, null, null, null,
                  null, null, null, null,null, null, null, null, $cycle->id ),



            );
        }

        return view('admin.chiffre.eleves')->with(
            [
                'data' => $data,

            ]


        );


    }





       /**
     * Afficher  un  detail d  dun cycle
     *
     * @param  int $id

     * * @return \Illuminate\Http\JsonResponse
 */
    public function detailCycle ($id)
    {
        $data= [] ;
        $cycle = Cycle::rechercheCycleById($id);



        return response()->json(

            ['code'=>1,

            'cycle'=>$cycle,


        ]);


    }




      /**
     * Afficher  un  detail d  dun niveau
     *
     * @param  int $id

     * * @return \Illuminate\Http\JsonResponse
 */
    public function detailNiveau ($id)
    {
        $data= [] ;
        $niveau = Niveau::rechercheNiveauById($id);



        return response()->json(

            ['code'=>1,

            'niveau'=>$niveau,


        ]);


    }




     /**
     * Afficher  un  detail d  dune classe
     *
     * @param  int $id

     * * @return \Illuminate\Http\JsonResponse
 */
    public function detailClasse ($id)
    {
        $data= [] ;
        $classe = Classe::rechercheClasseById($id);



        return response()->json(

            ['code'=>1,

            'classe'=>$classe,


        ]);


    }




     /**
     * Afficher  un  detail d  dune inscription
     *
     * @param  int $id

     * * @return \Illuminate\Http\JsonResponse
 */
    public function detailEleve ($id)
    {
        $data= [] ;
        $inscription = Inscription::rechercheInscriptionById($id);



        return response()->json(

            ['code'=>1,

            'inscription'=>$inscription,


        ]);


    }








}
