<?php

if ($zirve == "" || $detay == "" || $tavsiye == "") {
die("<i><b>h�yt:</b> heryeri doldur canim</i>
<br><br><input type=button class='but' onClick='history.go(-1)' value='kusura bakma'>"); }


$zirve=mysql_real_escape_string($_POST["zirve"]);
$detay = htmlspecialchars(strip_tags($_POST["detay"]));
$tavsiye = htmlspecialchars(strip_tags($_POST["tavsiye"]));

if (strlen($zirve)>80) { die("<i><b>bi sey oldu:<b>anket ad� 80 karakterden fazla olamaz</i>"); }
if (strlen($detay)>200) { die("<i><b>bi sey oldu:<b>anket bilgi b�l�m� 200 karakterden fazla olamaz</i>"); }

$zirve = ereg_replace(">","<br>",$zirve);
$zirve = ereg_replace("�","c",$zirve);
$zirve = ereg_replace("�","g",$zirve);
$zirve = ereg_replace("�","i",$zirve);
$zirve = ereg_replace("�","o",$zirve);
$zirve = ereg_replace("�","u",$zirve);

$detay = ereg_replace(">",")",$detay);
$detay = ereg_replace("\n","<br>",$detay);
$detay = ereg_replace("�","c",$detay);
$detay = ereg_replace("�","g",$detay);
$detay = ereg_replace("�","i",$detay);
$detay = ereg_replace("�","o",$detay);
$detay = ereg_replace("�","u",$detay);

$tavsiye = ereg_replace(">",")",$tavsiye);
$tavsiye = ereg_replace("\n","<br>",$tavsiye);
$tavsiye = ereg_replace("�","c",$tavsiye);
$tavsiye = ereg_replace("�","g",$tavsiye);
$tavsiye = ereg_replace("�","i",$tavsiye);
$tavsiye = ereg_replace("�","o",$tavsiye);
$tavsiye = ereg_replace("�","u",$tavsiye);

$zirve=strtolower($zirve);
$detay=strtolower($detay);
$tavsiye=strtolower($tavsiye);

$detay=mysql_real_escape_string($detay);


$btarih = date("Y-m-d/H:i");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("G:i");

$sor = " INSERT INTO anketor ";
$sor .= "(tavsiye,detay,zirve,organizator,yer,tarih,gun,ay,yil,saat)";
$sor .= " VALUES ";
$sor .= "('$tavsiye','$detay','$zirve','$verified_user','$yer','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sor);

if ($sor) 
{ echo "$zirve eklendi<br>anket sayfas�na gitmek i�in <a href='sozluk.php?process=anketgoster'>tiklayin</a>"; } 
else {
echo "<i><b>bi sey oldu galiba:<b>kay�t veritaban�na eklenemedi. l�tfen daha sonra tekrar deneyiniz. in english press <b>9</b>.</i><input type=button class='but' onClick='history.go(-1)' value='9'>";}

$konu = " $zirve eklendi ";
$system = "anket habercisi";
$yazi = "$organizator tarafindan $zirve eklendi";
$yazar= "mediterranean"; //buraya istedi�in nicki yaz
$starih = date("YmdHi");


$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$yazar','$konu','$yazi','$system','$starih','2','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
?>