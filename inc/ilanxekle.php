<?

//ay�kla

if ($ilanbilgi=="") {
die("bo� alan b�rakmamak iktiza etmekte<br><br>
<input type=button class='but' onClick='history.go(-1)' value='o zaman geri d�neyim'>"); } 

//post et html ay�kla

$ilanbilgi= $_POST['ilanbilgi'];

//turkce karakter ��z�m
$ilanbilgi = ereg_replace("&lt","(",$ilanbilgi);
$ilanbilgi = ereg_replace("&gt",")",$ilanbilgi);
$ilanbilgi = ereg_replace("<","(",$ilanbilgi);
$ilanbilgi = ereg_replace(">",")",$ilanbilgi);
$ilanbilgi = ereg_replace("\n","<br>",$ilanbilgi);
$ilanbilgi = ereg_replace("�","s",$ilanbilgi);
$ilanbilgi = ereg_replace("�","S",$ilanbilgi);
$ilanbilgi = ereg_replace("�","c",$ilanbilgi);
$ilanbilgi = ereg_replace("�","C",$ilanbilgi);
$ilanbilgi = ereg_replace("�","i",$ilanbilgi);
$ilanbilgi = ereg_replace("�","I",$ilanbilgi);
$ilanbilgi = ereg_replace("�","g",$ilanbilgi);
$ilanbilgi = ereg_replace("�","G",$ilanbilgi);
$ilanbilgi = ereg_replace("�","o",$ilanbilgi);
$ilanbilgi = ereg_replace("�","O",$ilanbilgi);
$ilanbilgi = ereg_replace("�","u",$ilanbilgi);
$ilanbilgi = ereg_replace("�","U",$ilanbilgi);
$ilanbilgi = ereg_replace("�","O",$ilanbilgi);
//b�y�k harf �nlem
$ilanbilgi=strtolower($ilanbilgi);

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$sorgu = "INSERT INTO ilansayfasi ";
$sorgu .= "(ilanbaslik,ip,tarih,gun,ay,yil,saat,nick,ilanbilgi)";
$sorgu .= " VALUES ";
$sorgu .= "('$ilanbaslik','$ip','$tarih','$gun','$ay','$yil','$saat','$verified_user','$ilanbilgi')";
mysql_query($sorgu);

if($sorgu) { 

header("Location: sozluk.php?process=ilan"); }

else {
header("Location: sozluk.php?process=ilanx");
}


?>