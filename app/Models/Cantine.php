<?php

namespace App\Models;

use App\Types\TypeStatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Achat extends Model
{
    use HasFactory;

    public function __construct(array $attributes=[])
    {
        parent::__construct($attributes);
        $this->etat=TypeStatus::ACTIF;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [


        'date_souscription',
        'montant_annuel_prevu',
        'type_offre',
        'annee_id',
        'inscription_id',



        'etat',

    ];



    /**
     * Ajouter un achat
     *

     * @param  date $date_souscription
     * @param  string $montant_annuel_prevu
     * @param  string $type_offre

     * @param  int $annee_id
     * @param  int $inscription_id




     * @return Achat
     */

    public static function addAchat(
        $date_souscription,
        $montant_annuel_prevu,
        $type_offre,
        $annee_id,
        $inscription_id

    )
    {
        $achat = new Achat();


        $achat->date_souscription = $date_souscription;
        $achat->montant_annuel_prevu = $montant_annuel_prevu;
        $achat->type_offre = $type_offre;


        $achat->annee_id = $annee_id;
        $achat->inscription_id = $inscription_id;

        $achat->created_at = Carbon::now();

        $achat->save();

        return $achat;
    }

    /**
     * Affichage d'un achat
     * @param int $id
     * @return  Achat
     */

    public static function rechercheAchatById($id)
    {

        return   $achat = Achat::findOrFail($id);
    }

    /**
     * Update d'une Achat scolaire

    * @param  date $date_souscription
     * @param  string $montant_annuel_prevu
     * @param  string $type_offre


     * @param  int $annee_id
     * @param  int $inscription_id


     * @param int $id
     * @return  Achat
     */

    public static function updateAchat(
        $date_souscription,
        $montant_annuel_prevu,
        $type_offre,

        $annee_id,
        $inscription_id,


        $id)
    {


        return   $achat = Achat::findOrFail($id)->update([



            'date_souscription' => $date_souscription,
            'montant_annuel_prevu' => $montant_annuel_prevu,
            'type_offre' => $type_offre,

            'annee_id' => $annee_id,
            'inscription_id' => $inscription_id,



            'id' => $id,


        ]);
    }




    /**
     * Supprimer une Achat
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteAchat($id)
    {

        $achat = Achat::findOrFail($id)->update([
            'etat' => TypeStatus::SUPPRIME

        ]);

        if ($achat) {
            return 1;
        }
        return 0;
    }



    /**
     * Retourne la liste des Achats


     * @param  int $annee_id

     * @param  int $inscription_id
     * @param  int $type_offre

     *
     * @return  array
     */

    public static function getListe(

        $annee_id = null,

       
        $inscription_id = null,
        $statut_livraison = null


    ) {



        $query =  Achat::where('etat', '!=', TypeStatus::SUPPRIME)
        ;

        if ($annee_id != null) {

            $query->where('annee_id', '=', $annee_id);
        }

        if ($fournisseur_id != null) {

            $query->where('fournisseur_id', '=', $fournisseur_id);
        }



         if ($inscription_id != null) {

            $query->where('inscription_id', '=', $inscription_id);
        }


            if ($statut_livraison != null) {

            $query->where('statut_livraison', '=', $statut_livraison);
        }





        return    $query->get();
    }



    /**
     * Retourne le nombre  des  achats


   * @param  int $annee_id
     * @param  int $fournisseur_id
     * @param  int $inscription_id
     * @param  int $statut_livraison


     * @return  int $total
     */

    public static function getTotal(
         $annee_id = null,

        $fournisseur_id = null,
        $inscription_id = null,
        $statut_livraison = null





    ) {

        $query =   DB::table('achats')


            ->where('achats.etat', '!=', TypeStatus::SUPPRIME);


       if ($annee_id != null) {

            $query->where('annee_id', '=', $annee_id);
        }

        if ($fournisseur_id != null) {

            $query->where('fournisseur_id', '=', $fournisseur_id);
        }



         if ($inscription_id != null) {

            $query->where('inscription_id', '=', $inscription_id);
        }


            if ($statut_livraison != null) {

            $query->where('statut_livraison', '=', $statut_livraison);
        }






        $total = $query->count();

        if ($total) {

            return   $total;
        }

        return 0;
    }



    /**
     * Obtenir une année
     *
     */
    public function annee()
    {


        return $this->belongsTo(Annee::class, 'annee_id');
    }


    /**
     * Obtenir un fournisseur
     *
     */
    public function fournisseur()
    {


        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }



     /**
     * Generer le  code de paiement

     * @return  string
     */

     public static function genererNumero()
     {

         $numero = "MAR-ACHT-000";

         $last =  Achat::orderBy('id', 'DESC')
             ->latest()->first();;

         if ($last) {
             $numero = $numero . $last->id;
         }


         return $numero;
     }


}
