<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Les routes des interfaces de l admin

Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin_login');

Route::get('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin_logout');

Route::post('/utilisateurs/authenticate', [App\Http\Controllers\Admin\UtilisateurController::class, 'authenticate'])->name('utilisateur_authenticate');



Route::middleware(['admin', 'comptable', 'directeur'])->group(function () {

//-----------------  Tableau de bord admin


    Route::get('/', [\App\Http\Controllers\Admin\TableauController::class, 'tableau'])->name('tableau');



//-----------------  Chiffres d affaires



    Route::get('/chiffres/cycles', [App\Http\Controllers\Admin\ChiffreController::class, 'cycles'])->name('admin_chiffre_cycles');


    Route::get('/chiffres/cycles/{id}', [\App\Http\Controllers\Admin\ChiffreController::class, 'detailCycle'])->name('admin_chiffres_detail_cycle');


      Route::get('/chiffres/niveaux/{id}', [\App\Http\Controllers\Admin\ChiffreController::class, 'detailNiveau'])->name('admin_chiffres_detail_niveau');



      Route::get('/chiffres/classes/{id}', [\App\Http\Controllers\Admin\ChiffreController::class, 'detailClasse'])->name('admin_chiffres_detail_classe');


        Route::get('/chiffres/eleves/{id}', [\App\Http\Controllers\Admin\ChiffreController::class, 'detailEleve'])->name('admin_chiffres_detail_eleve');


    Route::get('/chiffres/niveaux/{id}', [\App\Http\Controllers\Admin\ChiffreController::class, 'detailNiveau'])->name('admin_chiffres_detail_niveau');


    Route::get('/chiffres/niveaux', [App\Http\Controllers\Admin\ChiffreController::class, 'niveaux'])->name('admin_chiffre_niveaux');


    Route::get('/chiffres/classes', [App\Http\Controllers\Admin\ChiffreController::class, 'classes'])->name('admin_chiffre_classes');

    Route::get('/chiffres/eleves', [App\Http\Controllers\Admin\ChiffreController::class, 'eleves'])->name('admin_chiffre_eleves');



//----------------- Paiements

    Route::get('/paiements/index', [\App\Http\Controllers\Admin\PaiementController::class, 'index'])->name('admin_paiements_index');



    Route::get('/paiements/details', [\App\Http\Controllers\Admin\PaiementController::class, 'details'])->name('admin_paiements_details');


    Route::get('/paiements/nonencaisses', [\App\Http\Controllers\Admin\PaiementController::class, 'nonencaisse'])->name('admin_paiements_nonencaisses');


    Route::get('/paiements/parc', [\App\Http\Controllers\Admin\PaiementController::class, 'parc'])->name('admin_paiements_parc');



    Route::get('/paiements/add', [\App\Http\Controllers\Admin\PaiementController::class, 'add'])->name('admin_paiements_add');
    Route::post('/paiements/save', [\App\Http\Controllers\Admin\PaiementController::class, 'store'])->name('admin_paiements_store');
    Route::get('/paiements/detail/{id}', [\App\Http\Controllers\Admin\PaiementController::class, 'detail'])->name('admin_paiements_detail');
    Route::post('/paiements/delete/{id}', [\App\Http\Controllers\Admin\PaiementController::class, 'delete'])->name('admin_paiements_delete');

    Route::get('/paiements/charger/{id}', [App\Http\Controllers\Admin\PaiementController::class, 'charger'])->name('admin_paiements_charger');


//----------------- Inscriptions

Route::get('/inscriptions/index', [App\Http\Controllers\Admin\InscriptionController::class, 'index'])->name('admin_inscriptions_index');

Route::get('/inscriptions/modifier/{id}', [App\Http\Controllers\Admin\InscriptionController::class, 'edit'])->name('admin_inscriptions_edit');
Route::get('/inscriptions/detail/{id}', [App\Http\Controllers\Admin\InscriptionController::class, 'detail'])->name('admin_inscriptions_detail');
Route::get('/inscriptions/charger/{id}', [App\Http\Controllers\Admin\InscriptionController::class, 'charger'])->name('admin_inscriptions_charger');
Route::post('/inscriptions/update/{id}', [App\Http\Controllers\Admin\InscriptionController::class, 'update'])->name('admin_inscriptions_update');
Route::post('/inscriptions/delete/{id}', [App\Http\Controllers\Admin\InscriptionController::class, 'delete'])->name('admin_inscriptions_delete');









        //----------------- Banques

    Route::get('/banques/index', [App\Http\Controllers\Admin\BanqueController::class, 'index'])->name('admin_banque_index');
    Route::get('/banques/add', [App\Http\Controllers\Admin\BanqueController::class, 'add'])->name('admin_banque_add');
    Route::post('/banques/save', [App\Http\Controllers\Admin\BanqueController::class, 'store'])->name('admin_banque_store');
    Route::get('/banques/modifier/{id}', [App\Http\Controllers\Admin\BanqueController::class, 'edit'])->name('admin_banque_edit');
    Route::post('/banques/update/{id}', [App\Http\Controllers\Admin\BanqueController::class, 'update'])->name('admin_banque_update');
    Route::post('/banques/delete/{id}', [App\Http\Controllers\Admin\BanqueController::class, 'delete'])->name('admin_banque_delete');




        //----------------- Cheques

    Route::get('/cheques/index', [App\Http\Controllers\Admin\ChequeController::class, 'index'])->name('admin_cheques_index');
    Route::get('/cheques/modifier/{id}', [App\Http\Controllers\Admin\ChequeController::class, 'edit'])->name('admin_cheque_edit');
    Route::post('/cheques/update/{id}', [App\Http\Controllers\Admin\ChequeController::class, 'update'])->name('admin_cheque_update');
    Route::post('/cheques/delete/{id}', [App\Http\Controllers\Admin\ChequeController::class, 'delete'])->name('admin_cheque_delete');



        //----------------- Articles

    Route::get('/articles/index', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('admin_artilcles_index');
    Route::get('/articles/add', [App\Http\Controllers\Admin\ArticleController::class, 'add'])->name('admin_articles_add');
    Route::post('/articles/save', [App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('admin_articles_store');
    Route::get('/articles/modifier/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('admin_articles_edit');
    Route::post('/articles/update/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('admin_articles_update');
    Route::post('/articles/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'delete'])->name('admin_articles_delete');




        //----------------- Activites

    Route::get('/activites/index', [App\Http\Controllers\Admin\ActiviteController::class, 'index'])->name('admin_activites_index');
    Route::get('/activites/add', [App\Http\Controllers\Admin\ActiviteController::class, 'add'])->name('admin_activites_add');
    Route::post('/activites/save', [App\Http\Controllers\Admin\ActiviteController::class, 'store'])->name('admin_activites_store');
    Route::get('/activites/modifier/{id}', [App\Http\Controllers\Admin\ActiviteController::class, 'edit'])->name('admin_activites_edit');
    Route::post('/activites/update/{id}', [App\Http\Controllers\Admin\ActiviteController::class, 'update'])->name('admin_activites_update');
    Route::post('/activites/delete/{id}', [App\Http\Controllers\Admin\ActiviteController::class, 'delete'])->name('admin_activites_delete');



     //----------------- Souscriptions

    Route::get('/souscriptions/index', [App\Http\Controllers\Admin\SouscriptionController::class, 'index'])->name('admin_souscriptions_index');
    Route::get('/souscriptions/parc', [App\Http\Controllers\Admin\SouscriptionController::class, 'parc'])->name('admin_souscriptions_parc');
    Route::get('/souscriptions/cantine', [App\Http\Controllers\Admin\SouscriptionController::class, 'cantine'])->name('admin_souscriptions_cantine');

    Route::get('/souscriptions/add', [App\Http\Controllers\Admin\SouscriptionController::class, 'add'])->name('admin_souscriptions_add');
    Route::post('/souscriptions/save', [App\Http\Controllers\Admin\SouscriptionController::class, 'store'])->name('admin_souscriptions_store');
    Route::get('/souscriptions/modifier/{id}', [App\Http\Controllers\Admin\SouscriptionController::class, 'edit'])->name('admin_souscriptions_edit');
    Route::post('/souscriptions/update/{id}', [App\Http\Controllers\Admin\SouscriptionController::class, 'update'])->name('admin_souscriptions_update');
    Route::post('/souscriptions/delete/{id}', [App\Http\Controllers\Admin\SouscriptionController::class, 'delete'])->name('admin_souscriptions_delete');



     //----------------- Recouvrements

    Route::get('/recouvrements/scolarite', [App\Http\Controllers\Admin\RecouvrementController::class, 'scolarite'])->name('admin_recouvrement_niveaux');


    Route::get('/recouvrements/cantine', [App\Http\Controllers\Admin\RecouvrementController::class, 'classes'])->name('admin_recouvrement_cantine');

    Route::get('/recouvrements/bus', [App\Http\Controllers\Admin\RecouvrementController::class, 'eleves'])->name('admin_recouvrement_bus');



    Route::get('/recouvrements/examen', [App\Http\Controllers\Admin\RecouvrementController::class, 'eleves'])->name('admin_recouvrement_examen');



    //----------------- Caisses

    Route::get('/caisses/index', [App\Http\Controllers\Admin\CaisseController::class, 'index'])->name('admin_caisse_index');
    Route::get('/caisses/mine', [App\Http\Controllers\Admin\CaisseController::class, 'mine'])->name('admin_caisse_mine');
    Route::get('/caisses/add', [App\Http\Controllers\Admin\CaisseController::class, 'add'])->name('admin_caisse_add');
    Route::post('/caisses/save', [App\Http\Controllers\Admin\CaisseController::class, 'store'])->name('admin_caisse_store');
    Route::get('/caisses/modifier/{id}', [App\Http\Controllers\Admin\CaisseController::class, 'edit'])->name('admin_caisse_edit');
    Route::get('/caisses/detail/{id}', [App\Http\Controllers\Admin\CaisseController::class, 'detail'])->name('admin_caisse_detail');
    Route::post('/caisses/update/{id}', [App\Http\Controllers\Admin\CaisseController::class, 'update'])->name('admin_caisse_update');
    Route::post('/caisses/delete/{id}', [App\Http\Controllers\Admin\CaisseController::class, 'delete'])->name('admin_caisse_delete');

    Route::post('/caisses/cloturer/{id}', [App\Http\Controllers\Admin\CaisseController::class, 'cloturer'])->name('admin_caisse_cloturer');
    Route::get('/caisses/journaltotal/{id}', [App\Http\Controllers\Admin\CaisseController::class, 'journalTotaux'])->name('admin_caisse_journal_total');
    Route::get('/caisses/journaldetails/{id}', [App\Http\Controllers\Admin\CaisseController::class, 'journalDetail'])->name('admin_caisse_journal_detail');



    //----------------- Encaissements

    Route::get('/encaissements/index', [App\Http\Controllers\Admin\EncaissementController::class, 'index'])->name('admin_encaissements_index');

    Route::get('/encaissements/add', [App\Http\Controllers\Admin\EncaissementController::class, 'add'])->name('admin_encaissements__add');
    Route::post('/encaissements/save', [App\Http\Controllers\Admin\EncaissementController::class, 'store'])->name('admin_encaissements__store');
    Route::get('/encaissements/modifier/{id}', [App\Http\Controllers\Admin\EncaissementController::class, 'edit'])->name('admin_encaissements_edit');
    Route::get('/encaissements/detail/{id}', [App\Http\Controllers\Admin\EncaissementController::class, 'detail'])->name('admin_encaissements_detail');
    Route::post('/encaissements/update/{id}', [App\Http\Controllers\Admin\EncaissementController::class, 'update'])->name('admin_encaissements__update');
    Route::post('/encaissements/delete/{id}', [App\Http\Controllers\Admin\EncaissementController::class, 'delete'])->name('admin_encaissements__delete');
    Route::get('/encaissements/pdf/{id}', [App\Http\Controllers\Admin\EncaissementController::class, 'pdf'])->name('encaissement_pdf');




    //----------------- Decaissements

    Route::get('/decaissements/index', [App\Http\Controllers\Admin\DecaissementController::class, 'index'])->name('admin_decaissement_index');
    Route::get('/decaissements/mine', [App\Http\Controllers\Admin\DecaissementController::class, 'mine'])->name('admin_decaissement_mine');
    Route::get('/decaissements/add', [App\Http\Controllers\Admin\DecaissementController::class, 'add'])->name('admin_decaissement_add');
    Route::post('/decaissements/save', [App\Http\Controllers\Admin\DecaissementController::class, 'store'])->name('admin_decaissement_store');
    Route::get('/decaissements/modifier/{id}', [App\Http\Controllers\Admin\DecaissementController::class, 'edit'])->name('admin_decaissement_edit');
    Route::post('/decaissements/update/{id}', [App\Http\Controllers\Admin\DecaissementController::class, 'update'])->name('admin_decaissement_update');
    Route::post('/decaissements/delete/{id}', [App\Http\Controllers\Admin\DecaissementController::class, 'delete'])->name('admin_decaissement_delete');






    //----------------- Mouvements

    Route::get('/mouvements/index', [App\Http\Controllers\Admin\MouvementController::class, 'index'])->name('admin_mouvements_index');
    Route::get('/mouvements/modifier/{id}', [App\Http\Controllers\Admin\MouvementController::class, 'edit'])->name('admin_mouvements_edit');
    Route::post('/mouvements/update/{id}', [App\Http\Controllers\Admin\MouvementController::class, 'update'])->name('admin_mouvemnts_update');
    Route::post('/mouvements/delete/{id}', [App\Http\Controllers\Admin\MouvementController::class, 'delete'])->name('admin_mouvemnts_delete');




    //----------------- Caissiers

    Route::get('/caissiers/index', [App\Http\Controllers\Admin\CaissierController::class, 'index'])->name('admin_caissiers_index');
    Route::get('/caissiers/detail/{id}', [App\Http\Controllers\Admin\MouvementController::class, 'edit'])->name('admin_caissiers_detail');






    //----------------- Depenses

    Route::get('/depenses/index', [App\Http\Controllers\Admin\DepenseController::class, 'index'])->name('admin_depenses_index');
    Route::get('/depenses/mine', [App\Http\Controllers\Admin\DepenseController::class, 'mine'])->name('admin_depenses_mine');
    Route::get('/depenses/add', [App\Http\Controllers\Admin\DepenseController::class, 'add'])->name('admin_depenses_add');
    Route::post('/depenses/save', [App\Http\Controllers\Admin\DepenseController::class, 'store'])->name('admin_depenses_store');
    Route::get('/depenses/modifier/{id}', [App\Http\Controllers\Admin\DepenseController::class, 'edit'])->name('admin_depenses_edit');
    Route::post('/depenses/update/{id}', [App\Http\Controllers\Admin\DepenseController::class, 'update'])->name('admin_depenses_update');
    Route::post('/depenses/delete/{id}', [App\Http\Controllers\Admin\DepenseController::class, 'delete'])->name('admin_depenses_delete');

    Route::post('/depenses/valider/{id}', [App\Http\Controllers\Admin\DepenseController::class, 'valider'])->name('admin_depenses_valider');

    Route::get('/depenses/valides', [App\Http\Controllers\Admin\DepenseController::class, 'valides'])->name('admin_depenses_valides');


    Route::get('/depenses/parc', [App\Http\Controllers\Admin\DepenseController::class, 'index'])->name('admin_depenses_index');




//-----------------  Tableau de bord parc


    Route::get('/parc', [\App\Http\Controllers\Admin\TableauController::class, 'parc'])->name('parc');



    //----------------- Voitures

    Route::get('/voitures/index', [App\Http\Controllers\Admin\VoitureController::class, 'index'])->name('admin_voitures_index');
    Route::get('/voitures/add', [App\Http\Controllers\Admin\VoitureController::class, 'add'])->name('admin_voitures_add');
    Route::post('/voitures/save', [App\Http\Controllers\Admin\VoitureController::class, 'store'])->name('admin_voitures_store');
    Route::get('/voitures/modifier/{id}', [App\Http\Controllers\Admin\VoitureController::class, 'edit'])->name('admin_voitures_edit');
    Route::post('/voitures/update/{id}', [App\Http\Controllers\Admin\VoitureController::class, 'update'])->name('admin_voitures_update');
    Route::post('/voitures/delete/{id}', [App\Http\Controllers\Admin\VoitureController::class, 'delete'])->name('admin_voitures_delete');




    //----------------- Chauffeurs

    Route::get('/chauffeurs/index', [App\Http\Controllers\Admin\ChauffeurController::class, 'index'])->name('admin_chauffeurs_index');
    Route::get('/chauffeurs/add', [App\Http\Controllers\Admin\ChauffeurController::class, 'add'])->name('admin_chauffeurs_add');
    Route::post('/chauffeurs/save', [App\Http\Controllers\Admin\ChauffeurController::class, 'store'])->name('admin_chauffeurs_store');
    Route::get('/chauffeurs/modifier/{id}', [App\Http\Controllers\Admin\ChauffeurController::class, 'edit'])->name('admin_chauffeurs_edit');
    Route::post('/chauffeurs/update/{id}', [App\Http\Controllers\Admin\ChauffeurController::class, 'update'])->name('admin_chauffeurs_update');
    Route::post('/chauffeurs/delete/{id}', [App\Http\Controllers\Admin\ChauffeurController::class, 'delete'])->name('admin_chauffeurs_delete');



    //----------------- Lignes

    Route::get('/lignes/index', [App\Http\Controllers\Admin\LigneController::class, 'index'])->name('admin_lignes_index');
    Route::get('/lignes/add', [App\Http\Controllers\Admin\LigneController::class, 'add'])->name('admin_lignes_add');
    Route::post('/lignes/save', [App\Http\Controllers\Admin\LigneController::class, 'store'])->name('admin_lignes_store');
    Route::get('/lignes/modifier/{id}', [App\Http\Controllers\Admin\LigneController::class, 'edit'])->name('admin_lignes_edit');
    Route::post('/lignes/update/{id}', [App\Http\Controllers\Admin\LigneController::class, 'update'])->name('admin_lignes_update');
    Route::post('/lignes/delete/{id}', [App\Http\Controllers\Admin\LigneController::class, 'delete'])->name('admin_lignes_delete');


    //-----------------  Tableau de bord cantine


    Route::get('/cantine', [\App\Http\Controllers\Admin\TableauController::class, 'cantine'])->name('cantine');



        //----------------- Stocks

    Route::get('/stocks/index', [App\Http\Controllers\Admin\StockController::class, 'index'])->name('admin_stock_index');
    Route::get('/stocks/add', [App\Http\Controllers\Admin\StockController::class, 'add'])->name('admin_stok_add');
    Route::post('/stocks/save', [App\Http\Controllers\Admin\StockController::class, 'store'])->name('admin_stock_store');
    Route::get('/stocks/modifier/{id}', [App\Http\Controllers\Admin\StockController::class, 'edit'])->name('admin_stock_edit');
    Route::post('/stocks/update/{id}', [App\Http\Controllers\Admin\StockController::class, 'update'])->name('admin_stock_update');
    Route::post('/stocks/delete/{id}', [App\Http\Controllers\Admin\StockController::class, 'delete'])->name('admin_stock_delete');




           //----------------- Achats

    Route::get('/achats/index', [App\Http\Controllers\Admin\AchatController::class, 'index'])->name('admin_achats_index');



    
    Route::get('/achats/add', [App\Http\Controllers\Admin\AchatController::class, 'add'])->name('admin_achats_add');
    Route::post('/achats/save', [App\Http\Controllers\Admin\AchatController::class, 'store'])->name('admin_achats_store');
    Route::get('/achats/modifier/{id}', [App\Http\Controllers\Admin\AchatController::class, 'edit'])->name('admin_achats_edit');
    Route::post('/achats/update/{id}', [App\Http\Controllers\Admin\AchatController::class, 'update'])->name('admin_achats_update');
    Route::post('/achats/delete/{id}', [App\Http\Controllers\Admin\AchatController::class, 'delete'])->name('admin_achats_delete');



               //----------------- Magasins

    Route::get('/magasins/index', [App\Http\Controllers\Admin\MagasinController::class, 'index'])->name('admin_magasins_index');
    Route::get('/magasins/add', [App\Http\Controllers\Admin\MagasinController::class, 'add'])->name('admin_magasins_add');
    Route::post('/magasins/save', [App\Http\Controllers\Admin\MagasinController::class, 'store'])->name('admin_magasins_store');
    Route::get('/magasins/modifier/{id}', [App\Http\Controllers\Admin\MagasinController::class, 'edit'])->name('admin_magasins_edit');
    Route::post('/magasins/update/{id}', [App\Http\Controllers\Admin\MagasinController::class, 'update'])->name('admin_magasins_update');
    Route::post('/magasins/delete/{id}', [App\Http\Controllers\Admin\MagasinController::class, 'delete'])->name('admin_magasins_delete');



               //----------------- Produits

    Route::get('/produits/index', [App\Http\Controllers\Admin\ProduitController::class, 'index'])->name('admin_produits_index');
    Route::get('/produits/add', [App\Http\Controllers\Admin\ProduitController::class, 'add'])->name('admin_produits_add');
    Route::post('/produits/save', [App\Http\Controllers\Admin\ProduitController::class, 'store'])->name('admin_produits_store');
    Route::get('/produits/modifier/{id}', [App\Http\Controllers\Admin\ProduitController::class, 'edit'])->name('admin_produits_edit');
    Route::post('/produits/update/{id}', [App\Http\Controllers\Admin\ProduitController::class, 'update'])->name('admin_produits_update');
    Route::post('/produits/delete/{id}', [App\Http\Controllers\Admin\ProduitController::class, 'delete'])->name('admin_produits_delete');


     //----------------- Fournisseurs

    Route::get('/fournisseurs/index', [App\Http\Controllers\Admin\FournisseurController::class, 'index'])->name('admin_fournisseurs_index');
    Route::get('/fournisseurs/add', [App\Http\Controllers\Admin\FournisseurController::class, 'add'])->name('admin_fournisseurs_add');
    Route::post('/fournisseurs/save', [App\Http\Controllers\Admin\FournisseurController::class, 'store'])->name('admin_fournisseurs_store');
    Route::get('/fournisseurs/modifier/{id}', [App\Http\Controllers\Admin\FournisseurController::class, 'edit'])->name('admin_fournisseurs_edit');
    Route::post('/fournisseurs/update/{id}', [App\Http\Controllers\Admin\FournisseurController::class, 'update'])->name('admin_fournisseurs_update');
    Route::post('/fournisseurs/delete/{id}', [App\Http\Controllers\Admin\FournisseurController::class, 'delete'])->name('admin_fournisseurs_delete');




        //----------------- Souscriptions

        Route::get('/cantine/souscriptions/index', [App\Http\Controllers\Admin\SouscriptionController::class, 'indexCantine'])->name('admin_cantine_souscription_index');
        Route::get('/cantine/souscriptions/add', [App\Http\Controllers\Admin\SouscriptionController::class, 'addCantine'])->name('admin_cantine_souscriptionadd');
        Route::post('/cantine/souscriptions//save', [App\Http\Controllers\Admin\SouscriptionController::class, 'storeCantine'])->name('admin_cantine_souscription_store');
        Route::get('/cantine/modifier/{id}', [App\Http\Controllers\Admin\SouscriptionController::class, 'editCantine'])->name('admin_cantine_souscription_edit');

        Route::post('/cantine/souscrptons/update/{id}', [App\Http\Controllers\Admin\SouscriptionController::class, 'updateCantine'])->name('admin_cantine_souscription_update');
        Route::post('/cantine/souscrptons/delete/{id}', [App\Http\Controllers\Admin\SouscriptionController::class, 'deleteCantine'])->name('admin_cantine_souscription_delete');




    //----------------- Utilisateurs

    Route::get('/utilisateurs/index', [App\Http\Controllers\Admin\UtilisateurController::class, 'index'])->name('admin_utilisateur_index');
    Route::get('/utilisateurs/add', [App\Http\Controllers\Admin\UtilisateurController::class, 'add'])->name('admin_utilisateur_add');
    Route::post('/utilisateurs/save', [App\Http\Controllers\Admin\UtilisateurController::class, 'store'])->name('admin_utilisateur_store');
    Route::get('/utilisateurs/modifier/{id}', [App\Http\Controllers\Admin\UtilisateurController::class, 'edit'])->name('admin_utilisateur_edit');
    Route::post('/utilisateurs/update/{id}', [App\Http\Controllers\Admin\UtilisateurController::class, 'update'])->name('admin_utilisateur_update');
    Route::post('/utilisateurs/delete/{id}', [App\Http\Controllers\Admin\UtilisateurController::class, 'delete'])->name('admin_utilisateur_delete');


    //----------------- Cycles

    Route::get('/cycles/index', [App\Http\Controllers\Admin\CycleController::class, 'index'])->name('admin_cycle_index');
    Route::get('/cycles/add', [App\Http\Controllers\Admin\CycleController::class, 'add'])->name('admin_cycle_add');
    Route::post('/cycles/save', [App\Http\Controllers\Admin\CycleController::class, 'store'])->name('admin_cycle_store');
    Route::get('/cycles/modifier/{id}', [App\Http\Controllers\Admin\CycleController::class, 'edit'])->name('admin_cycle_edit');
    Route::post('/cycles/update/{id}', [App\Http\Controllers\Admin\CycleController::class, 'update'])->name('admin_cycle_update');
    Route::post('/cycles/delete/{id}', [App\Http\Controllers\Admin\CycleController::class, 'delete'])->name('admin_cycle_delete');



    //----------------- Niveaux

    Route::get('/niveaux/index', [App\Http\Controllers\Admin\NiveauController::class, 'index'])->name('admin_niveau_index');
    Route::get('/niveaux/add', [App\Http\Controllers\Admin\NiveauController::class, 'add'])->name('admin_niveau_add');
    Route::post('/niveaux/save', [App\Http\Controllers\Admin\NiveauController::class, 'store'])->name('admin_niveau_store');
    Route::get('/niveaux/modifier/{id}', [App\Http\Controllers\Admin\NiveauController::class, 'edit'])->name('admin_niveau_edit');
    Route::post('/niveaux/update/{id}', [App\Http\Controllers\Admin\NiveauController::class, 'update'])->name('admin_niveau_update');
    Route::post('/niveaux/delete/{id}', [App\Http\Controllers\Admin\NiveauController::class, 'delete'])->name('admin_niveau_delete');




    //----------------- Classes

    Route::get('/classes/index', [App\Http\Controllers\Admin\ClasseController::class, 'index'])->name('admin_classe_index');
    Route::get('/classes/add', [App\Http\Controllers\Admin\ClasseController::class, 'add'])->name('admin_classe_add');
    Route::post('/classes/save', [App\Http\Controllers\Admin\ClasseController::class, 'store'])->name('admin_classe_store');
    Route::get('/classes/modifier/{id}', [App\Http\Controllers\Admin\ClasseController::class, 'edit'])->name('admin_classe_edit');
    Route::post('/classes/update/{id}', [App\Http\Controllers\Admin\ClasseController::class, 'update'])->name('admin_classe_update');
    Route::post('/classes/delete/{id}', [App\Http\Controllers\Admin\ClasseController::class, 'delete'])->name('admin_classe_delete');


        //----------------- Tranches

    Route::get('/tranches/index', [App\Http\Controllers\Admin\TrancheController::class, 'index'])->name('admin_tranches_index');
    Route::get('/tranches/add', [App\Http\Controllers\Admin\TrancheController::class, 'add'])->name('admin_tranches_add');
    Route::post('/tranches/save', [App\Http\Controllers\Admin\TrancheController::class, 'store'])->name('admin_tranches_store');
    Route::get('/tranches/modifier/{id}', [App\Http\Controllers\Admin\TrancheController::class, 'edit'])->name('admin_tranches_edit');
    Route::post('/tranches/update/{id}', [App\Http\Controllers\Admin\TrancheController::class, 'update'])->name('admin_tranches_update');
    Route::post('/tranches/delete/{id}', [App\Http\Controllers\Admin\TrancheController::class, 'delete'])->name('admin_tranches_delete');



    //----------------- Frais ecoles

    Route::get('/fraisecoles/index', [App\Http\Controllers\Admin\FraisEcoleController::class, 'index'])->name('admin_fraisecole_index');
    Route::get('/fraisecoles/add', [App\Http\Controllers\Admin\FraisEcoleController::class, 'add'])->name('admin_fraisecole_add');
    Route::post('/fraisecoles/save', [App\Http\Controllers\Admin\FraisEcoleController::class, 'store'])->name('admin_fraisecole_store');
    Route::get('/fraisecoles/modifier/{id}', [App\Http\Controllers\Admin\FraisEcoleController::class, 'edit'])->name('admin_fraisecole_edit');
    Route::post('/fraisecoles/update/{id}', [App\Http\Controllers\Admin\FraisEcoleController::class, 'update'])->name('admin_fraisecole_update');
    Route::post('/fraisecoles/delete/{id}', [App\Http\Controllers\Admin\FraisEcoleController::class, 'delete'])->name('admin_fraisecole_delete');



          //----------------- Articles vendus

          Route::get('/articles/index', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('admin_article_index');
          Route::post('/articles/save', [App\Http\Controllers\Admin\ArticleController::class, 'store'])->name('admin_articles_store');
          Route::get('/articles/modifier/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('admin_articles_edit');
          Route::post('/articles/update/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('admin_articles_update');
          Route::post('/articles/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'delete'])->name('admin_articles_delete');



});
