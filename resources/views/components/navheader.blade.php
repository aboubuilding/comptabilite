<div class="nav-header">
    <a href="" class="brand-logo">
      EIM |

        @php
            $user_value = session()->get('LoginUser');
            $compte_id = $user_value['compte_id'];

            $user = App\Models\User::rechercheUserById($compte_id);

            $role  = $user->role;

        @endphp

        @if($role == \App\Types\Role::ADMIN)

            ADMIN
        @endif

        @if($role == \App\Types\Role::COMPTABLE)

            COMPTABLE
        @endif



       

        @if($role == \App\Types\Role::DIRECTEUR)

            DIRECTEUR
        @endif

        @if($role == \App\Types\Role::CAISSIER)

            CAISSIER
        @endif



    </a>


</div>


<div class="nav-control">
    <div class="hamburger">
        <span class="line"></span><span class="line"></span><span class="line"></span>
        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="22" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
            <rect x="11" width="4" height="4" rx="2" fill="#2A353A"/>
            <rect x="22" width="4" height="4" rx="2" fill="#2A353A"/>
            <rect x="11" y="11" width="4" height="4" rx="2" fill="#2A353A"/>
            <rect x="11" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
            <rect width="4" height="4" rx="2" fill="#2A353A"/>
            <rect y="11" width="4" height="4" rx="2" fill="#2A353A"/>
            <rect x="22" y="22" width="4" height="4" rx="2" fill="#2A353A"/>
            <rect y="22" width="4" height="4" rx="2" fill="#2A353A"/>
        </svg>
    </div>
</div>
