<?php
// Include the database connection file
include 'koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $namapengguna = $_POST['namapengguna'];
    $katasandi = $_POST['katasandi'];
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];

    // Insert data into the database
    $sql = "INSERT INTO gallery_user (Username, Password, Email, NamaLengkap, Alamat)
            VALUES ('$namapengguna', '$katasandi', '$email', '$namalengkap', '$alamat')";

    if (mysqli_query($koneksi, $sql)) {
    echo "<script>
    alert('Berhasil Masuk');
    location.href='../masuk.php';
    </script>";
    } else {
        // If the query fails, display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>