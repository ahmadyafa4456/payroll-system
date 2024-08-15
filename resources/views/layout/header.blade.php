@php
    $user = App\Models\User::where('id', Auth::id())->first();
    $pegawai = App\Models\Pegawai::where('id', Session::get('id'))->first();
@endphp
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if ($user)
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->nama }}</span>
                @else
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $pegawai->nama }}</span>
                @endif
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
