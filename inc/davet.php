<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title><? include "config.php";  echo $sitename;?> ?</title>
</head>

<body>

<?php

$yazar=$_GET['yazar'];
if ($_COOKIE['sayginlik'] == $yazar or $yazar == $verified_user) {
	echo "Ya kendinize oy vermeye �alisiyorsunuz ya da bu yazara zaten sayginlik vermissiniz. Yeniden vermek i�in 1 saat bekleyin.";
	exit;
}
if (isset($yazar)) {
$sorgu=mysql_query("SELECT sayginlik FROM user WHERE nick='$yazar'");
$sayginlik=@mysql_result($sorgu,0,'sayginlik');
$sayginlik1=$sayginlik+1;
$sql=("UPDATE user SET sayginlik='$sayginlik1' WHERE nick='$yazar'");
mysql_query($sql);
setcookie ("sayginlik", "$yazar", time()+3600);   //varsayilan olarak 3600 sn yani 1 saat ayarladim.
echo "$yazar kullanicisi sizi $sitename'e davet etti. Siz de ona davet puani verdiniz. Bu g�zel daveti geri �evirmemek i�in <a href='sozluk.php?process=reg1'>tiklayin</a> ve y�nergeleri izleyin.";
echo"<p>Anasayfaya gitmek i�in <a href='$site'>tikirdat!</a>";





}

?>

</body>
</html>