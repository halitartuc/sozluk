<?
include "config.php";
if ($verified_user)
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"86000;URL=sozluk.php?process=tebrikmail\">";
//Dogum G�n� Tebrik Maili {rudy}
$konu="Do�um G�n�n�z Kutlu Olsun";
$mesaj="De�erli yazar�m�z \n do�um g�n�n� unuttuk mu sand�n? Do�um g�n�n� en i�ten dileklerimizle kutlariz.\n Hayatin tum guzellikleri sizinle olsun \n  $sitename \n  $site";
$ek="From: $sitename  <$sitemail>\n";
$day=date("d");
$month=date("n");
$today="$day/$month";
$dtsorgu = mysql_query("SELECT * FROM user WHERE dt like '$today%'");
$dttarihtoplam = mysql_num_rows($dtsorgu);
while($goster = mysql_fetch_assoc($dtsorgu)) {	
mail($goster['email'], $konu, $mesaj,$ek) ;
}
?>