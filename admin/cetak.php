<?php 

session_start();
require '../function.php';

if(!isset($_SESSION["admin"])){
    header("location: ../");
    exit;
}

$pengaduan = data("SELECT * FROM masyarakat
                    INNER JOIN pengaduan
                    ON masyarakat.nik = pengaduan.nik");

if(isset($_POST["cetak"])){
    echo "<script>window.print();</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Cetak Laporan</title>
        <link href="../vendor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="../vendor/css/sb-admin-2.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body id="page-top" class="bg-dark">
        <div class="container-fluid">
            <h3 class="text-center text-white mt-3 mb-3">Daftar Laporan</h3>
            <form action="" method="POST">
                <a class="btn btn-outline-danger" href="laporan.php">Kembali</a>
                <button class="btn btn-outline-success" name="cetak">Cetak</button>
            </form>
            <table class="table table-dark mt-4">
                <thead class="bg-gray-900">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Isi Laporan</th>
                        <th>Tanggal Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach($pengaduan as $item): ?>
                    <tr>
                        <td><?= $i; $i++; ?></td>
                        <td><?= $item["nama"]; ?></td>
                        <td><?= $item["isi_laporan"]; ?></td>
                        <td><?= $item["tgl_pengaduan"]; ?></td>
                        <td>
                            <img src="../vendor/img/<?= $item["foto"]; ?>" width="100px">
                        </td>
                        <td><?= $item["status"]; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/js/sb-admin-2.min.js"></script>
    </body>
</html>