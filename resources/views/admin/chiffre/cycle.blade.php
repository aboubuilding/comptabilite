
@extends('layout.app')

@section('title')

    Chiffre d affaire  | Cycles

@endsection

@section('css')



    <link href="{{asset('admin/css/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('nav')
    @include('admin.aside')
@endsection



@section('contenu')

@php



            $user_value = session()->get('LoginUser');
            $compte_id = $user_value['compte_id'];

            $utilisateur = App\Models\User::rechercheUserById($compte_id);

            $role  = $utilisateur->role;
@endphp


<div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-title flex-wrap">
                                    <div class="input-group search-area mb-md-0 mb-3">

                                    </div>
                                    <div>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" id="lancerArticle">
                                         + Article
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--column-->
                            <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                                <div class="table-responsive full-data">
                                    <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer" id="example-student">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                </th>
                                                <th>Libelle </th>
                                                <th>Total  </th>
                                                <th>Anciens  </th>
                                                <th>Nouveaux   </th>
                                                <th>Scolarité   </th>
                                                <th>Cantine   </th>
                                                <th>Bus    </th>
                                                <th>Livre     </th>


                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        @foreach( $data as $cycle )


                                            <tr>
                                                <td>
                                                    <div class="checkbox me-0 align-self-center">
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="checkbox" class="form-check-input" id="check8" required="">
                                                            <label class="custom-control-label" for="check8"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="trans-list">

                                                        <h4>{{ $cycle['libelle'] }}</h4>
                                                    </div>
                                                </td>


                                                <td><h6 class="mb-0">{{ $cycle['total_eleves'] }} </h6></td>
                                                <td><h6 class="mb-0">{{ $cycle['total_anciens'] }} </h6></td>
                                                <td><h6 class="mb-0">{{ $cycle['total_nouveau'] }} </h6></td>


                                                <td><h6 class="mb-0">


                                                    {{ number_format(  $cycle['paiement_scolarite'] , 0, ',', ' ') }}




                                                </h6></td>


                                                <td><h6 class="mb-0">


                                                    {{ number_format( $cycle['paiement_cantine'], 0, ',', ' ') }}




                                                </h6></td>

                                                <td><h6 class="mb-0">


                                                    {{ number_format($cycle['paiement_bus'], 0, ',', ' ') }}




                                                </h6></td>


                                                <td><h6 class="mb-0">


                                                    {{ number_format($cycle['paiement_livre'], 0, ',', ' ') }}




                                                </h6></td>





                                                <td>
                                                    <div class="d-flex">
                                                        <a href="#" class="btn btn-danger shadow btn-xs sharp me-1 detailCycle" style="background-color: #1EA1F3; border: #1EA1F3" data-id="{{$cycle['id']}}" title="Détails  " data-id="{{$cycle['id']}}"><i class="fa fa-eye"></i></a>




                                                    </div>
                                                </td>
                                            </tr>


                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/column-->
                        </div>
                    </div>
                </div>

            </div>
        </div>


@endsection



@section('js')

    <!--datatables-->
    <script src="{{asset('admin')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin')}}/js/plugins-init/datatables.init.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{asset('admin')}}/vendor/wow-master/dist/wow.min.js"></script>

    <script src="{{asset('admin/js/sweetalert2/sweetalert2.min.js')}}"></script>



@endsection
