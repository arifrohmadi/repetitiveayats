<?php
$server		= "localhost";
$username	= "root";
$password	= "";
$database	= "repa";

//koneksi dan memilih database di server
mysqli_connect($server,$username,$password,$database) or die("Gagal");

$mysqli = new mysqli($server,$username,$password,$database);
$mysqli -> set_charset("utf8");

?>
