<?php
$hostname = "localhost";
$userDataBase = "root";
$passwordUser = "";
$dataBaseName = "pemrograman_berbasis_web";
$koneksi = mysqli_connect($hostname, $userDataBase, $passwordUser, $dataBaseName) or die("Koneksi gagal: " . mysqli_connect_error());
