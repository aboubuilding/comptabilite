<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Annee;
use App\Models\Produit;

use App\Models\Inscription;


use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
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

        $produits = Produit::getListe();

        foreach($produits as $produit ){
            $data []  = array(

                "id"=>$produit->id,
                "libelle"=>$produit->libelle == null ? ' ' :$produit->libelle,
                "prix"=>$produit->prix == null ? ' ' :$produit->prix,

                "photo"=>$produit->photo == null ? ' ' : $produit->photo,
                "type_produit"=>$produit->type_produit == null ? ' ' : $produit->type_produit,
                "total_vente"=>  Vente::getTotal($annee_id, null, null,$produit->id ),


            );
        }

        return view('admin.produit.index')->with(
            [
                'data' => $data,

            ]


        );


    }




    public function store(Request $request){

        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];


        $validator = \Validator::make($request->all(),[
            'libelle'=>'required|string|max:25',
            'prix'=>'required',




        ],[
            'libelle.required'=>'Le libellé  est obligatoire ',
            'libelle.string'=>'Le libellé  doit etre une chaine de caracteres ',
            'libelle.max'=>'Le libellé  ne peut pas depasser 25 caracteres ',
            'prix.required'=>'Le prix  est obligatoire  ',




        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{


                 Produit::addProduit(

                    $request->libelle,
                    $request->prix,
                    $request->photo,
                    $request->type_produit,
                     $annee_id




                );



                return response()->json(['code'=>1,'msg'=>'Produit  ajouté avec succès ']);
            }
        }



    public function update(Request $request, $id){

        $session = session()->get('LoginUser');
        $annee_id = $session['annee_id'];
        $validator = \Validator::make($request->all(),[

            'libelle'=>'required|string|max:25',
            'prix'=>'required',


        ],[
            'libelle.required'=>'Le libellé  est obligatoire ',
            'libelle.string'=>'Le libellé  doit etre une chaine de caracteres ',
            'libelle.max'=>'Le libellé   ne peut pas depasser 25 caracteres  ',
            'prix.required'=>'Le prix  est obligatoire  ',



        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

                Produit::updateProduit(

                    $request->libelle,
                    $request->prix,
                    $request->photo,
                    $request->type_produit,
                    $annee_id,

                    $id


                );



                return response()->json(['code'=>1,'msg'=>'Produit modifié  avec succès ']);
            }
        }






    /**
     * Afficher  un Produit
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $produit = Produit::rechercheProduitById($id);


        return response()->json(['code'=>1, 'Produit'=>$produit]);


    }







    /**
     * Supprimer   une  Produit scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {



        $delete = Produit::deleteProduit($id);


        // check data deleted or not
        if ($delete) {
            $success = true;
            $message = "Produit  supprimée ";
        } else {
            $success = true;
            $message = "Produit  non trouvée   ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }







}
