<?php
session_start();
include 'config/koneksi.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- /Bootstrap -->

    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- /Icon -->


    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Urbanist&display=swap"
        rel="stylesheet">
    <!-- /Font -->

    <link rel=" stylesheet" href="css/komen.css">
    <title>GllryPics</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light">
        <div class="container-fluid px-5">
            <div class="col-2 justify-content-center">
                <a href="index.php" class="navbar-brand">GllryPics</a>
            </div>
            <?php
            if(empty($_SESSION['status'])) { ?>
            <div class="d-flex offset-8 col-2 justify-content-end">
                <a href="masuk.php" class="btn btn-masuk text-dark rounded-pill">Masuk</a>
                <a href="daftar.php" class="btn btn-daftar rounded-pill">Daftar</a>
            </div>
            <?php } else { ?>
            <form action="aksi_cari.php" method="GET" class="offset-1 col-6 d-flex mt-3 align-items-center">
                <input class="form-control search" type="search" placeholder="cari" aria-label="Search" name="cari">
                <button class="btn-search btn" type="submit">
                    <ion-icon class="bi bi-search" name="search-outline"></ion-icon>
                </button>
            </form>
            <div class="d-flex offset-1 col-2 justify-content-end">
                <div class="dropdown">
                    <div class="btn-group">
                        <button class="btn" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">
                            <ion-icon name="menu-outline"></ion-icon>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" style="  background-color: #f7f7f7;">
                            <li><a class="dropdown-item" href="profil_user.php">Profil</a></li>
                            <li><a class="dropdown-item" href="album.php">Album</a></li>
                            <li><a class="dropdown-item" href="config/aksi_keluar.php">Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Komen -->
    <div class="container-fluid px-5 my-4">
        <?php 
        // Memeriksa apakah parameter FotoId ada dalam URL
        if(isset($_GET['FotoId'])) {
        $FotoId = $_GET['FotoId'];

        // Query untuk mengambil data foto yang sesuai dengan FotoId dan UserId
        $sql = mysqli_query($koneksi, "SELECT * FROM gallery_foto WHERE FotoId='$FotoId'");
        while($data = mysqli_fetch_array($sql)){

        // Memeriksa apakah data ditemukan
        ?>
        <div class="offset-3 col-6">
            <div class="card shadow" style="width: 100%">
                <img src="gbr/<?php echo $data['LokasiFile']?>" class="card-img-top" alt="...">
                <div class="card-body justify-content-between">
                    <div class="d-flex align-items-center justify-content-between mt-1">
                        <div class="d-flex align-items-center">
                            <a href="profil.php"><img class="poto-profil rounded-circle object-fit-cover img-fluid"
                                    src="gbr/profile.jpg"></a> <!-- gambar profil -->
                            <small class="ms-2 fw-bold" style="font-size:140%;"><?php echo $data['JudulFoto']?></small>
                            <!-- nama pengguna -->
                        </div>
                        <!-- Icon -->
                        <div class="me-2 d-flex align-items-center">
                            <ion-icon name="heart-outline"></ion-icon><small>10k</small>
                        </div>
                        <!-- End Icon -->
                    </div>
                    <div class="offset-1 col-9">
                        <p class="card-text" name="deskripsifoto"><?php echo $data['DeskripsiFoto']?>
                        </p>
                        <small style="font-size:11px;"><?php echo $data['TanggalUnggah']?></small>
                    </div>

                    <div class="container ms-4 ps-4 mt-3">
                        <div class="col-11 justify-content-start">
                            <div class=" align-items-center justify-content-between">
                                <h6 class="fw-bold" style="font-size:98%">Komentar</h6>
                                <div class="comment-section" id="">
                                    <div class="komen">
                                        <p class="komen-user my-2"><span><span class="fw-bold">Dia</span><span
                                                    class="fw-normal"> Keren banget!!!!!</span></span>
                                        <p class="komen-user my-2"><span><span class="fw-bold">Kamu</span><span
                                                    class="fw-normal"> Temenan aja!!</span></span></p>
                                        <p class="komen-user my-2"><span><span class="fw-bold">Kamu</span><span
                                                    class="fw-normal"> Temenan aja!!</span></span></p>
                                        <p class="komen-user my-2"><span><span class="fw-bold">Kamu</span><span
                                                    class="fw-normal"> Temenan aja!!</span></span></p>
                                        <p class="komen-user my-2"><span><span class="fw-bold">Kamu</span><span
                                                    class="fw-normal"> Temenan aja!!</span></span></p>
                                        <p class="komen-user my-2"><span><span class="fw-bold">Kamu</span><span
                                                    class="fw-normal"> Temenan aja!!</span></span></p>
                                        <p class="komen-user my-2"><span><span class="fw-bold">Kamu</span><span
                                                    class="fw-normal"> Temenan aja!!</span></span></p>
                                        <p class="komen-user my-2"><span><span class="fw-bold">Kamu</span><span
                                                    class="fw-normal"> Temenan aja!!</span></span></p>
                                        <p class="komen-user my-2"><span><span class="fw-bold">Kamu</span><span
                                                    class="fw-normal"> Temenan aja!!</span></span></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-2 mt-4">
                        <input class="form-control ms-2" type="" placeholder="Tambahkan Komentar" aria-label="">
                        <ion-icon name="caret-forward-outline"></ion-icon>
                        <button type="button" onclick="copyUrlToClipboard()" class="btn btn-danger mb-1 ">
                            <ion-icon name="link-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        } 
        } 
        ?>
    </div>
    <!-- End Komen -->

    <!-- Foto -->
    <div class="container-fluid px-5">
        <div class="row kategori text-center">
            <h3>Jelajahi Galeri</h3>
        </div>
        <div class="row my-4">
            <?php 
                $sql = mysqli_query($koneksi, "SELECT gallery_foto.FotoId, gallery_foto.JudulFoto, gallery_foto.LokasiFile,
                gallery_user.UserId, gallery_user.Username FROM gallery_foto INNER JOIN gallery_user ON
                gallery_foto.UserId = gallery_user.UserId ORDER BY RAND()");
                while ($data = mysqli_fetch_array($sql)){
                ?>
            <div class="col-3">
                <!-- gambar galeri -->
                <a href="komen.php?FotoId=<?= $data['FotoId']?>">
                    <img class="poto-galeri object-fit-cover img-fluid" src="gbr/<?= $data['LokasiFile']?>">
                </a>
                <div class="d-flex align-items-center justify-content-between mt-1 mb-4">
                    <a href="profil.php?UserId=<?= $data['UserId']?>" class="text-decoration-none"><small
                            class="fw-bold text-black "><?php echo $data['Username']?></small></a>
                    <!-- nama pengguna -->
                    <!-- Icon -->
                    <div class="d-flex">
                        <div class="me-2 d-flex align-items-center">
                            <ion-icon name="heart-outline"></ion-icon><small>10k</small>
                        </div>
                    </div>
                    <!-- End Icon -->
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
    <!-- End Foto -->



    <!-- Footer -->
    <footer>
        <div class="container-fluid px-5">
            <div class="row align-items-center d-flex">
                <div class="col-2">
                    <a href="index.php" class="navbar-brand">GllryPics</a>
                </div>
                <div class="offset-1 col-6 text-center">
                    <p class="mt-4">Temukan karya-karya lainnya yang menginspirasi dari kami untuk anda. Setiap karya
                        memiliki
                        cerita uniknya sendiri. Jangan ragu untuk terus mengunjungi situs kami.</p>
                </div>
                <div class="d-flex col-3" style="justify-content: space-between;">
                    <button type="button" class="btn-footer btn rounded-circle">
                        <ion-icon name="logo-facebook" class="ikon"></ion-icon>
                    </button>
                    <button type="button" class="btn-footer btn rounded-circle">
                        <ion-icon name="logo-instagram" class="ikon"></ion-icon>
                    </button>
                    <button type="button" class="btn-footer btn rounded-circle">
                        <ion-icon name="logo-twitter" class="ikon"></ion-icon>
                    </button>
                </div>
                <p class="text-center" style="background-color: rgba(0, 0, 0, 0.2);">&copy; 2024 Amanda Naisyiqa. All
                    rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

</body>

</html>