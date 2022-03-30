<!-- Main Sidebar Container -->

<body>

    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: rgb(21,108,161);
background: radial-gradient(circle, rgba(21,108,161,1) 26%, rgba(6,78,166,1) 58%, rgba(8,22,129,1) 100%);">
        <!-- Brand Logo -->
        <div class="">

            <a href="#" class="brand-link">
                <img src="<?php echo base_url(); ?>./Logo-masit.png" alt="" class=" " width="200" height="50">
                <span class="brand-text font-weight-light"><br></span>

            </a>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex light">
                <div class="image">
                    <img src="<?php echo base_url(); ?>./assets/templates/dist/img/user2-160x160.jpg"
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $user['name']; ?></a>
                </div>
            </div>



            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
				   with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">

                    </li>
                    <li class="nav-item">

                    </li>
                    <li class="nav-item">

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Top Navigation + Sidebar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/boxed.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Boxed</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Sidebar <small>+ Custom Area</small></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Navbar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/fixed-footer.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fixed Footer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Collapsed Sidebar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">

                    <li class="nav-item">
                        <a href="<?= base_url('petugas/Petugas'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p style="color: white;">
                                Dashboard

                            </p>
                        </a>

                    </li>

                    <!-- IINVENTORY -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p style="color: white;">
                                Data Master
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('petugas/Petugas/kategori_barang'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Category Data</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('petugas/Petugas/data_barang'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Inventory</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('petugas/Petugas/Status_barang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Inventory Status</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('petugas/Petugas/items_out') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Items Stock Out</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Petugas/items_in') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Items Stock In</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Relokasi/Data_supplier') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Vendor</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- SERVICE DESK -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p style="color: white;">
                                IT Support
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('Support/Data_client'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Client </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Support/Data_service'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Service Status </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Support/Data_company'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Company</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Support/Vendor'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Vendor </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Support/Laporan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Laporan</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-building"></i>
                            <p style="color: white;">
                                Relocation
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('Relokasi/Data_inventory'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Data Inventory Client</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Relokasi/data_supplier') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Supplier</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="pages/forms/validation.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="color: white;">Laporan</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- DATA PROJEK -->




                    <li class="nav-item">

                        <a type="button" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p style="color: white;">
                                Logout

                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- MODAL LOGOUT -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" class="bg-danger"><strong>Warning!!!</strong>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Sure, to Logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Login/logout'); ?>" type="button" class="btn btn-danger">Yes</a>
</body>




















































</div>






























































































</div>
</div>
</div>