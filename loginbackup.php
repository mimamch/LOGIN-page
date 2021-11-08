<?php

//connect
$conn = mysqli_connect('localhost', 'root', '', 'user');

$tabel = 'akun';


// END CONNECT
// LOGIN
function login()
{

    if (isset($_POST["submit"])) {
        global $tabel;
        global $conn;
        $username = $_POST["username"];
        $password =  $_POST["password"];
        $cekuser = mysqli_query($conn, "SELECT * FROM $tabel WHERE username='$username'");

        if (mysqli_num_rows($cekuser) === 1) {
            $cekpass = mysqli_fetch_assoc($cekuser)["password"];
            if ($cekpass === $password) {
                header('Location: ../register/');
                exit;
            } else {
                return '<p class="gagal">PASSWORD SALAH!</p>';
            }
        } else {
            return '<p class="gagal">USERNAME TIDAK DITEMUKAN</p>';
        };
    };
};
