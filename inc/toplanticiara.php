<?

if ($_GET['who']) {
	
	
	?>
	<?
	
$sorgu = "SELECT id,zuser,muzik,tanim,film,ruh,mekan FROM zirveuser where zuser='$_GET[who]' order by id desc";
$sorgulama = @mysql_query($sorgu);
if (@mysql_num_rows($sorgulama)>0){

while ($kayit=@mysql_fetch_array($sorgulama)){

$id=$kayit["id"];
$zuser=$kayit["zuser"];
$muzik=$kayit["muzik"];
$tanim=$kayit["tanim"];
$film=$kayit["film"];
$ruh=$kayit["ruh"];
$mekan=$kayit["mekan"];


echo "<b> <a target='main' href='sozluk.php?process=word&q=$zuser'>$zuser</a></b><br><br>

<div class='highlight'><b>dinledi�i m�zik t�r�:</b> $muzik <br><br></div>
<b>son gitti�i sinema filmi:</b> $film <br><br>
<div class='highlight'><b>nas�l birisidir:</b> $ruh <br><br></div>
<b>s�k�a tak�ld��� mekan:</b> $mekan <br><br>
<div class='highlight'><b>kendini nas�l ifade ediyor:</b><br>
$tanim</div> ";


}
}
?>
<?
}
else {
	echo "bu tipte kimse yok";
}
?>

