<?php
session_start();
include 'koneksi.php';

if(isset($_POST['tambah'])){
    $namaalbum = $_POST['namaalbum'];
    $deskripsialbum = $_POST['deskripsialbum'];
    $tanggal = date('Y-m-d');
    $UserId = $_SESSION['UserId'];

    $sql = mysqli_query($koneksi, "INSERT INTO gallery_album VALUES ('', '$namaalbum', '$deskripsialbum', '$tanggal', '$UserId')");

    echo "<script>
    alert ('Data berhasil disimpan!');
    location.href='../album.php';
    </script>";
}


if(isset($_POST['edit'])){
    $AlbumId = $_POST['AlbumId'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsialbum = $_POST['deskripsialbum'];
    $tanggal = date('Y-m-d');
    $UserId = $_SESSION['UserId'];

    $sql = mysqli_query($koneksi, "UPDATE gallery_album SET NamaAlbum='$namaalbum', Deskripsi='$deskripsialbum', TanggalDibuat='$tanggal' WHERE AlbumId='$AlbumId' ");

    echo "<script>
    alert ('Data berhasil diperbarui!');
    location.href='../album.php';
    </script>";
}

if(isset($_POST['hapus'])){
    $AlbumId = $_POST['AlbumId'];

    $sql = mysqli_query($koneksi, "DELETE FROM gallery_album WHERE AlbumId='$AlbumId'");

    echo "<script>
    alert ('Data berhasil dihapus!');
    location.href='../album.php';
    </script>";
}

?>