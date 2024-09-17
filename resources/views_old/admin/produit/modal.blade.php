<!-- Modal -->
<div class="modal fade" id="addProduit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="modal-dialog modal-dialog-center" method="post" action="#" enctype="multipart/form-data" id="form">

        @csrf


        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="defaultModalLabel">New Student Deatils</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">




                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Libelle </label>
                            <input type="text" class="form-control" id="libelle" name="libelle" ><br>




                        </div>

                        <span class="text-danger error-text libelle_error"> </span>

                    </div>

                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Prix  </label>
                            <input type="text" class="form-control" id="prix" name="prix" ><br>




                        </div>

                        <span class="text-danger error-text prix_error"> </span>

                    </div>




                </div>
            </div>

            <input type="hidden" id="idProduit">
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" id="annulerProduit" >Annuler </button>
                <button type="button" class="btn btn-primary" id="ajouterProduit">Ajouter  </button>
                <button type="button" class="btn btn-primary" id="updateProduit">Valider </button>
            </div>
        </div>


    </form>
</div>
