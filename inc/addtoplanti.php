<?php

if ($zirve == "" || $detay == "" || $tarih == "" || $yer == "" || $tavsiye == "") {
die("<i><b>h�yt:</b> heryeri doldur can�m</i>
<br><br><input type=button class='but' onClick='history.go(-1)' value='kusura bakma'>"); }

$zirve=mysql_real_escape_string($_POST["zirve"]);
$tarih=htmlspecialchars(strip_tags($_POST["tarih"]));
$yer=htmlspecialchars(strip_tags($_POST["yer"]));
$detay=htmlspecialchars(strip_tags($_POST["detay"]));
$tavsiye=htmlspecialchars(strip_tags($_POST["tavsiye"]));
$sehir=htmlspecialchars(strip_tags($_POST["sehir"]));

if (strlen($zirve)>80) { die("<i><b>bi �ey oldu:<b>toplanti ad� 80 karakterden fazla olamaz</i>"); }
if (strlen($tarih)>11) { die("<i><b>bi �ey oldu:<b>tarih b�l�m� 9 karakterden fazla olamaz</i>"); }
if (strlen($yer)>50) { die("<i><b>bi �ey oldu:<b>mekan ad� 50 karakterden fazla olamaz</i>"); }
if (strlen($detay)>200) { die("<i><b>bi �ey oldu:<b>detay b�l�m� 200 karakterden fazla olamaz</i>"); }

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

$yer = ereg_replace(">","<br>",$yer);
$yer = ereg_replace("�","c",$yer);
$yer = ereg_replace("�","g",$yer);
$yer = ereg_replace("�","i",$yer);
$yer = ereg_replace("�","o",$yer);
$yer = ereg_replace("�","u",$yer);

$zirve=strtolower($zirve);
$detay=strtolower($detay);
$yer=strtolower($yer);
$tavsiye=strtolower($tavsiye);

$detay=mysql_real_escape_string($detay);


$btarih = date("Y-m-d/H:i");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("G:i");

$sor = " INSERT INTO zirvemax ";
$sor .= "(tavsiye,detay,zirve,sehir,organizator,yer,tarih,gun,ay,yil,saat)";
$sor .= " VALUES ";
$sor .= "('$tavsiye','$detay','$zirve','$sehir','$verified_user','$yer','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sor);

if ($sor) 
{ echo "$zirve eklendi<br>toplant� sayfas�na gitmek i�in <a href='sozluk.php?process=toplantigoster'>t�klay�n</a>"; } 
else {
echo "<i><b>bi �ey oldu galiba:<b>kay�t veritaban�na eklenemedi. l�tfen daha sonra tekrar deneyiniz. in english press <b>9</b>.</i><input type=button class='but' onClick='history.go(-1)' value='9'>";}

$konu = " $zirve eklendi ";
$system = "Toplant� Habercisi";
$yazi = "$organizator taraf�ndan $zirve eklendi";
$yazar= "SYSTEM"; //buraya istedi�in nicki yaz
$starih = date("YmdHi");


$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$yazar','$konu','$yazi','$system','$starih','2','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
?>