<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class=" " href="{{url('/')}}" aria-expanded="false">
                    <i class="material-symbols-outlined">home</i>
                    <span class="nav-text">Tableau de bord </span>
                </a>




            </li>


            @php
                $user_value = session()->get('LoginUser');
                $compte_id = $user_value['compte_id'];

                $user = App\Models\User::rechercheUserById($compte_id);

                $role  = $user->role;

            @endphp

            @if( $role == \App\Types\Role::DIRECTEUR || $role == \App\Types\Role::ADMIN )

            <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false" >
                <i class="material-symbols-outlined">school</i>
                <span class="nav-text">Inscriptions </span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{url('/inscriptions/index')}}">Toutes les inscriptions  </a></li>
                <li><a href="{{url('/inscriptions/cycles')}}">Cycles   </a></li>
                <li><a href="{{url('/inscriptions/niveaux')}}">Niveaux    </a></li>
                <li><a href="{{url('/inscriptions/classes')}}">Classes </a></li>


            </ul>

        </li>

        @endif
        <li>
            <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons"> app_registration </i>
                <span class="nav-text">Paiements </span>
            </a>
            <ul aria-expanded="false">



                <li><a href="{{url('/paiements/index')}}">Tous les paiements   </a></li>

                @if( $role == \App\Types\Role::DIRECTEUR || $role == \App\Types\Role::ADMIN )


                <li><a href="{{url('/paiements/index')}}">Tous les details   </a></li>
                <li><a href="{{url('/paiements/mine')}}">Scolarites   </a></li>
                <li><a href="{{url('/paiements/all')}}">Cantines  </a></li>
                <li><a href="{{url('/paiements/all')}}">Bus   </a></li>
                <li><a href="{{url('/paiements/all')}}">Frais d inscriptions    </a></li>
                <li><a href="{{url('/paiements/all')}}">Frais d' assurance    </a></li>
                <li><a href="{{url('/paiements/all')}}">Activités extra scolaire  </a></li>
                <li><a href="{{url('/paiements/all')}}">Livres  </a></li>
                <li><a href="{{url('/paiements/all')}}">Produits   </a></li>

              @endif


            </ul>

        </li>


  @if( $role == \App\Types\Role::DIRECTEUR || $role == \App\Types\Role::ADMIN )

        <li>
    <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
        <i class="material-icons"> app_registration </i>
        <span class="nav-text">Statistiques       </span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{url('/paiements/mine')}}">Tous    </a></li>
        <li><a href="{{url('/paiements/mine')}}">Scolarités   </a></li>
        <li><a href="{{url('/paiements/all')}}">Cantines  </a></li>
        <li><a href="{{url('/paiements/all')}}">Bus   </a></li>
        <li><a href="{{url('/paiements/all')}}">Frais d inscriptions    </a></li>
        <li><a href="{{url('/paiements/all')}}">Frais d' assurance    </a></li>
        <li><a href="{{url('/paiements/all')}}">Activités extra scolaire  </a></li>
        <li><a href="{{url('/paiements/all')}}">Livres  </a></li>
        <li><a href="{{url('/paiements/all')}}">Produits   </a></li>



    </ul>

</li>


@endif


        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons"> table_chart </i>
                <span class="nav-text">Caisses </span>
            </a>
            <ul aria-expanded="false">


                <li><a href="{{url('/caisses/index')}}">Toutes les  caisses   </a></li>
                <li><a href="{{url('/encaissements/index')}}">Tous les encaissements </a></li>
                <li><a href="{{url('/decaissements/index')}}">Tous les decaissements  </a></li>
                <li><a href="{{url('/mouvements/index')}}">Tous  les  mouvements      </a></li>



            </ul>

        </li>


        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons">folder</i>
                <span class="nav-text">Dépenses </span>
            </a>
            <ul aria-expanded="false">

                <li><a href="{{url('/depenses/index')}}">Toutes les depenses     </a></li>

                @if( $role == \App\Types\Role::DIRECTEUR || $role == \App\Types\Role::ADMIN )
                <li><a href="{{url('/depenses/index')}}">Valider les depenses     </a></li>

                <li><a href="{{url('/budgets/index')}}">Budgets      </a></li>
                <li><a href="{{url('/lignebudgetaires/index')}}">Lignes budgetaires  </a></li>
                @endif

            </ul>

        </li>


        @if( $role == \App\Types\Role::DIRECTEUR || $role == \App\Types\Role::ADMIN )

        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Parc     </span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{url('/votures/index')}}">Voitures    </a></li>
                <li><a href="{{url('/chauffeurs/index')}}">Chauffeurs     </a></li>
                <li><a href="{{url('/lignes/index')}}">Lignes de bus      </a></li>
                <li><a href="{{url('/lignes/index')}}">Tous les paiements      </a></li>
                <li><a href="{{url('/lignes/index')}}">Toutes les depenses    </a></li>
                <li><a href="{{url('/lignes/index')}}">Souscripions       </a></li>


            </ul>

        </li>


        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
            <i class="material-symbols-outlined">person</i>
            <span class="nav-text">Cantines      </span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{url('/votures/index')}}">Stocks    </a></li>
            <li><a href="{{url('/chauffeurs/index')}}">Achats de produits      </a></li>
            <li><a href="{{url('/lignes/index')}}">Magasins      </a></li>
            <li><a href="{{url('/lignes/index')}}">Produits      </a></li>
            <li><a href="{{url('/lignes/index')}}">Souscripions       </a></li>



        </ul>

    </li>


    @endif





        <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                <i class="material-icons">article</i>
                <span class="nav-text">Parametres </span>
            </a>
            <ul aria-expanded="false">

                @if( $role == \App\Types\Role::DIRECTEUR || $role == \App\Types\Role::ADMIN )
                <li><a href="{{url('/utilisateurs/index')}}">Utilisateurs</a></li>
                <li><a href="{{url('/cycles/index')}}">Cycles </a></li>

                <li><a href="{{url('/niveaux/index')}}">Niveaux </a></li>
                <li><a href="{{url('/classes/index')}}">Classes </a></li>

                @endif
                <li><a href="{{url('/classes/index')}}">Type de frais  </a></li>
                <li><a href="{{url('/classes/index')}}">Produits   </a></li>


            </ul>
        </li>


        </ul>

    </div>
</div>

