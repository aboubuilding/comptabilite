<!-- Modal -->
<div class="modal fade" id="addInscription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="modal-dialog modal-lg modal-dialog-center" method="post" action="#" enctype="multipart/form-data" id="form">

        @csrf


        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="defaultModalLabel">New Student Deatils</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <h5 class="mb-0">Information de l ' eleve </h5>
                    <hr>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" ><br>




                        </div>

                        <span class="text-danger error-text libelle_error"> </span>

                    </div>

                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" ><br>


                        </div>

                        <span class="text-danger error-text prenom_error"> </span>

                    </div>

                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date de naissance </label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" ><br>




                        </div>

                        <span class="text-danger error-text date_naissance_error"> </span>

                    </div>


                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Lieu  de naissance </label>
                            <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" ><br>


                        </div>

                        <span class="text-danger error-text lieu_naissance_error"> </span>

                    </div>




                    <div class="col-xl-6">
                        <div class="mb-3">
                                <label  class="form-label d-block">Sexe </label>
                            <select class="default-select col-xl-12"  id="sexe" name="sexe">
                                <option value="0">   </option>role
                                <option value="{{\App\Types\Sexe::MASCULIN}}">Masculin</option>
                                <option value="{{\App\Types\Sexe::FEMININ}}">Féminin   </option>


                            </select>

                        </div>

                        <span class="text-danger error-text sexe_error"> </span>

                    </div>



                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label  class="form-label d-block">Nationalite  </label>
                            <select class="default-select col-xl-12"  id="nationalite_id" name="nationalite_id">
                                <option  value="0">  </option>

                                @php

                                $nationalites = App\Models\Nationalite::getListe();

                                @endphp

                                @foreach( $nationalites  as $nationalite )

                                    <option value="{{$nationalite->id}}" >{{$nationalite->libelle}}</option>


                                @endforeach

                            </select>

                        </div>

                        <span class="text-danger error-text nationalite_id_error"> </span>

                    </div>

                    <h5 class="mb-0">Informations d' inscription </h5>
                    <hr>


                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label  class="form-label d-block">Niveau   </label>
                            <select class="default-select col-xl-12"  id="niveau_id" name="niveau_id">
                                <option  value="0">  </option>

                                @php

                                    $niveaus = App\Models\Niveau::getListe();

                                @endphp

                                @foreach( $niveaus  as $niveau )

                                    <option value="{{$niveau->id}}" >{{$niveau->libelle}}</option>


                                @endforeach

                            </select>

                        </div>

                        <span class="text-danger error-text niveau_id_error"> </span>

                    </div>

                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label  class="form-label d-block">Classe    </label>
                            <select class="default-select col-xl-12"  id="classe_id" name="classe_id">
                                <option  value="0">  </option>

                                @php

                                    $session = session()->get('LoginUser');
                                    $annee_id = $session['annee_id'];

                                      $classes = App\Models\Classe::getListe(null, null, $annee_id);

                                @endphp

                                @foreach( $classes  as $classe )

                                    <option value="{{$classe->id}}" >{{$classe->libelle}}</option>


                                @endforeach

                            </select>

                        </div>

                        <span class="text-danger error-text classe_id_error"> </span>

                    </div>



                </div>
            </div>

            <input type="hidden" id="idInscription">
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" id="annulerInscription" >Annuler </button>
                <button type="button" class="btn btn-primary" id="ajouterInscription">Ajouter  </button>
                <button type="button" class="btn btn-primary" id="updateInscription">Valider </button>
            </div>
        </div>


    </form>
</div>
