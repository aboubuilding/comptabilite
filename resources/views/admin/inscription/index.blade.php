
@extends('layout.app')

@section('title')

    Comptabilité | Inscriptions

@endsection

@section('css')



    <link href="{{asset('admin/css/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('titre')
   Liste des inscrits
@endsection

@section('nav')
    @include('admin.aside')
@endsection



@section('contenu')


    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body pb-xl-4 pb-sm-3 pb-0">
                            <div class="row">
                                <div class="col-xl-3 col-6">
                                    <div class="content-box">
                                        <div class="icon-box icon-box-xl std-data">
                                            <svg width="25" height="25" viewBox="0 0 30 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9288 37.75H3.75C1.67875 37.75 0 36.0713 0 34V23.5863C0 21.7738 1.29625 20.2213 3.07875 19.8975C5.72125 19.4163 10.2775 18.5875 12.855 18.12C14.2737 17.8612 15.7263 17.8612 17.145 18.12C19.7225 18.5875 24.2788 19.4163 26.9213 19.8975C28.7038 20.2213 30 21.7738 30 23.5863C30 26.3125 30 31.0825 30 34C30 36.0713 28.3212 37.75 26.25 37.75H12.9288ZM24.785 22.05L24.79 22.0563C25.0088 22.3838 25.06 22.795 24.9287 23.1662L24.0462 25.6662C23.9312 25.9925 23.685 26.2575 23.3675 26.3963L21.7075 27.12L22.3675 28.4412C22.5525 28.81 22.5425 29.2462 22.3425 29.6075L19.2075 35.25H26.25C26.94 35.25 27.5 34.69 27.5 34C27.5 31.0825 27.5 26.3125 27.5 23.5863C27.5 22.9825 27.0675 22.465 26.4738 22.3562L24.785 22.05ZM21.3663 21.4275L16.6975 20.5788C15.575 20.375 14.425 20.375 13.3025 20.5788L8.63375 21.4275L7.63625 22.9238L8.13 24.3213L10.5 25.3537C10.8138 25.4912 11.0575 25.7512 11.175 26.0737C11.2925 26.3962 11.2712 26.7525 11.1175 27.0588L10.1625 28.9688L13.6525 35.25H16.3475L19.8375 28.9688L18.8825 27.0588C18.7288 26.7525 18.7075 26.3962 18.825 26.0737C18.9425 25.7512 19.1862 25.4912 19.5 25.3537L21.87 24.3213L22.3638 22.9238L21.3663 21.4275ZM5.215 22.05L3.52625 22.3562C2.9325 22.465 2.5 22.9825 2.5 23.5863V34C2.5 34.69 3.06 35.25 3.75 35.25H10.7925L7.6575 29.6075C7.4575 29.2462 7.4475 28.81 7.6325 28.4412L8.2925 27.12L6.6325 26.3963C6.315 26.2575 6.06875 25.9925 5.95375 25.6662L5.07125 23.1662C4.94 22.795 4.99125 22.3838 5.21 22.0563L5.215 22.05ZM23.75 29V31.5C23.75 32.19 24.31 32.75 25 32.75C25.69 32.75 26.25 32.19 26.25 31.5V29C26.25 28.31 25.69 27.75 25 27.75C24.31 27.75 23.75 28.31 23.75 29ZM15 0.25C10.5163 0.25 6.875 3.89125 6.875 8.375C6.875 12.8587 10.5163 16.5 15 16.5C19.4837 16.5 23.125 12.8587 23.125 8.375C23.125 3.89125 19.4837 0.25 15 0.25ZM15 2.75C18.105 2.75 20.625 5.27 20.625 8.375C20.625 11.48 18.105 14 15 14C11.895 14 9.375 11.48 9.375 8.375C9.375 5.27 11.895 2.75 15 2.75Z" fill="white"/>
                                            </svg>
                                        </div>
                                        <div  class="chart-num">
                                            <p>Total</p>
                                            <h2 class="font-w700 mb-0">{{$total_inscrits}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <div class="content-box">
                                        <div class="teach-data icon-box icon-box-xl">
                                            <svg width="25" height="25" viewBox="0 0 30 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9288 37.75H3.75C1.67875 37.75 0 36.0713 0 34V23.5863C0 21.7738 1.29625 20.2213 3.07875 19.8975C5.72125 19.4163 10.2775 18.5875 12.855 18.12C14.2737 17.8612 15.7263 17.8612 17.145 18.12C19.7225 18.5875 24.2788 19.4163 26.9213 19.8975C28.7038 20.2213 30 21.7738 30 23.5863C30 26.3125 30 31.0825 30 34C30 36.0713 28.3212 37.75 26.25 37.75H12.9288ZM24.785 22.05L24.79 22.0563C25.0088 22.3838 25.06 22.795 24.9287 23.1662L24.0462 25.6662C23.9312 25.9925 23.685 26.2575 23.3675 26.3963L21.7075 27.12L22.3675 28.4412C22.5525 28.81 22.5425 29.2462 22.3425 29.6075L19.2075 35.25H26.25C26.94 35.25 27.5 34.69 27.5 34C27.5 31.0825 27.5 26.3125 27.5 23.5863C27.5 22.9825 27.0675 22.465 26.4738 22.3562L24.785 22.05ZM21.3663 21.4275L16.6975 20.5788C15.575 20.375 14.425 20.375 13.3025 20.5788L8.63375 21.4275L7.63625 22.9238L8.13 24.3213L10.5 25.3537C10.8138 25.4912 11.0575 25.7512 11.175 26.0737C11.2925 26.3962 11.2712 26.7525 11.1175 27.0588L10.1625 28.9688L13.6525 35.25H16.3475L19.8375 28.9688L18.8825 27.0588C18.7288 26.7525 18.7075 26.3962 18.825 26.0737C18.9425 25.7512 19.1862 25.4912 19.5 25.3537L21.87 24.3213L22.3638 22.9238L21.3663 21.4275ZM5.215 22.05L3.52625 22.3562C2.9325 22.465 2.5 22.9825 2.5 23.5863V34C2.5 34.69 3.06 35.25 3.75 35.25H10.7925L7.6575 29.6075C7.4575 29.2462 7.4475 28.81 7.6325 28.4412L8.2925 27.12L6.6325 26.3963C6.315 26.2575 6.06875 25.9925 5.95375 25.6662L5.07125 23.1662C4.94 22.795 4.99125 22.3838 5.21 22.0563L5.215 22.05ZM23.75 29V31.5C23.75 32.19 24.31 32.75 25 32.75C25.69 32.75 26.25 32.19 26.25 31.5V29C26.25 28.31 25.69 27.75 25 27.75C24.31 27.75 23.75 28.31 23.75 29ZM15 0.25C10.5163 0.25 6.875 3.89125 6.875 8.375C6.875 12.8587 10.5163 16.5 15 16.5C19.4837 16.5 23.125 12.8587 23.125 8.375C23.125 3.89125 19.4837 0.25 15 0.25ZM15 2.75C18.105 2.75 20.625 5.27 20.625 8.375C20.625 11.48 18.105 14 15 14C11.895 14 9.375 11.48 9.375 8.375C9.375 5.27 11.895 2.75 15 2.75Z" fill="white"/>
                                            </svg>
                                        </div>
                                        <div class="chart-num">
                                            <p>Garçons </p>
                                            <h2 class="font-w700 mb-0">{{$total_garcons}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <div class="content-box">
                                        <div class="event-data icon-box icon-box-xl">
                                            <svg width="25" height="25" viewBox="0 0 30 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9288 37.75H3.75C1.67875 37.75 0 36.0713 0 34V23.5863C0 21.7738 1.29625 20.2213 3.07875 19.8975C5.72125 19.4163 10.2775 18.5875 12.855 18.12C14.2737 17.8612 15.7263 17.8612 17.145 18.12C19.7225 18.5875 24.2788 19.4163 26.9213 19.8975C28.7038 20.2213 30 21.7738 30 23.5863C30 26.3125 30 31.0825 30 34C30 36.0713 28.3212 37.75 26.25 37.75H12.9288ZM24.785 22.05L24.79 22.0563C25.0088 22.3838 25.06 22.795 24.9287 23.1662L24.0462 25.6662C23.9312 25.9925 23.685 26.2575 23.3675 26.3963L21.7075 27.12L22.3675 28.4412C22.5525 28.81 22.5425 29.2462 22.3425 29.6075L19.2075 35.25H26.25C26.94 35.25 27.5 34.69 27.5 34C27.5 31.0825 27.5 26.3125 27.5 23.5863C27.5 22.9825 27.0675 22.465 26.4738 22.3562L24.785 22.05ZM21.3663 21.4275L16.6975 20.5788C15.575 20.375 14.425 20.375 13.3025 20.5788L8.63375 21.4275L7.63625 22.9238L8.13 24.3213L10.5 25.3537C10.8138 25.4912 11.0575 25.7512 11.175 26.0737C11.2925 26.3962 11.2712 26.7525 11.1175 27.0588L10.1625 28.9688L13.6525 35.25H16.3475L19.8375 28.9688L18.8825 27.0588C18.7288 26.7525 18.7075 26.3962 18.825 26.0737C18.9425 25.7512 19.1862 25.4912 19.5 25.3537L21.87 24.3213L22.3638 22.9238L21.3663 21.4275ZM5.215 22.05L3.52625 22.3562C2.9325 22.465 2.5 22.9825 2.5 23.5863V34C2.5 34.69 3.06 35.25 3.75 35.25H10.7925L7.6575 29.6075C7.4575 29.2462 7.4475 28.81 7.6325 28.4412L8.2925 27.12L6.6325 26.3963C6.315 26.2575 6.06875 25.9925 5.95375 25.6662L5.07125 23.1662C4.94 22.795 4.99125 22.3838 5.21 22.0563L5.215 22.05ZM23.75 29V31.5C23.75 32.19 24.31 32.75 25 32.75C25.69 32.75 26.25 32.19 26.25 31.5V29C26.25 28.31 25.69 27.75 25 27.75C24.31 27.75 23.75 28.31 23.75 29ZM15 0.25C10.5163 0.25 6.875 3.89125 6.875 8.375C6.875 12.8587 10.5163 16.5 15 16.5C19.4837 16.5 23.125 12.8587 23.125 8.375C23.125 3.89125 19.4837 0.25 15 0.25ZM15 2.75C18.105 2.75 20.625 5.27 20.625 8.375C20.625 11.48 18.105 14 15 14C11.895 14 9.375 11.48 9.375 8.375C9.375 5.27 11.895 2.75 15 2.75Z" fill="white"/>
                                            </svg>
                                        </div>
                                        <div class="chart-num">
                                            <p>Filles </p>
                                            <h2 class="font-w700 mb-0">{{$total_filles}}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6">
                                    <div class="content-box">
                                        <div class="food-data icon-box icon-box-xl bg-dark">
                                            <svg width="25" height="25" viewBox="0 0 30 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9288 37.75H3.75C1.67875 37.75 0 36.0713 0 34V23.5863C0 21.7738 1.29625 20.2213 3.07875 19.8975C5.72125 19.4163 10.2775 18.5875 12.855 18.12C14.2737 17.8612 15.7263 17.8612 17.145 18.12C19.7225 18.5875 24.2788 19.4163 26.9213 19.8975C28.7038 20.2213 30 21.7738 30 23.5863C30 26.3125 30 31.0825 30 34C30 36.0713 28.3212 37.75 26.25 37.75H12.9288ZM24.785 22.05L24.79 22.0563C25.0088 22.3838 25.06 22.795 24.9287 23.1662L24.0462 25.6662C23.9312 25.9925 23.685 26.2575 23.3675 26.3963L21.7075 27.12L22.3675 28.4412C22.5525 28.81 22.5425 29.2462 22.3425 29.6075L19.2075 35.25H26.25C26.94 35.25 27.5 34.69 27.5 34C27.5 31.0825 27.5 26.3125 27.5 23.5863C27.5 22.9825 27.0675 22.465 26.4738 22.3562L24.785 22.05ZM21.3663 21.4275L16.6975 20.5788C15.575 20.375 14.425 20.375 13.3025 20.5788L8.63375 21.4275L7.63625 22.9238L8.13 24.3213L10.5 25.3537C10.8138 25.4912 11.0575 25.7512 11.175 26.0737C11.2925 26.3962 11.2712 26.7525 11.1175 27.0588L10.1625 28.9688L13.6525 35.25H16.3475L19.8375 28.9688L18.8825 27.0588C18.7288 26.7525 18.7075 26.3962 18.825 26.0737C18.9425 25.7512 19.1862 25.4912 19.5 25.3537L21.87 24.3213L22.3638 22.9238L21.3663 21.4275ZM5.215 22.05L3.52625 22.3562C2.9325 22.465 2.5 22.9825 2.5 23.5863V34C2.5 34.69 3.06 35.25 3.75 35.25H10.7925L7.6575 29.6075C7.4575 29.2462 7.4475 28.81 7.6325 28.4412L8.2925 27.12L6.6325 26.3963C6.315 26.2575 6.06875 25.9925 5.95375 25.6662L5.07125 23.1662C4.94 22.795 4.99125 22.3838 5.21 22.0563L5.215 22.05ZM23.75 29V31.5C23.75 32.19 24.31 32.75 25 32.75C25.69 32.75 26.25 32.19 26.25 31.5V29C26.25 28.31 25.69 27.75 25 27.75C24.31 27.75 23.75 28.31 23.75 29ZM15 0.25C10.5163 0.25 6.875 3.89125 6.875 8.375C6.875 12.8587 10.5163 16.5 15 16.5C19.4837 16.5 23.125 12.8587 23.125 8.375C23.125 3.89125 19.4837 0.25 15 0.25ZM15 2.75C18.105 2.75 20.625 5.27 20.625 8.375C20.625 11.48 18.105 14 15 14C11.895 14 9.375 11.48 9.375 8.375C9.375 5.27 11.895 2.75 15 2.75Z" fill="white"/>
                                            </svg>
                                        </div>
                                        <div class="chart-num">
                                            <p>Nouveaux</p>
                                            <h2 class="font-w700 mb-0">{{$total_nouveaux}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page-title flex-wrap">

                                <div>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-rounded btn-success"><span
                                            class="btn-icon-start text-success"><i class="fa fa-upload color-success"></i>
                                        </span>Exporter en Excel </button>

                                    <button type="button" class="btn btn-rounded btn-danger"><span
                                            class="btn-icon-start text-success"><i class="fa fa-upload color-success"></i>
                                        </span>Exporter en Pdf </button>

                                </div>
                            </div>
                        </div>
                        <!--column-->
                        <div class="col-xl-12 wow fadeInUp" data-wow-delay="1.5s">
                            <div class="table-responsive full-data">
                                <table class="table-responsive-lg table display dataTablesCard student-tab dataTable no-footer" id="example">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                        </th>
                                        <th>Matricule  </th>
                                        <th>Nom et prénom  </th>

                                        <th>Inscription   </th>
                                        <th>Sexe </th>
                                        <th>Statut  </th>
                                        <th>Contact </th>

                                        <th class="text-end">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach( $data as $inscription  )


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

                                                    <h4>{{ $inscription ['matricule'] }}</h4>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="trans-list">

                                                    <h4>{{ $inscription ['nom_eleve'] }}</h4>
                                                </div>
                                            </td>



                                            <td><h6 class="mb-0">{{ $inscription ['niveau'] }} </h6></td>

                                            <td>

                                                @if($inscription ['sexe'] === 1)

                                                    <span class="badge badge-rounded badge-success">M </span>

                                                @endif

                                                @if($inscription ['sexe'] === 2)

                                                    <span class="badge badge-rounded badge-success">F </span>

                                                @endif


                                            </td>


                                            <td>

                                                @if($inscription ['type_inscription'] === \App\Types\TypeInscription::INSCRIPTION)

                                                    <span class="badge badge-rounded badge-success">N </span>

                                                @endif

                                                @if($inscription ['type_inscription'] === \App\Types\TypeInscription::REINSCRIPTION)

                                                    <span class="badge badge-rounded badge-success">A </span>

                                                @endif


                                            </td>


                                            <td>
                                                <div class="d-flex">
                                                    <div class="icon-box icon-box-sm bg-light me-2">

                                                        <a href=""  class="sendSMS" title="Envoyez un message WHatsapp ">

                                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18.4401 11C18.2201 11 17.9901 10.93 17.7701 10.88C17.3246 10.7818 16.8868 10.6515 16.4601 10.49C15.9962 10.3212 15.4862 10.33 15.0284 10.5146C14.5706 10.6992 14.1972 11.0466 13.9801 11.49L13.7601 11.94C12.7861 11.3982 11.8911 10.7252 11.1001 9.94001C10.3149 9.14902 9.64192 8.254 9.1001 7.28L9.5201 7.00001C9.96347 6.78292 10.3109 6.40954 10.4955 5.9517C10.6801 5.49386 10.6889 4.98392 10.5201 4.52001C10.3613 4.09243 10.231 3.6548 10.1301 3.21001C10.0801 2.99001 10.0401 2.76001 10.0101 2.53001C9.88867 1.82563 9.51973 1.18775 8.96972 0.731245C8.41972 0.274742 7.7248 0.0296143 7.0101 0.0400054H4.0101C3.57913 0.0359589 3.15235 0.124819 2.75881 0.300536C2.36527 0.476253 2.01421 0.734701 1.72953 1.05829C1.44485 1.38187 1.23324 1.763 1.10909 2.17572C0.984942 2.58844 0.95118 3.02306 1.0101 3.45001C1.54284 7.63939 3.45613 11.5319 6.44775 14.5126C9.43938 17.4934 13.3388 19.3925 17.5301 19.91H17.9101C18.6475 19.9111 19.3595 19.6405 19.9101 19.15C20.2265 18.867 20.4792 18.5202 20.6516 18.1323C20.8239 17.7445 20.9121 17.3244 20.9101 16.9V13.9C20.8979 13.2054 20.6449 12.5366 20.1944 12.0077C19.744 11.4788 19.1239 11.1226 18.4401 11ZM18.9401 17C18.9399 17.142 18.9095 17.2823 18.8509 17.4116C18.7923 17.5409 18.7068 17.6563 18.6001 17.75C18.4884 17.8465 18.3577 17.9185 18.2165 17.9616C18.0753 18.0047 17.9267 18.0177 17.7801 18C14.035 17.5198 10.5563 15.8065 7.89282 13.1303C5.2293 10.4541 3.53251 6.96734 3.0701 3.22001C3.05419 3.07352 3.06813 2.92534 3.1111 2.7844C3.15407 2.64346 3.22517 2.51269 3.3201 2.40001C3.41381 2.29334 3.52916 2.20785 3.65848 2.14922C3.7878 2.0906 3.92812 2.06019 4.0701 2.06001H7.0701C7.30265 2.05483 7.52972 2.13088 7.71224 2.27508C7.89476 2.41927 8.02131 2.62258 8.0701 2.85001C8.1101 3.12334 8.1601 3.39334 8.2201 3.66001C8.33562 4.18715 8.48936 4.70518 8.6801 5.21001L7.2801 5.86001C7.1604 5.91493 7.05272 5.99295 6.96326 6.0896C6.87379 6.18625 6.8043 6.29962 6.75877 6.4232C6.71324 6.54678 6.69257 6.67814 6.69795 6.80973C6.70332 6.94132 6.73464 7.07055 6.7901 7.19C8.2293 10.2728 10.7073 12.7508 13.7901 14.19C14.0336 14.29 14.3066 14.29 14.5501 14.19C14.6748 14.1454 14.7894 14.0765 14.8873 13.9872C14.9851 13.8979 15.0643 13.7901 15.1201 13.67L15.7401 12.27C16.2571 12.4549 16.7847 12.6085 17.3201 12.73C17.5868 12.79 17.8568 12.84 18.1301 12.88C18.3575 12.9288 18.5608 13.0553 18.705 13.2379C18.8492 13.4204 18.9253 13.6475 18.9201 13.88L18.9401 17Z" fill="var(--primary)"/>
                                                            </svg>


                                                        </a>

                                                    </div>
                                                    <div class="icon-box icon-box-sm bg-light">

                                                        <a href=""  class="sendEmail" title="Envoyez un email  ">
                                                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M19 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.31607 1.44129 0 2.20435 0 3V13C0 13.7956 0.31607 14.5587 0.87868 15.1213C1.44129 15.6839 2.20435 16 3 16H19C19.7956 16 20.5587 15.6839 21.1213 15.1213C21.6839 14.5587 22 13.7956 22 13V3C22 2.20435 21.6839 1.44129 21.1213 0.87868C20.5587 0.316071 19.7956 0 19 0ZM20 12.75L15.1 8.35L20 4.92V12.75ZM2 4.92L6.9 8.35L2 12.75V4.92ZM8.58 9.53L10.43 10.82C10.5974 10.9361 10.7963 10.9984 11 10.9984C11.2037 10.9984 11.4026 10.9361 11.57 10.82L13.42 9.53L18.42 14H3.6L8.58 9.53ZM3 2H19C19.1857 2.00149 19.3674 2.05467 19.5245 2.15358C19.6817 2.25249 19.8083 2.39322 19.89 2.56L11 8.78L2.11 2.56C2.19171 2.39322 2.31826 2.25249 2.47545 2.15358C2.63265 2.05467 2.81428 2.00149 3 2Z" fill="var(--primary)"/>
                                                        </svg>

                                                        </a>

                                                    </div>
                                                </div>
                                            </td>



                                            <td>
                                                <div class="d-flex">
                                                    <div class="dropdown custom-dropdown ">
                                                        <div class="btn sharp tp-btn " data-bs-toggle="dropdown">
                                                            <svg width="18" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z" fill="#A098AE"/>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item modifierInscription" href="" data-id="{{$inscription['id']}}">Modifier  les informations </a>
                                                            <a class="dropdown-item" href="{{url('/inscriptions/detail/'.$inscription['id'])}}">Fiche de l eleve </a>

                                                        </div>
                                                    </div>


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

    @include('admin.inscription.modal')

@endsection



@section('js')

    <!--datatables-->
    <script src="{{asset('admin')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin')}}/js/plugins-init/datatables.init.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{asset('admin')}}/vendor/wow-master/dist/wow.min.js"></script>

    <script src="{{asset('admin/js/sweetalert2/sweetalert2.min.js')}}"></script>

    <script>
        jQuery(document).ready(function() {






            $("#annulerInscription").click(function(event) {
                event.preventDefault();

                annulerInscription()
            });



            //------------------------ Modification de la zone
            $(document).on('click', '.modifierInscription', function(event) {

                event.preventDefault();

                let id = $(this).data('id');
                let url = "/inscriptions/modifier/" + id;


                $.get(url, function(data) {

                    console.log(data.result);

                    $('#defaultModalLabel').text('Modifier les données d inscription ');

                    let inscription_modal = $('#addInscription');

                    // Données sur l eleve

                    $(inscription_modal).find('form').find('input[name="nom"]').val(data.eleve.nom);
                    $(inscription_modal).find('form').find('input[name="prenom"]').val(data.eleve.prenom);
                    $(inscription_modal).find('form').find('input[name="date_naissance"]').val(data.date_naissance_eleve);
                    $(inscription_modal).find('form').find('input[name="lieu_naissance"]').val(data.eleve.lieu_naissance);
                    $(inscription_modal).find('form').find('select[name="sexe"]').val(data.eleve.sexe);
                    $(inscription_modal).find('form').find('select[name="nationalite_id"]').val(data.eleve.nationalite_id);


                    // Données sur l' inscription

                    $(inscription_modal).find('form').find('select[name="niveau_id"]').val(data.inscription.niveau_id);
                    $(inscription_modal).find('form').find('select[name="classe_id"]').val(data.inscription.classe_id);


                    $('#idInscription').val(data.inscription.id);

                    $("#ajouterInscription").hide();
                    $("#updateInscription").show();

                    $(inscription_modal).modal('toggle');

                }, 'json')



            });



            $("#updateInscription").click(function(event) {
                event.preventDefault();

                updateInscription()
            });




        });



        //------------------------ Fermer  le popup d' ajout
        function annulerInscription() {



            $('#addInscription').modal('toggle');
        }

        //------------------------ Update de Inscription
        function updateInscription() {

            let allValid = true;


            let niveau_id = parseInt($("#niveau_id").val(), 10);
            let sexe = parseInt($("#sexe").val(), 10);
            let nationalite_id = parseInt($("#nationalite_id").val(), 10);

            let nom = $('#nom').val().trim();
            let prenom = $('#prenom').val().trim();
            let date_naissance = $('#date_naissance').val();
            let lieu_naissance = $('#lieu_naissance').val().trim();


            if (isNaN(niveau_id) || niveau_id === 0) {
                $('.niveau_id_error').text("Le niveau     est obligatoire ");
                allValid = false;

            }

            if (isNaN(sexe) || sexe === 0) {
                $('.sexe_error').text("Le sexe     est obligatoire ");
                allValid = false;

            }


            if (isNaN(nationalite_id) || nationalite_id === 0) {
                $('.nationalite_id_error').text("La nationalite      est obligatoire ");
                allValid = false;

            }


            if (nom === '') {
                $('.nom_error').text("Le nom    est obligatoire ");
                allValid = false;

            }


            if (prenom === '') {
                $('.prenom_error').text("Le prénom     est obligatoire ");
                allValid = false;

            }

            if (lieu_naissance === '') {
                $('.lieu_naissance_error').text("Le lieu de naissance      est obligatoire ");
                allValid = false;

            }

            if (date_naissance === '') {
                $('.date_naissance_error').text("La date  de naissance    est obligatoire ");
                allValid = false;

            }

            let id = $('#idInscription').val();


            if (allValid) {

                let form = document.getElementById('form');
                let formData = new FormData(form);


                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/inscriptions/update/" + id,
                    method: $(form).attr('method'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        // setting a timeout
                        $(form).find('span.error-text').text('');

                    },

                    success: function(data) {


                        console.log(data.code)

                        Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,


                            },

                            setTimeout(function() {
                                location.reload();
                            }, 2000));



                    },

                    error: function(data) {

                        console.log(data);



                    }



                });

            }


        }




    </script>



@endsection
