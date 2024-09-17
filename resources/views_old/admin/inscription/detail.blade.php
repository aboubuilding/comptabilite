
@extends('layout.app')

@section('title')

    Comptabilité | Detail Eleve

@endsection

@section('css')



    <link href="{{asset('admin/css/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('nav')
    @include('admin.aside')
@endsection

@section('titre')
 Fiche de l eleve {{$eleve->nom.' '.$eleve->prenom}}
@endsection



@section('contenu')


    <div class="content-body">
        <div class="container-fluid">
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card h-auto">
                        <div class="card-header p-0">
                            <div class="user-bg w-100">
                                <div class="user-svg">
                                    <svg width="264" height="109" viewBox="0 0 264 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.0107422" y="0.6521" width="263.592" height="275.13" rx="20" fill="#FCC43E"/>
                                    </svg>
                                </div>
                                <div class="user-svg-1">
                                    <svg width="264" height="59" viewBox="0 0 264 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="0.564056" width="263.592" height="275.13" rx="20" fill="#FB7D5B"/>
                                    </svg>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="user">
                                    <div class="user-media">
                                        <img src="{{asset('admin')}}/images/avatar/9.jpg" alt="" class="avatar avatar-xxl">
                                    </div>
                                    <div>
                                        <h2 class="mb-0">{{$eleve->nom.' '.$eleve->prenom}}</h2>
                                        <p class="text-primary font-w600">Eleve</p>
                                    </div>
                                </div>
                                <div class="dropdown custom-dropdown">
                                    <div class="btn sharp tp-btn " data-bs-toggle="dropdown">
                                        <svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.0012 0.359985C11.6543 0.359985 11.3109 0.428302 10.9904 0.561035C10.67 0.693767 10.3788 0.888317 10.1335 1.13358C9.88829 1.37883 9.69374 1.67 9.56101 1.99044C9.42828 2.31089 9.35996 2.65434 9.35996 3.00119C9.35996 3.34803 9.42828 3.69148 9.56101 4.01193C9.69374 4.33237 9.88829 4.62354 10.1335 4.8688C10.3788 5.11405 10.67 5.3086 10.9904 5.44134C11.3109 5.57407 11.6543 5.64239 12.0012 5.64239C12.7017 5.64223 13.3734 5.36381 13.8686 4.86837C14.3638 4.37294 14.6419 3.70108 14.6418 3.00059C14.6416 2.3001 14.3632 1.62836 13.8677 1.13315C13.3723 0.637942 12.7004 0.359826 12 0.359985H12.0012ZM3.60116 0.359985C3.25431 0.359985 2.91086 0.428302 2.59042 0.561035C2.26997 0.693767 1.97881 0.888317 1.73355 1.13358C1.48829 1.37883 1.29374 1.67 1.16101 1.99044C1.02828 2.31089 0.959961 2.65434 0.959961 3.00119C0.959961 3.34803 1.02828 3.69148 1.16101 4.01193C1.29374 4.33237 1.48829 4.62354 1.73355 4.8688C1.97881 5.11405 2.26997 5.3086 2.59042 5.44134C2.91086 5.57407 3.25431 5.64239 3.60116 5.64239C4.30165 5.64223 4.97339 5.36381 5.4686 4.86837C5.9638 4.37294 6.24192 3.70108 6.24176 3.00059C6.2416 2.3001 5.96318 1.62836 5.46775 1.13315C4.97231 0.637942 4.30045 0.359826 3.59996 0.359985H3.60116ZM20.4012 0.359985C20.0543 0.359985 19.7109 0.428302 19.3904 0.561035C19.07 0.693767 18.7788 0.888317 18.5336 1.13358C18.2883 1.37883 18.0937 1.67 17.961 1.99044C17.8283 2.31089 17.76 2.65434 17.76 3.00119C17.76 3.34803 17.8283 3.69148 17.961 4.01193C18.0937 4.33237 18.2883 4.62354 18.5336 4.8688C18.7788 5.11405 19.07 5.3086 19.3904 5.44134C19.7109 5.57407 20.0543 5.64239 20.4012 5.64239C21.1017 5.64223 21.7734 5.36381 22.2686 4.86837C22.7638 4.37294 23.0419 3.70108 23.0418 3.00059C23.0416 2.3001 22.7632 1.62836 22.2677 1.13315C21.7723 0.637942 21.1005 0.359826 20.4 0.359985H20.4012Z" fill="#A098AE"/>
                                        </svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="javascript:void(0);">Exporter en PDF</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Exporter en excel </a>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <img src="{{asset('admin')}}/images/profile.svg" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <span>Parent principal :</span><br>


                                            <span class="mb-0">{{$parent_principal->nom_parent.' '.$parent_principal->prenom_parent}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">

                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <img src="{{asset('admin')}}/images/svg/location.svg" alt="">
                                            </a>

                                        </li>
                                        <li><span>Adresse:</span><h5 class="mb-0">{{$parent_principal->adresse}}</h5></li>
                                    </ul>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <img src="{{asset('admin')}}/images/svg/phone.svg" alt="">
                                            </a>
                                        </li>
                                        <li><span>Télephone :</span><h5 class="mb-0">{{$parent_principal->telephone}}</h5></li>
                                    </ul>
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-sm-6">
                                    <ul class="student-details">
                                        <li class="me-2">
                                            <a class="icon-box bg-secondary">
                                                <img src="{{asset('admin')}}/images/svg/email.svg" alt="">
                                            </a>

                                        </li>
                                        <li><span>Email:</span><h5 class="mb-0">{{$parent_principal->email}}</h5></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card h-auto">
                        <div class="card-header border-0 p-3">
                            <h4 class="heading mb-0">Hstorique des paiements </h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive basic-tbl">
                                <table id="example-payment" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>Reference </th>
                                        <th>Date paiement  </th>
                                        <th>Libelle</th>
                                        <th>Montant </th>
                                        <th>Statut </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="icon-box  icon-box-sm bg-danger">
                                                    <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M25.0004 1.33333C25.013 1.24043 25.013 1.14624 25.0004 1.05333C24.9888 0.975052 24.9664 0.898765 24.9337 0.826666C24.8985 0.761503 24.8584 0.699103 24.8137 0.64C24.763 0.555671 24.7001 0.479292 24.6271 0.413333L24.4671 0.32C24.3901 0.262609 24.3046 0.21762 24.2137 0.186666H23.9471C23.8658 0.107993 23.7709 0.0447434 23.6671 0H17.0004C16.6468 0 16.3076 0.140476 16.0576 0.390525C15.8075 0.640573 15.6671 0.979711 15.6671 1.33333C15.6671 1.68696 15.8075 2.02609 16.0576 2.27614C16.3076 2.52619 16.6468 2.66667 17.0004 2.66667H20.7737L15.4404 8.94667L9.68039 5.52C9.40757 5.35773 9.0858 5.29813 8.77296 5.3519C8.46011 5.40567 8.17671 5.56929 7.97373 5.81333L1.30706 13.8133C1.19479 13.9481 1.1102 14.1036 1.05815 14.2711C1.00609 14.4386 0.987577 14.6147 1.00368 14.7893C1.01978 14.9639 1.07017 15.1337 1.15198 15.2888C1.23378 15.4439 1.34538 15.5814 1.48039 15.6933C1.72028 15.8921 2.02219 16.0006 2.33373 16C2.52961 16.0003 2.72315 15.9575 2.9006 15.8745C3.07804 15.7915 3.23503 15.6705 3.36039 15.52L9.29373 8.4L14.9871 11.8133C15.2571 11.9735 15.575 12.0332 15.8848 11.982C16.1945 11.9308 16.4763 11.7719 16.6804 11.5333L22.3337 4.93333V8C22.3337 8.35362 22.4742 8.69276 22.7242 8.94281C22.9743 9.19286 23.3134 9.33333 23.6671 9.33333C24.0207 9.33333 24.3598 9.19286 24.6099 8.94281C24.8599 8.69276 25.0004 8.35362 25.0004 8V1.33333Z" fill="#FCFCFC"/>
                                                    </svg>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 font-w600">#123456789</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>2 March 2021, 13:45 PM</span>
                                        </td>

                                        <td>
                                            <span>Libelle </span>
                                        </td>
                                        <td>
                                            <span class="doller font-w600"> $ 50,036</span>
                                        </td>
                                        <td class="pe-3">
                                            <span class="text-success font-w600">Complete</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="icon-box  icon-box-sm bg-danger">
                                                    <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M25.0004 1.33333C25.013 1.24043 25.013 1.14624 25.0004 1.05333C24.9888 0.975052 24.9664 0.898765 24.9337 0.826666C24.8985 0.761503 24.8584 0.699103 24.8137 0.64C24.763 0.555671 24.7001 0.479292 24.6271 0.413333L24.4671 0.32C24.3901 0.262609 24.3046 0.21762 24.2137 0.186666H23.9471C23.8658 0.107993 23.7709 0.0447434 23.6671 0H17.0004C16.6468 0 16.3076 0.140476 16.0576 0.390525C15.8075 0.640573 15.6671 0.979711 15.6671 1.33333C15.6671 1.68696 15.8075 2.02609 16.0576 2.27614C16.3076 2.52619 16.6468 2.66667 17.0004 2.66667H20.7737L15.4404 8.94667L9.68039 5.52C9.40757 5.35773 9.0858 5.29813 8.77296 5.3519C8.46011 5.40567 8.17671 5.56929 7.97373 5.81333L1.30706 13.8133C1.19479 13.9481 1.1102 14.1036 1.05815 14.2711C1.00609 14.4386 0.987577 14.6147 1.00368 14.7893C1.01978 14.9639 1.07017 15.1337 1.15198 15.2888C1.23378 15.4439 1.34538 15.5814 1.48039 15.6933C1.72028 15.8921 2.02219 16.0006 2.33373 16C2.52961 16.0003 2.72315 15.9575 2.9006 15.8745C3.07804 15.7915 3.23503 15.6705 3.36039 15.52L9.29373 8.4L14.9871 11.8133C15.2571 11.9735 15.575 12.0332 15.8848 11.982C16.1945 11.9308 16.4763 11.7719 16.6804 11.5333L22.3337 4.93333V8C22.3337 8.35362 22.4742 8.69276 22.7242 8.94281C22.9743 9.19286 23.3134 9.33333 23.6671 9.33333C24.0207 9.33333 24.3598 9.19286 24.6099 8.94281C24.8599 8.69276 25.0004 8.35362 25.0004 8V1.33333Z" fill="#FCFCFC"/>
                                                    </svg>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 font-w600">#123456789</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>2 March 2021, 13:45 PM</span>
                                        </td>

                                        <td>
                                            <span>Libelle </span>
                                        </td>
                                        <td>
                                            <span class="doller font-w600"> $ 50,036</span>
                                        </td>
                                        <td class="pe-3">
                                            <span class="text-success font-w600">Complete</span>
                                        </td>
                                    </tr>



                                    </tbody>
                                </table>
                            </div>
                        </div>
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
