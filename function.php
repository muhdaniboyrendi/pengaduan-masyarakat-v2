<?php 

// koneksi
$conn = mysqli_connect("localhost", "root", "", "pengaduan_masyarakat");


// data
function data($query){
    global $conn;

    $query = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($query)){
        $rows[] = $row;
    }
    return $rows;
}


// register masyarakat
function registermasyarakat($data){
    global $conn;

    $nik = htmlspecialchars($data["nik"]);
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $password2 = htmlspecialchars($data["password2"]);
    $telp = htmlspecialchars($data["telp"]);

    $result = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username = '$username'");
    $result2 = mysqli_query($conn, "SELECT * FROM masyarakat WHERE nik = '$nik'");
    $result3 = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Username telah terdaftar');</script>";
        return false;
    }
    if(mysqli_fetch_assoc($result2)){
        echo "<script>alert('NIK telah terdaftar');</script>";
        return false;
    }
    if(mysqli_fetch_assoc($result3)){
        echo "<script>alert('Username telah terdaftar');</script>";
        return false;
    }
    if($password !== $password2){
        echo "<script>alert('Password tidak dapat dikonfirmasi');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO masyarakat VALUES('$nik', '$nama', '$username', '$password', '$telp')");
    return mysqli_affected_rows($conn);
}


// register petugas
function registerpetugas($data){
    global $conn;

    $nama = htmlspecialchars($data["nama_petugas"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $password2 = htmlspecialchars($data["password2"]);
    $telp = htmlspecialchars($data["telp"]);
    $level = htmlspecialchars($data["level"]);

    $result = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username = '$username'");
    $result2 = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('Username telah terdaftar');</script>";
        return false;
    }
    if(mysqli_fetch_assoc($result2)){
        echo "<script>alert('Username telah terdaftar');</script>";
        return false;
    }
    if($password !== $password2){
        echo "<script>alert('Password tidak dapat dikonfirmasi');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO petugas VALUES('', '$nama', '$username', '$password', '$telp', '$level')");
    return mysqli_affected_rows($conn);
}


// pengaduan
function pengaduan($data){
    global $conn;

    $tgl = date("Y-m-d");
    $nik = $_SESSION["data"]["nik"];
    $isi = htmlspecialchars($data["isi_laporan"]);
    $status = "0";
    $foto = upload();
    if(!$foto){
        return false;
    }

    mysqli_query($conn, "INSERT INTO pengaduan VALUES('', '$tgl', '$nik', '$isi', '$foto', '$status')");
    return mysqli_affected_rows($conn);
}


// upload
function upload(){
    $nama = $_FILES["foto"]["name"];
    $error = $_FILES["foto"]["error"];
    $tmp = $_FILES["foto"]["tmp_name"];

    if($error === 4){
        echo "<script>alert('Laporan harus disertakan foto');</script>";
        return false;
    }

    $formatfotoValid = ["jpg", "jepg", "png"];
    $formatFoto = explode(".", "$nama");
    $formatFoto = strtolower(end($formatFoto));

    if(!in_array($formatFoto, $formatfotoValid)){
        echo "<script>alert('File harus berupa foto');</script>";
        return false;
    }

    $namafile = uniqid();
    $namafile .= ".";
    $namafile .= $formatFoto;

    move_uploaded_file($tmp, "../vendor/img/" . $namafile);
    return $namafile;
}


// verfikasi
function verifikasi($data){
    global $conn;

    $id_pengaduan = $data["verify"];
    $_SESSION["id_pengaduan"] = $id_pengaduan;

    mysqli_query($conn, "UPDATE pengaduan SET status = 'proses' WHERE id_pengaduan = '$id_pengaduan'");
    return mysqli_affected_rows($conn);
}


// tanggapan
function tanggapan($data){
    global $conn;

    $id_pengaduan = $_GET["id_pengaduan"];
    $tgl = date("Y-m-d");
    $tanggapan = htmlspecialchars($data["tanggapan"]);
    $id_petugas = $_SESSION["data"]["id_petugas"];

    mysqli_query($conn, "INSERT INTO tanggapan VALUES('', '$id_pengaduan', '$tgl', '$tanggapan', '$id_petugas')");
    mysqli_query($conn, "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = '$id_pengaduan'");
    return mysqli_affected_rows($conn);
}

?>