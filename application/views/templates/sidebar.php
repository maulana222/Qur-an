  <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-primary accordion text-light" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin/')?>">
                <div class="sidebar-brand-icon ">
                    <img src="<?= base_url('assets/img/LOGOQuran.png')?>" width="80px" >
                </div>
                <div class="">
               </div>
            </a>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?= site_url('Admin/')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Admin/materi_Alquran')?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Materi Qur'an</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Admin/surah')?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Al-Qur'an</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Admin/data_admin')?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Auth/logout')?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                 </a>
            </li>
            
            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">master</span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/img/undraw_profile.svg');?>">
                            </a>
                            <!-- Dropdown - User Information -->
                        </li>
                    </ul>
                </nav>
                
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="<?= site_url('Auth/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
