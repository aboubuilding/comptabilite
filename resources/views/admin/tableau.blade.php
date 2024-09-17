@extends('layout.app')

@section('title')
    Comptabilité | Tableau de bord
@endsection

@section('css')
@endsection

@section('titre')
    Tableau de bord
@endsection

@section('nav')
    @include('admin.aside')
@endsection



@section('contenu')
    @php
        $user_value = session()->get('LoginUser');
        $compte_id = $user_value['compte_id'];

        $user = App\Models\User::rechercheUserById($compte_id);

        $role = $user->role;

    @endphp

    <div class="content-body">
        <div class="container-fluid">
            @if( $role == \App\Types\Role::DIRECTEUR || $role == \App\Types\Role::ADMIN )



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
                                            <p>Total élèves  </p>
                                            <h2 class="font-w700 mb-0">

                                                {{ number_format($total_eleves, 0, ',', ' ') }}


                                            </h2>
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
                                            <p>Total nouveaux   </p>
                                            <h2 class="font-w700 mb-0">

                                                {{ number_format($total_nouveau, 0, ',', ' ') }}



                                            </h2>
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
                                            <p>Total  anciens   </p>
                                            <h2 class="font-w700 mb-0">

                                                {{ number_format($total_anciens, 0, ',', ' ') }}



                                            </h2>
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
                                            <p>Total  classes    </p>
                                            <h2 class="font-w700 mb-0">

                                               0



                                            </h2>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                            <p>Total encaissements </p>
                                            <h2 class="font-w700 mb-0">

                                                {{ number_format($total_encaissement_montant, 0, ',', ' ') }}


                                            </h2>
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
                                            <p>Ce mois  </p>
                                            <h2 class="font-w700 mb-0">

                                                {{ number_format($total_encaissement_montant_mois, 0, ',', ' ') }}



                                            </h2>
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
                                            <p>Cette semaine  </p>
                                            <h2 class="font-w700 mb-0">

                                                {{ number_format($total_encaissement_montant_semaine, 0, ',', ' ') }}



                                            </h2>
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
                                            <p>Aujourdhui </p>

                                            <h2 class="font-w700 mb-0">

                                                {{ number_format($total_encaissement_montant_jour, 0, ',', ' ') }}



                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row">



                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="card counter">

                        <h3 style="text-align: center; margin:15px"> Détail de tous  </h3>
                        <hr>
                    <div class="card-body  ">
                    <div class="basic-list-group">
                        <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">

                        Scolarité  <span class="badge badge-primary badge-pill">
                             {{ number_format($total_scolarite, 0, ',', ' ') }}

                        </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                       Cantine <span class="badge badge-primary badge-pill">
                        {{ number_format($total_cantine, 0, ',', ' ') }}

                       </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                       Bus <span class="badge badge-primary badge-pill">


                        {{ number_format($total_bus, 0, ',', ' ') }}
                       </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                        Inscriptions <span class="badge badge-primary badge-pill">

                            {{ number_format($total_inscription, 0, ',', ' ') }}
                        </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                        Assurance <span class="badge badge-primary badge-pill">

                            {{ number_format($total_assurance, 0, ',', ' ') }}
                        </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                            Examens <span class="badge badge-primary badge-pill">

                                {{ number_format($total_frais_examen, 0, ',', ' ') }}
                            </span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                                Produits <span class="badge badge-primary badge-pill">

                                    {{ number_format($total_produit, 0, ',', ' ') }}

                                </span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                                    Livres  <span class="badge badge-primary badge-pill">
                                        {{ number_format($total_livre, 0, ',', ' ') }}



                                    </span>
                                    </li>
                        </ul>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="card counter">

                        <h3 style="text-align: center; margin:15px"> Détail du mois   </h3>
                        <hr>
                    <div class="card-body  ">
                    <div class="basic-list-group">
                        <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">

                        Scolarité  <span class="badge badge-primary badge-pill">
                             {{ number_format($total_mois_scolarite, 0, ',', ' ') }}

                        </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                       Cantine <span class="badge badge-primary badge-pill">
                        {{ number_format($total_mois_cantine, 0, ',', ' ') }}

                       </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                       Bus <span class="badge badge-primary badge-pill">


                        {{ number_format($total_mois_bus, 0, ',', ' ') }}
                       </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                        Inscriptions <span class="badge badge-primary badge-pill">

                            {{ number_format($total_mois_inscription, 0, ',', ' ') }}
                        </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                        Assurance <span class="badge badge-primary badge-pill">

                            {{ number_format($total_mois_assurance, 0, ',', ' ') }}
                        </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                            Examens <span class="badge badge-primary badge-pill">

                                {{ number_format($total_mois_frais_examen, 0, ',', ' ') }}
                            </span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                                Produits <span class="badge badge-primary badge-pill">

                                    {{ number_format($total_mois_produit, 0, ',', ' ') }}

                                </span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                                    Livres  <span class="badge badge-primary badge-pill">
                                        {{ number_format($total_mois_livre, 0, ',', ' ') }}



                                    </span>
                                    </li>
                        </ul>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="card counter">

                        <h3 style="text-align: center; margin:15px"> Détail de la semaine   </h3>
                        <hr>
                    <div class="card-body  ">
                    <div class="basic-list-group">
                        <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">

                        Scolarité  <span class="badge badge-primary badge-pill">
                             {{ number_format($total_semaine_scolarite, 0, ',', ' ') }}

                        </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                       Cantine <span class="badge badge-primary badge-pill">
                        {{ number_format($total_semaine_cantine, 0, ',', ' ') }}

                       </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                       Bus <span class="badge badge-primary badge-pill">


                        {{ number_format($total_semaine_bus, 0, ',', ' ') }}
                       </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                        Inscriptions <span class="badge badge-primary badge-pill">

                            {{ number_format($total_semaine_inscription, 0, ',', ' ') }}
                        </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                        Assurance <span class="badge badge-primary badge-pill">

                            {{ number_format($total_semaine_assurance, 0, ',', ' ') }}
                        </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                            Examens <span class="badge badge-primary badge-pill">

                                {{ number_format($total_semaine_frais_examen, 0, ',', ' ') }}
                            </span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                                Produits <span class="badge badge-primary badge-pill">

                                    {{ number_format($total_semaine_produit, 0, ',', ' ') }}

                                </span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                                    Livres  <span class="badge badge-primary badge-pill">
                                        {{ number_format($total_semaine_livre, 0, ',', ' ') }}



                                    </span>
                                    </li>
                        </ul>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="card counter">

                        <h3 style="text-align: center; margin:15px"> Détail du jour   </h3>
                        <hr>
                    <div class="card-body  ">
                    <div class="basic-list-group">
                        <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">

                        Scolarité  <span class="badge badge-primary badge-pill">
                             {{ number_format($total_jour_scolarite, 0, ',', ' ') }}

                        </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                       Cantine <span class="badge badge-primary badge-pill">
                        {{ number_format($total_jour_cantine, 0, ',', ' ') }}

                       </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                       Bus <span class="badge badge-primary badge-pill">


                        {{ number_format($total_jour_bus, 0, ',', ' ') }}
                       </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                        Inscriptions <span class="badge badge-primary badge-pill">

                            {{ number_format($total_jour_inscription, 0, ',', ' ') }}
                        </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                        Assurance <span class="badge badge-primary badge-pill">

                            {{ number_format($total_jour_assurance, 0, ',', ' ') }}
                        </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                            Examens <span class="badge badge-primary badge-pill">

                                {{ number_format($total_jour_frais_examen, 0, ',', ' ') }}
                            </span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                                Produits <span class="badge badge-primary badge-pill">

                                    {{ number_format($total_jour_produit, 0, ',', ' ') }}

                                </span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center" style="color: black; font-size:16px">
                                    Livres  <span class="badge badge-primary badge-pill">
                                        {{ number_format($total_jour_livre, 0, ',', ' ') }}



                                    </span>
                                    </li>
                        </ul>
                    </div>
                    </div>
                    </div>
                </div>


             



            </div>



            @endif

        </div>
    </div>

@endsection



@section('include')
@endsection


@section('js')
    <!-- Datatable -->
    <script src="{{ asset('admin') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/js/plugins-init/datatables.init.js"></script>
    <!-- Apex Chart -->

    <!-- Dashboard 1 -->
    <script src="{{ asset('admin') }}/js/dashboard/dashboard-2.js"></script>
    <script src="{{ asset('admin') }}/vendor/chart.js/Chart.bundle.min.js"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('admin') }}/vendor/apexchart/apexchart.js"></script>

    <!-- Chart piety plugin files -->

    <script src="{{ asset('admin') }}/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <script src="{{ asset('admin') }}/vendor/wow-master/dist/wow.min.js"></script>
@endsection
