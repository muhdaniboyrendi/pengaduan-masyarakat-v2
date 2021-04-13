<?php 

session_start();
require '../function.php';

if(!isset($_SESSION["admin"])){
    header("location: ../");
    exit;
}

$profil = data("SELECT * FROM petugas WHERE id_petugas = '".$_SESSION['data']['id_petugas']."'")

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Profile</title>
        <link href="../vendor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon">
                    <i class="fas fa-users"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Pengaduan <sup>Masyarakat</sup></div>
                </a>

                <hr class="sidebar-divider my-0 text-gray-600">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
                </li>

                <hr class="sidebar-divider text-gray-600">

                <div class="sidebar-heading">
                    Menu
                </div>

                <li class="nav-item">
                    <a class="nav-link pb-0" href="verifikasi.php">
                    <i class="fas fa-fw fa-check-square"></i>
                    <span>Verifikasi dan Validasi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="tanggapan.php">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Tanggpan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="laporan.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Laporan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="laporan-selesai.php">
                    <i class="fas fa-fw fa-clipboard-check"></i>
                    <span>Laporan Selesai</span></a>
                </li>

                <hr class="sidebar-divider text-gray-600">

                <div class="sidebar-heading">
                    User
                </div>

                <li class="nav-item active">
                    <a class="nav-link pb-0" href="profile.php">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="register.php">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Registrasi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pb-0" href="users.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
                </li>

                <hr class="sidebar-divider d-none d-md-block text-gray-600">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                <hr class="sidebar-divider d-none d-md-block text-gray-600">

                <div class="copyright text-center my-0 small ml-3 mr-3 text-gray-600">
                    <span>Copyright &copy; Muhdani Boyrendi Erlan Azhari <?= date('Y'); ?></span>
                </div>
            </ul>
            <!-- End of Sidebar -->


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content" class="bg-gray-900 pb-5">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-4 d-none d-lg-inline text-light small"><?= $_SESSION["data"]["username"]; ?></span>
                                    <i class="fas fa-user-tag"></i>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right text-light bg-dark shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item bg-dark text-light" href="profile.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item bg-dark text-light" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item bg-dark text-light" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider bg-gray-500"></div>
                                    <a class="dropdown-item bg-dark text-light" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h3 class="h3 mb-4 ml-3 text-light">Profile</h3>
                        <div class="col-lg-12">
                            <div class="card o-hidden mt-0 border-0 p-4 shadow-lg my-5 bg-dark text-light">
                            <?php foreach($profil as $item): ?>
                                <div>
                                    <label class="form-label text-light">Nama</label>
                                    <p class="text-gray-500"><?= $item["nama_petugas"]; ?></p>
                                </div>
                                <hr class="sidebar-divider mt-0 text-gray-600">
                                <div>
                                    <label class="form-label text-light">Username</label>
                                    <p class="text-gray-500"><?= $item["username"]; ?></p>
                                </div>
                                <hr class="sidebar-divider mt-0 text-gray-600">
                                <div>
                                    <label class="form-label text-light">Telepone</label>
                                    <p class="text-gray-500"><?= $item["telp"]; ?></p>
                                </div>
                                <hr class="sidebar-divider mt-0 text-gray-600">
                                <div>
                                    <label class="form-label text-light">Level</label>
                                    <p class="text-gray-500"><?= $item["level"]; ?></p>
                                </div>
                                <hr class="sidebar-divider mt-0 text-gray-600">
                                <a class="btn btn-outline-primary mt-2" href="edit-profile.php?id_petugas=<?= $item["id_petugas"]; ?>">Edit Profile</a>
                                <a class="btn btn-outline-danger mt-2" href="?id_petugas=<?= $item["id_petugas"]; ?>" data-toggle="modal" data-target="#hapusModal">Hapus Akun</a>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark text-gray-200">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                        <button class="close text-gray-200" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pilih "Logout" jika anda ingin mengakhiri sesi anda saat ini</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-outline-success" href="../logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- hapus Modal-->
        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-dark text-gray-200">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                        <button class="close text-gray-200" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus akun anda? Akun yang telah dihapus tidak dapat dikembalikan lagi</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-outline-success" href="hapus-akun.php?id_petugas=<?= $item["id_petugas"]; ?>">Hapus</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/js/sb-admin-2.min.js"></script>
    </body>
</html>
