<ul
            class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
            id="accordionSidebar"
         >
            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active ">
               <a class="nav-link" href="index.html"> <span class="s1">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />
            <!-- Nav Item - Charts -->
            <li class="nav-item">
               <a class="nav-link" href="/pegawai-absen?id={{session('id')}}">
                <i class="fas fa-fw fa-table"></i>
                  <span>Absen</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
               <a class="nav-link" href="/pegawai-history?id={{session('id')}}">
                  <i class="fas fa-fw fa-table"></i>
                  <span>History</span></a>
            </li>
         </ul>