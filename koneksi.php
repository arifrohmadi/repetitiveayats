<?php
$server		= "localhost";
$username	= "root";
$password	= "";
$database	= "repa";

//koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Gagal");
mysql_select_db($database) or die("Database tidak ditemukan");
mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8'); 
?>
