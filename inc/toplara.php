<?

$zirvesearch=$_POST['zirvesearch'];
$zirvesearch=strtolower($zirvesearch);
$sorgu= "SELECT * FROM zirvemax WHERE zirve LIKE '%$_POST[zirvesearch]%'"
$sorgulama=mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0) {
	echo "b�yle bir zirve yok, belki de bunu da kediler yemi�tir";
while ($rudy=mysql_fetch_array($sorgulama) {
	
	$zirvesearch=$rudy['zirvesearch'];
	
	echo "<a link='falanko'>$zirvesearch</a>";
	
}
}
	