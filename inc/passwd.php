<?
$esifre = md5($_POST["esifre"]);
$ysifre = $_POST["ysifre"];
$ysifre2 =@$_POST["ysifre2"];

$nick = $verified_user;

if (!$okpasswd) {
echo "H�yt ulan !";
}
else {
// degiskenleri ata
$sorgu = "SELECT * FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kay�tlar� listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$sifre=$kayit["sifre"];
} //while
} // if

if ($esifre == "" or $ysifre == "" or $ysifre2 == "") {
echo "Bo� alan b�rakmamak iktiza etmekte..";
exit;
}

if ($esifre != $sifre) {
echo "�uanki �ifrenizi do�ru yazarsan�z �ifrenizi de�i�tiricem ama..";
exit;
}

if ($ysifre != $ysifre2) {
echo "Alt� �st� �ifreyi 2 yere birden yaz�can onuda beceremiyosun.. Bence sen vazge� bu yazarl�k sevdas�ndan..";
exit;
}




/*$ysifre = ereg_replace("�","s",$ysifre);
$ysifre = ereg_replace("�","S",$ysifre);
$ysifre = ereg_replace("�","c",$ysifre);
$ysifre = ereg_replace("�","C",$ysifre);
$ysifre = ereg_replace("�","i",$ysifre);
$ysifre = ereg_replace("�","I",$ysifre);
$ysifre = ereg_replace("�","g",$ysifre);
$ysifre = ereg_replace("�","G",$ysifre);
$ysifre = ereg_replace("�","o",$ysifre);
$ysifre = ereg_replace("�","O",$ysifre);
$ysifre = ereg_replace("�","u",$ysifre);
$ysifre = ereg_replace("�","U",$ysifre);
$ysifre = ereg_replace("�","O",$ysifre);*/



$sorgu = "SELECT nick,sifre FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kay�tlar� listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$nick=$kayit["nick"];
$ysifre = md5($ysifre);
$sorgu = "UPDATE user SET sifre='$ysifre' WHERE nick='$nick'";
mysql_query($sorgu);
session_destroy();
echo "�ifreniz ba�ar�yla degi�tirildi.Yeniden giri� yapmak i�in y�nlendiriliyorsunuz, Please wait..
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5;URL=logout.php\">
";
exit;
}
}
}
?>