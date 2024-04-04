<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <div>
                                    <img src="assets/img/Logo SMK Muhapen.png" alt="logo" width="150" height="">

                                </div>
                            </div>
                            <h2 class="fs-3 fw-bold text-center mb-4">Login dulu yuk!</h2>
                            <form action="#!" method="post">
                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="user" id="username" placeholder="username" required>
                                            <label for="tet" class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="pass" id="password" value="" placeholder="Password" required>
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <?php

                                        if (isset($_POST['submit'])) {

                                            $user = mysqli_real_escape_string($conn, $_POST['user']);
                                            $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                                            $cek  = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '" . $user . "' ");
                                            if (mysqli_num_rows($cek) > 0) {

                                                $d = mysqli_fetch_object($cek);
                                                if (md5($pass) == $d->password) {

                                                    $_SESSION['status_login']   = true;
                                                    $_SESSION['uid']             = $d->id;
                                                    $_SESSION['uname']             = $d->nama;
                                                    $_SESSION['ulevel']         = $d->level;

                                                    echo "<script>window.location = 'admin/index.php'</script>";
                                                } else {
                                                    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                                    <i class="bi bi-exclamation-triangle-fill me-2 flex-shrink-0"></i>
                                                    <div>
                                                      Password Salah!
                                                    </div>
                                                  </div>';
                                                }
                                            } else {
                                                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                                <i class="bi bi-exclamation-triangle-fill me-2 flex-shrink-0"></i>
                                                <div>
                                                  Akun tidak ditemukan!
                                                </div>
                                              </div>';
                                            }
                                        }

                                        ?>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary btn-lg" type="submit" name="submit">Log in</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="m-0 text-secondary text-center">Belum punya akun? <a href="#!" class="link-primary text-decoration-none">Hubungi Operator</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<script src="../assets/css/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>