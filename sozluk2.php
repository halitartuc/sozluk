<?
session_start();
ob_start();
include "inc/baglan.php";

if ($verified_user) {
$sorgu1 = "SELECT * FROM user WHERE `nick` = '$verified_user'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$tema=$kayit2["tema"];
if (!$tema)
$tema = "halic";
}
else {
$tema = "sozluk";
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=WINDOWS-1254">
<SCRIPT src="images/top.js" type=text/javascript></SCRIPT>
<SCRIPT language=javascript src="images/sozluk.js"></SCRIPT>
<LINK href="favicon.ico" rel="shortcut Icon"><LINK href="favicon.ico" rel=icon>
<LINK href="images/sozluk.css" type=text/css rel=stylesheet>
<LINK href="images/<? echo $tema ?>.css" type=text/css rel=stylesheet>
</head>

<body>





<?

$verified_user = $_SESSION['verified_user'];
$verified_kat = $_SESSION['verified_kat'];
$verified_durum = $_SESSION['durum'];
$kat = $_SESSION['kat'];

if ($_POST[adm] or $_REQUEST[verified_user] or $_REQUEST[verified_kat] or $_REQUEST[kullanici]) {
 die();
} 
$user_ip = getenv('REMOTE_ADDR');
$sorgu1 = "SELECT ip FROM ipban WHERE `ip` = '$user_ip'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$ip=$kayit2["ip"];
if ($ip and $verified_user != "the brain")
header("Location: bakim.php");

$sorgu1 = "SELECT nick,durum FROM user WHERE `nick` = '$verified_user'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$durum=$kayit2["durum"];
$nick=$kayit2["nick"];
if ($durum == "sus")
header ("Location: logout.php");

$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$site=$kayit2["site"];
$reg=$kayit2["reg"];

if (eregi('http', $process)) {
    echo "hata";
exit;
}

if (eregi('www', $process)) {
    echo "hata";
exit;
}

if ($site == "off" and $verified_kat == "admin" and $process != "top") {
echo "<font color=red>Uyar�!: Site �uan kapal� konumda.</font>";
}
if ($site == "tech" and $verified_kat == "admin" and $process != "top") {
echo "<font color=red>Uyar�!: Site �uan bak�m konumunda.</font>";
}
if ($site == "off" and $verified_kat != "admin" and $process != "top") {
include "bakim.php";
die;
}
if ($site == "tech" and $verified_kat != "admin" and $process != "top") {
include "bakim.php";
die;
}
if ($site == "bakimda" and $verified_user and $process != "top") {
	echo "S�zl�k bak�ma girmi�tir. Performans sorunlari ya�ayabilirsiniz...";
}

if ($verified_user) {       // kontrol
$son_zaman = time() - 1800;
$sorgu = "DELETE FROM online WHERE islem_zamani < $son_zaman";
mysql_query($sorgu);
$simdikizaman = time();
if ($verified_kat == "admin") {
$gnick = "&$verified_user";
$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$gnick'";
mysql_query($sorgu);
}
else if ($verified_kat == "mod" or $verified_kat == "modust") {
$gnick = "+$verified_user";
$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$gnick'";
mysql_query($sorgu);
}
else if ($verified_kat == "gammaz") {
$gnick = "$verified_user*";
$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$gnick'";
mysql_query($sorgu);
}
else {
$sorgu = "UPDATE online SET islem_zamani=$simdikizaman WHERE nick='$verified_user'";
mysql_query($sorgu);
}
} // kayitli online kont


if ($process) {
if ($process == "privmsg" and !$verified_user) {
Header ("Location: logout.php");
die;
}

if ($process == "cp" and !$verified_user) {
Header ("Location: logout.php");
die;
}

if ($process == "add" and !$verified_user) {
Header ("Location: logout.php");
die;
}
if ($process == "adm" and !$verified_user) {
Header ("Location: logout.php");
die;
}

if ($process == "msjoku" and !$verified_user) {
Header ("Location: logout.php");
die;
}

if ($process == "msjana" and !$verified_user) {
Header ("Location: logout.php");
die;
}

if ($process == "yenimsj" and !$verified_user) {
Header ("Location: logout.php");
die;
}
if ($process == "adm" and !$verified_user) {
Header ("Location: logout.php");
die;
}

if ($process == "onlines" and !$verified_user) {
Header ("Location: logout.php");
die;
}
/*if($process== "dsearch" and $verified_user)
{
Header("Location: inc/dsearch.php");
die;}*/

if ($_REQUEST[kullanici] or $_REQUEST[sozluk] or $_REQUEST[verified_kat] or $_REQUEST[verified_user]) { die(); }  
// echo $process;
if ($process!="adm") {
	if (file_exists("inc/$process.php")) {
	include "inc/$process.php";
	} else {
		if ($_GET['q'] and !$process and !$_GET['b']) {
		 include "inc/word.php";
		} else if (!$_GET) {
		 include "inc/word.php";
		} else if ($_GET['q'] and !$process and $_GET['b']="td") {
		 include "inc/word.php";
		} else {
		header("Location: sozluk.php?process=word&q=Hali�+S�zl�k");
		}	
	}
} else {
	if (file_exists("adm/$process.php")) {
	include "adm/$process.php";
	}
}



if ($process == "word") {
function mtime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
    }
$basla = mtime();
for ($i=0; $i < 10000; $i++){
    }
$bitir = mtime();
echo "<br><br><br><center><a href=sozluk.php?process=word&q=Hali�+S�zl�k target=main><font size=1>Hali� S�zl�k entertaintment</font></a>";

echo "
<hr>
<div class='copyright' align='center'>Hali� S�zl�k</DIV><br>

<font size=1><a href=sozluk.php?process=word&q=Hali�+S�zl�k target=main><font size=1>&copy; 2009 - 2010 Hali� S�zl�k</font></a> | <a href=http://www.halicsozluk.com/xml/today.xml target=main><font size=1>Hali� S�zl�k RSS</font></a> | Kurulu� : 10.11.2009<br>
s�zl�kte olan her�ey yalan olabilir. hali� s�zl�k i�eri�i herhangi bir �n denetimden ge�meksiniz oldu�u gibi yay�nlan�r ve do�rulu garanti edilmemektedir. <br>her yazar kendi baca��ndan as�l�r, kimse bizi ba�lamaz. s�zl�kte bulunan her sat�r yazarlar�na aittir. araklanmas� yada kaynak g�sterilmeden yay�nlanmas� yasakt�r. kaynak g�sterilerek ticari olmayan yerlerde yay�nlanabilir.<br>

";
}

}
ob_end_flush();
?>
</body>
</html>

