<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($yazaronayla != 1) {
echo "Bu i�lem i�in gerekli yetkiye sahip de�ilsiniz";
die;
}

if ($ok) {

foreach($id as $kayit)
{
$sorgu = "UPDATE user SET durum = 'on' WHERE id='$kayit'";
mysql_query($sorgu);

$sorgu1 = "SELECT nick,id,email,isim FROM user WHERE `id` = '$kayit'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$nick=$kayit2["nick"];
$email=$kayit2["email"];
$isim=$kayit2["isim"];

$sorgu = "UPDATE mesajciklar SET statu = '' WHERE yazar='$nick'";
mysql_query($sorgu);

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$konu = "Yazar oldunuz!";
$konumail = "Yazarl�k ba�vurunuz onayland�!";
$system = "SYSTEM";
$yazi = "
Yazarl���n�z y�neticiler taraf�ndan onaylanm��t�r.<br>
�uan yazar stat�s�ne ge�tiniz.
<b></b>
";
//burasi modlog icin
if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$tarih = "$gun/$ay/$yil";
$sorgu = "INSERT INTO history ";
$sorgu .= "(olay,mesaj,moderat,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('yazar onayla','$nick, yazarl�g� onayland�','$verified_user','$tarih','$gun','$ay' ,'$yil','$saat')";
mysql_query($sorgu);
//modlog bitti
$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$nick','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

echo "$nick [$email] onayland�.<br>";

$icerik = "Merhaba $isim;<br><br>
$sitename'e <b>$nick</b> kullan�c� ad� ile yapm�� oldu�unuz yazarl�k ba�vurunuz kabul edilmistir.<br>
Direk giris yaparak entry girmeye ba�layabilirsiniz!<br><br>
E�er �ifrenizi hat�rlam�yorsan�z, �ye giri�i b�l�m�nden > �ifremi unuttum diyerek yeni �ifre talebinde bulunabilirsiniz. Bundan sonra �ifrelerinize sahip ��k�p unutmay�n..
<br><br>
Bol �an�lar ;)<br><br>
$sitename Y�netim<br>
www.ankasozluk.com
";

$fromname=$sitename;
$fromemail=$sitemail;
if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
        $eol="\r\n";        
    }
    elseif (strtoupper(substr(PHP_OS,0,3)=='MAC'))
        $eol="\r";
    else
        $eol="\n"; 
    $mid = md5($_SERVER['REMOTE_ADDR'] . $fromname);
    $name = $_SERVER["SERVER_NAME"];
	$headers .= "Content-type: text/html; charset=iso-8859-9".$eol;
    $headers .= "From: $fromname <$fromemail>".$eol;    
    $headers .= "Reply-To: $fromname <$fromemail>".$eol;
    $headers .= "Return-Path: $fromname <$fromemail>".$eol;
    $headers .= "Message-ID: <$mid $sitemail".$eol;
    $headers .= "X-Mailer: PHP v".phpversion().$eol; 
        $headers .= "MIME-Version: 1.0".$eol; 
        $headers .= "X-Sender: PHP".$eol;       
@mail($email,$konumail,$icerik,$headers) or stderr("Hata. Mail g�nderilemedi the brain'e ula��n");   

}
}
else {
echo "
<strong>Onay bekleyen ��mler:</strong><br>
<form method=post action=>
<table width=\"606\" border=\"1\">
";
$sorgu = "SELECT nick,durum,email,id,isim FROM user WHERE durum= 'wait' or durum='off' or durum='sus' ORDER BY durum desc";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){
//kay�tlar� listele
while ($kayit=@mysql_fetch_array($sorgulama)){
###################### var ##############################################
$nick=$kayit["nick"];
$isim=$kayit["isim"];
$email=$kayit["email"];
$id=$kayit["id"];
$durum=$kayit["durum"];
echo "

  <tr>
    <td width=\"229\"><a href=\"sozluk.php?process=adm&islem=kullanici&update=ok&gnick=$nick\" title=\"$isim\">$nick</a></td>
    <td width=\"344\">$email</td>
    <td width=\"80\">$durum</td>
    <input type=hidden name=nick value=\"$nick\">
    <td width=\"19\"><input name=\"id[]\" type=\"checkbox\" id=\"$id\" value=\"$id\"></td>
  </tr>
";
}
echo "
</table>
<input type=hidden name=ok value=ok>
<input type=\"submit\" name=\"Submit\" value=\"Onayla\">
</form>
";
}
else {echo "<br>Onay bekleyen kimse yok bro !! :(";
}
}
?>