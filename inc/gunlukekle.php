
<?

//coded by tonymontana


$kullanici = htmlspecialchars(trim($_POST['kullanici']));

$msj = htmlspecialchars(trim($_POST['msj']));

//db ye yaziyoruz...

$sorgu = "INSERT into gunluk";
$sorgu.= "(kullanici,msj)";
$sorgu.= "VALUES";
$sorgu.= "('$kullanici','$msj')";
mysql_query ($sorgu); 

if ($sorgu) {
	
	echo "Bu kalbin kadar temiz sayfayi doldurdun. Tebrikler";
}

else {
	include "config.php";
	echo "ziki tuttu ellam. eger senden kaynakland���n� d���n�yorsan �aktirmadan kapat bu sayfay�, yok ben bi sey yapmad�m diyorsan $sitename e duygu s�m�r�s� dolu pm at.";
}

?>
