<?php

    session_start();
    require 'function.php';

    if(isset($_SESSION["masyarakat"])){
        header("location: masyarakat/");
        exit;
    }
    if(isset($_SESSION["admin"])){
        header("location: admin/");
        exit;
    }
    if(isset($_SESSION["petugas"])){
        header("location: petugas/");
        exit;
    }

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username = '$username'");
        $cek = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        $result2 = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");
        $cek2 = mysqli_num_rows($result2);
        $row2 = mysqli_fetch_assoc($result2);

        if($cek > 0){
            if(password_verify($password, $row["password"])){
                $_SESSION["masyarakat"] = true;
                $_SESSION["data"] = $row;
                header("location: masyarakat/");
                exit;
            }
        }
        if($cek2 > 0){
            if(password_verify($password, $row2["password"])){
                if($row2["level"] == "admin"){
                    $_SESSION["admin"] = true;
                    $_SESSION["data"] = $row2;
                    header("location: admin/");
                    exit;
                }elseif($row2["level"] == "petugas"){
                    $_SESSION["petugas"] = true;
                    $_SESSION["data"] = $row2;
                    header("location: petugas/");
                    exit; 
                }
            }
        }
        echo "<script>
                alert('Username atau password yang anda masukan salah')
            </script";
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style/login.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Login</title>
    </head>
    <body class="bg-secondary">
        <div class="container">
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card o-hidden border-0 shadow-lg my-5 bg-dark text-light">
                            <div class="p-5 pt-4">
                                <h2 class="mb-4 text-center">Login</h2>
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control bg-dark text-light" id="username" name="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control bg-dark text-light" id="password" name="password">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="login" value="login" class="btn btn-outline-primary mt-3">Login</button>
                                    </div>
                                </form>
                                <div class="text-center mt-3">
                                    <a href="register.php">Belun punya akun? Daftar!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </body>
</html>