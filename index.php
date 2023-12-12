<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="arifrohmadi">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
include 'header.php';
include "koneksi.php";
?>

<h2>RepA [Repetitive Ayats]</h2>
Urutan berdasar:
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<label><select name="pilih" class="form-control">
  <option value="1">Bunyi</option>
  <option value="2">Juz</option>
  <option value="3">Nomor Surat</option>
  <option value="4">Perulangan</option>
</select></label>
<input type="submit" class="btn btn-default" name="submit" value="Pilih">
</form>
<br/>

<?php
if(isset($_POST['submit'])){
$pilih = $_POST['pilih'];

if ($pilih=="1"){
    $disp = $mysqli->query("SELECT s.surat, a.no_ayat, a.bunyi, a.transliterasi, a.arti,
    a.repetisi, a.juz, s.jml_ayat, t.tempat, a.no_turun FROM ayat a
    INNER JOIN surat s ON a.id_surat = s.id_surat
    INNER JOIN tempat t ON a.id_tempat = t.id_tempat ORDER BY a.transliterasi");
}
elseif ($pilih=="2"){
    $disp = $mysqli->query("SELECT s.surat, a.no_ayat, a.bunyi, a.transliterasi, a.arti,
    a.repetisi, a.juz, s.jml_ayat, t.tempat, a.no_turun FROM ayat a
    INNER JOIN surat s ON a.id_surat = s.id_surat
    INNER JOIN tempat t ON a.id_tempat = t.id_tempat ORDER BY a.juz");
}
elseif ($pilih=="3"){
    $disp = $mysqli->query("SELECT s.surat, a.no_ayat, a.bunyi, a.transliterasi, a.arti,
    a.repetisi, a.juz, s.jml_ayat, t.tempat, a.no_turun FROM ayat a
    INNER JOIN surat s ON a.id_surat = s.id_surat
    INNER JOIN tempat t ON a.id_tempat = t.id_tempat ORDER BY a.id_surat");
}
else {
    $disp = $mysqli->query("SELECT s.surat, a.no_ayat, a.bunyi, a.transliterasi, a.arti,
    a.repetisi, a.juz, s.jml_ayat, t.tempat, a.no_turun FROM ayat a
    INNER JOIN surat s ON a.id_surat = s.id_surat
    INNER JOIN tempat t ON a.id_tempat = t.id_tempat");
}
?>

<table class="table" border="1"><th>No</th><th>No Surat</th><th>No Surat & Ayat</th>
  <th>Bunyi</th><th>Arti</th><th>Repetisi</th><th>Juz</th>
  <th>Jumlah Ayat</th><th>Tempat Turun</th>
<?php
$i=1;
while ($r=$disp->fetch_array()){
echo "<tr><td>".$i."<td>".$r['surat']."<td>".$r['no_ayat']."</td><td>".
  $r['bunyi']."<br/>".$r['transliterasi']."</td><td>".$r['arti']."</td><td>".
  $r['repetisi']."</td><td>".$r['juz']."</td><td>".$r['jml_ayat']."</td><td>".
  $r['tempat']."</td></tr>";
$i++;
}
}
?>
</table>

<?php include 'footer.php';?>

</body>
</html>


<!--
creator: arifrohmadi
template using simple sidebar (http://startbootstrap.com/template-overviews/simple-sidebar/)
-->
