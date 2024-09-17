<?php

namespace App\Models;

use App\Types\TypeStatus;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Ligne extends Model
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


        'libelle',
        'prix_minimal',
        'prix_plafond',
        'chauffeur_id',
        'voiture_id',
        'annee_id',
       

        'etat',

    ];



    /**
     * Ajouter une Ligne
     *

     * @param  string $libelle
     * @param  int $prix_minimal
     * @param  int $prix_plafond
     * @param  int $chauffeur_id
     * @param  int $voiture_id
     * @param  int $annee_id

    



     * @return Ligne
     */

    public static function addLigne(
        $libelle,
        $prix_minimal,
        $prix_plafond,
        $chauffeur_id,
        $voiture_id,
        $annee_id
       

    )
    {
        $ligne = new Ligne();


        $ligne->libelle = $libelle;
        $ligne->prix_minimal = $prix_minimal;
        $ligne->prix_plafond = $prix_plafond;
        $ligne->chauffeur_id = $chauffeur_id;
        $ligne->voiture_id = $voiture_id;
        $ligne->annee_id = $annee_id;
       
        $ligne->created_at = Carbon::now();

        $ligne->save();

        return $ligne;
    }

    /**
     * Affichage d'une année scolaire
     * @param int $id
     * @return  Ligne
     */

    public static function rechercheLigneById($id)
    {

        return   $ligne= Ligne::findOrFail($id);
    }

    /**
     * Update d'une Ligne scolaire

   * @param  string $libelle
     * @param  int $prix_minimal
     * @param  int $prix_plafond
     * @param  int $chauffeur_id
     * @param  int $voiture_id
     * @param  int $annee_id
    

     * @param int $id
     * @return  Ligne
     */

    public static function updateLigne(
          $libelle,
        $prix_minimal,
        $prix_plafond,
        $chauffeur_id,
        $voiture_id,
        $annee_id,
       
       
        $id)
    {


        return   $ligne= Ligne::findOrFail($id)->update([



            'libelle' => $libelle,
            'prix_minimal' => $prix_minimal,
            'prix_plafond' => $prix_plafond,
            'chauffeur_id' => $chauffeur_id,
            'voiture_id' => $voiture_id,
            'annee_id' => $annee_id,
           
           
            'id' => $id,


        ]);
    }




    /**
     * Supprimer une Ligne
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteLigne($id)
    {

        $ligne= Ligne::findOrFail($id)->update([
            'etat' => TypeStatus::SUPPRIME

        ]);

        if ($ligne) {
            return 1;
        }
        return 0;
    }



    /**

    
     * Retourne la liste des Lignes

     * @param  int $voiture_id
     * @param  int $annee_id
     * @param  int $chauffeur_id
   
 


     *
     * @return  array
     */

    public static function getListe(

        $voiture_id = null,
        $annee_id = null, 
        $chauffeur_id = null
     
      
        


    ) {

      

        $query =  Ligne::where('etat', '!=', TypeStatus::SUPPRIME)
        ;

        if ($voiture_id != null) {

            $query->where('voiture_id', '=', $voiture_id);
        }

         if ($annee_id != null) {

            $query->where('annee_id', '=', $annee_id);
        }


        if ($chauffeur_id != null) {

            $query->where('chauffeur_id', '=', $chauffeur_id);
        }


      
       

       


        return    $query->get();
    }



    /**
     * Retourne le nombre  des  activités 


     * @param  int $voiture_id
     * @param  int $annee_id
     * @param  int $chauffeur_id
   
    

     * @return  int $total
     */

    public static function getTotal(
          $voiture_id = null,
        $annee_id = null,
        $chauffeur_id = null
       


    ) {

        $query =   DB::table('lignes')


            ->where('lignes.etat', '!=', TypeStatus::SUPPRIME);


       if ($voiture_id != null) {

            $query->where('voiture_id', '=', $voiture_id);
        }

         if ($annee_id != null) {

            $query->where('annee_id', '=', $annee_id);
        }


        if ($chauffeur_id != null) {

            $query->where('chauffeur_id', '=', $chauffeur_id);
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
     * Obtenir un utilisateur
     *
     */
    public function voiture()
    {


        return $this->belongsTo(Voiture::class, 'voiture_id');
    }



     /**
     * Obtenir un utilisateur
     *
     */
    public function chauffeur()
    {


        return $this->belongsTo(Chauffeur::class, 'chauffeur_id');
    }




    

  

}
