<?
session_start();
$sorgu = "SELECT nick FROM user where nick='$verified_user";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){

while ($kayit=@mysql_fetch_array($sorgulama)){
/////////
$nick=$kayit["nick"];
}
}
echo "Ho�geldin <b>$nick</b><br>";
echo "$nick senden bug�n de iyi entryler bekliyoruz..<br>";
echo "Birazdan bir yerlere y�nlendirilmen lazim, olmazsa <a href='sozluk.php?process=onlines'> buraya</a> t�kla ya da -daha adam gibi y�nlendirme kodu �alistiramayan s�zl�g�n ben ...- diyerekten s�zl�g� kapat gitsin.";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5;URL=sozluk.php?process=onlines\">";

?>