<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-9">
<?
$ip = getenv('REMOTE_ADDR');
$site = $_SERVER["HTTP_REFERER"];
$site = explode("/", $site);
$site = $site[2];

if ($okmu != "ok") {
echo "S�z vermeden �ye olamazsin, bizde s�z senettir ;)";
exit;
}

if (!$okmu) {
echo "L�tfen d�zg�n doldurunuz!($ip logged)";
}
else {
// degiskenleri ata
$nick =$_POST["nick"];
if ($nick == "") {
echo "Heryeri doldur can&#305;m..";
exit;
}

if (!ereg ("^[' A-Za-z0-9]+$", $nick)) {
echo "Nickinizde;<br>sadece kucuk ve ingilizce harfler,<br>bosluk {space},<br>ve rakamlar bulunabilir.<br>L�tfen bu kurallara uygun bir nick yazin.";
die;
}



$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$reg=$kayit2["reg"];
if ($reg == "off") {
$sifre =$_POST["sifre"];
$sifre2 =$_POST["sifre2"];
if (!$sifre or !$sifre2) {
echo "Sifre yaz hocam..";
exit;
}
if ($sifre != $sifre2) {
echo "Alti �st� sifreyi 2 yere birden yazican onuda beceremiyosun..Gencligine yazik hocam..";
exit;
}

}

	$nick =$_POST["nick"];
	$email =$_POST["email"];
	$isim =$_POST["isim"];
	$day =$_POST["day"];
	$month =$_POST["month"];
	$year =$_POST["year"];
	$cinsiyet =$_POST["cinsiyet"];
	$sehir =$_POST["sehir"];

$nick = ereg_replace("&#351;","s",$nick);
$nick = ereg_replace("&#350;","S",$nick);
$nick = ereg_replace("�","c",$nick);
$nick = ereg_replace("�","C",$nick);
$nick = ereg_replace("&#305;","i",$nick);
$nick = ereg_replace("&#304;","I",$nick);
$nick = ereg_replace("&#287;","g",$nick);
$nick = ereg_replace("&#286;","G",$nick);
$nick = ereg_replace("�","o",$nick);
$nick = ereg_replace("�","O",$nick);
$nick = ereg_replace("�","u",$nick);
$nick = ereg_replace("�","U",$nick);
$nick = ereg_replace("�","O",$nick);

$email = ereg_replace("&#351;","s",$email);
$email = ereg_replace("&#350;","S",$email);
$email = ereg_replace("�","c",$email);
$email = ereg_replace("�","C",$email);
$email = ereg_replace("&#305;","i",$email);
$email = ereg_replace("&#304;","I",$email);
$email = ereg_replace("&#287;","g",$email);
$email = ereg_replace("&#286;","G",$email);
$email = ereg_replace("�","o",$email);
$email = ereg_replace("�","O",$email);
$email = ereg_replace("�","u",$email);
$email = ereg_replace("�","U",$email);
$email = ereg_replace("�","O",$email);


$sehir = ereg_replace("&#351;","s",$sehir);
$sehir = ereg_replace("&#350;","S",$sehir);
$sehir = ereg_replace("�","c",$sehir);
$sehir = ereg_replace("�","C",$sehir);
$sehir = ereg_replace("&#305;","i",$sehir);
$sehir = ereg_replace("&#304;","I",$sehir);
$sehir = ereg_replace("&#287;","g",$sehir);
$sehir = ereg_replace("&#286;","G",$sehir);
$sehir = ereg_replace("�","o",$sehir);
$sehir = ereg_replace("�","O",$sehir);
$sehir = ereg_replace("�","u",$sehir);
$sehir = ereg_replace("�","U",$sehir);
$sehir = ereg_replace("�","O",$sehir);


$isim = ereg_replace("&#351;","s",$isim);
$isim = ereg_replace("&#350;","S",$isim);
$isim = ereg_replace("�","c",$isim);
$isim = ereg_replace("�","C",$isim);
$isim = ereg_replace("&#305;","i",$isim);
$isim = ereg_replace("&#304;","I",$isim);
$isim = ereg_replace("&#287;","g",$isim);
$isim = ereg_replace("&#286;","G",$isim);
$isim = ereg_replace("�","o",$isim);
$isim = ereg_replace("�","O",$isim);
$isim = ereg_replace("�","u",$isim);
$isim = ereg_replace("�","U",$isim);
$isim = ereg_replace("�","O",$isim);

$nick = strtolower($nick);
$email = strtolower($email);

$sorgu = "SELECT nick,id FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kay&#305;tlar&#305; listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if ($id) {
echo "B�yle bi yazar zaten var, �zenti olmayalim ve farkli bir nick secelim l�tfen :)";
exit;
}
}
}

$tarih = date("Y/m/d G:i");
$dt = "$day/$month/$year";
$durum = "on";
if ($reg == "on") {
$ifade = md5(rand(0,99999));
$sifre = substr($ifade, 17, 6);
$betasifre = md5($sifre);
}
else {
$betasifre = md5($sifre);
}
$yetki = "user";

$sorgu = "INSERT INTO user ";
$sorgu .= "(isim,nick,sifre,email,dt,cinsiyet,sehir,durum,yetki,regip,regtarih)";
$sorgu .= " VALUES ";
$sorgu .= "('$isim','$nick','$betasifre','$email','$dt','$cinsiyet','$sehir','$durum','$yetki','$ip','$tarih')";
mysql_query($sorgu);
$kime = $email;
$konu = "&#351;ifreniz";
$icerik = "Merhaba $isim\n
\n
Kullanici adiniz: $nick\n
sifreniz: $sifre\n
\n
http://ankasozluk.com
";

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$konu = "<img src=images/unlem.gif> Ho&#351;geldiniz!";
$system = "SYSTEM";
$yazi = "
Merhaba $isim,<br>
�aylakl�k s�reniz esnasinda 10 adet entry girme hakkiniz var.Girdiginiz bu entry`lar sadece y�neticiler tarafi;ndan okunacaktir.<br>
10. entry`inizi girdiginiz andan itibaren entry`lariniz Adminlerin onayina sunulacak ve eger s�zl�k formatina uygun bir tarziniz var yazarliginiz kabul edilecektir.Eger yazarliginiz kabul edilirse girdiginiz 10 entry`da dogal olarak halka arz edilecek ve herkesin g�rebilmesi saglanacaktir.<br>
Ayrica ��mezlik d�neminiz boyunca ek olarak, haberlesme sistemini kullanabilir, ispit�ilik yapabilirsiniz.
<br>
<b>yazarliginiz onaylaninca sistem otomatik olarak size �zel mesaj g�nderecektir.</b><br>
Gelen �zel mesaji okudugunuzda daha detayli bilgiye sahip olacak ve fantastik yazar ilan edileceksiniz.
Basarilar ;)
";

$yazi = ereg_replace("\n","<br>",$yazi);

/*$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$nick','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
$mailkonu = "Anka S�zl��e Ho�geldiniz";*/
mail("$kime", "$mailkonu", "$icerik", "From: Anka S�zl�k <info@ankasozluk.com>");
echo "
<div class=div1>
Yazar ba&#351;vurunuz kabul edildi.<br>
L�tfen kullan&#305;c&#305; giri&#351;i k&#305;sm&#305;ndan sisteme giri&#351; yaparak haberle&#351;me b�l�m�ndeki ilk mesaj&#305;n&#305;z&#305; kontrol ediniz.<br>
</div>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"10;URL=sozluk.php?process=master&login=yescanem\">
";
}
?>