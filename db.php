<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'kinerjapegawai';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke database')
?>