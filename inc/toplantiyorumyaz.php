
<?

$sorg=mysql_query("SELECT zirve,id from zirvemax where id= '$id'");

$comment=$_POST['comment'];

$comment = ereg_replace("%u0131","�",$comment);
$comment = ereg_replace("%u0130","�",$comment);
$comment = ereg_replace("%u011F","�",$comment);
$comment = ereg_replace("%u011E","�",$comment);
$comment = ereg_replace("%u015F","�",$comment);
$comment = ereg_replace("%u015E","�",$comment);
/*
$comment = ereg_replace("&#305;","�",$comment);
$comment= ereg_replace("&#287;","�",$comment);
$comment = ereg_replace("�","�",$comment);
$comment = ereg_replace("�","�",$comment);
$comment = ereg_replace("�","i",$comment);
$comment = ereg_replace("�","�",$comment);
$comment = ereg_replace("�","�",$comment);
$comment = ereg_replace("�","�",$comment);
$comment = ereg_replace("�","O",$comment);
$comment = ereg_replace("�","c",$comment);
$comment = ereg_replace("�","C",$comment);
$comment = ereg_replace("�","i",$comment);
$comment = ereg_replace("�","u",$comment);
$comment = ereg_replace("�","U",$comment);
$comment = ereg_replace("�","g",$comment);
$comment = strtolower($comment);
*/
$sorgu= "SELECT zirve,id from zirvemax where id = '$id'";
$sorguyap= @mysql_query ($sorgu);
if(mysql_num_rows($sorguyap)>0) {

	
	while ($do=@mysql_fetch_array($sorguyap)) {
	
$zirve=$do['zirve'];
$list=$do['id'];

}
}

$btarih = date("Y-m-d/H:i");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("G:i");

$sor = " INSERT INTO zirvecom ";
$sor .= "(yazan,comment,list,tarih,gun,ay,yil,saat)";
$sor .= " VALUES ";
$sor .= "('$verified_user','$comment','$list','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sor);
echo "yorumunuz eklendi";



?>
