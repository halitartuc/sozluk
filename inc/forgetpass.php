<?
if ($ok and $gemail and $gyazar) {
$gyazar =@$_POST["gyazar"];
$gemail =@$_POST["gemail"];
$sorgu = "SELECT email,nick FROM user WHERE nick='$gyazar' and email='$gemail'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$email=$kayit["email"];
$nick=$kayit["nick"];
include "config.php";
echo "$email adresine �ifreniz g�nderildi.";

mt_srand ((double)microtime()*1000000);
$sifrem = mt_rand(1, 999999);
$sifre = md5($sifrem);
$sorgu = "UPDATE user SET sifre='$sifre' WHERE nick='$gyazar'";
mysql_query($sorgu);

$mailkonu = "$gyazar nickli kullan�c�n�n bilgileri";
$icerik = "
Merhaba $gyazar,<br><br>
�ifrenizi unutmussunuz, bizde de�i�tirip yenisini size g�nderelim dedik.<br><br>
�ifreniz : $sifrem<br><br>
bol Entrylar<br><br>
$sitename Y�netimi<br>
$site
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
            
@mail($email,$mailkonu,$icerik,$headers) or stderr("hata. mail g�nderilemedi renvacy'e ula��n");   
            
        


die;
}
}
else {
echo "<center><font size=2><img src=images/unlem.gif> nick ile mail adresi uyu�muyor yada b�le bi yazar yok ?";
die;
}
}
else {
?>
<form method=post action="<? $_SERVER["PHP_SELF"] ?>">
<table width="363" height="51" border="0">
  <tr>
    <td width="108" height="21">nick</td>
    <td width="10">:</td>
    <td width="231"><input name="gyazar" type="text" id="gyazar"></td>
  </tr>
  <tr>
    <td>e-mail</td>
    <td>:</td>
    <td><input name="gemail" type="text" id="gemail"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" class=but value="sifremi yolla"></td>
    <input type=hidden name=ok value=ok>
  </tr>
<br>
bazi mail sunucular�nda g�nderdi�imiz mailler "junk" mail k�sm�na d��mektedir.
<br>
junk maile gelen mailleri g�venli olarak i�aretlerseniz gelen mailler art�k inbox a gelecektir.
<br>
</table>
<?
}
?>