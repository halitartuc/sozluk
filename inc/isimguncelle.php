<?

$isim=$_POST['isim'];

$isim = ereg_replace("�","s",$isim);
$isim = ereg_replace("�","S",$isim);
$isim = ereg_replace("�","c",$isim);
$isim = ereg_replace("�","C",$isim);
$isim = ereg_replace("�","i",$isim);
$isim = ereg_replace("�","I",$isim);
$isim = ereg_replace("�","g",$isim);
$isim = ereg_replace("�","G",$isim);
$isim = ereg_replace("�","o",$isim);
$isim = ereg_replace("�","O",$isim);
$isim = ereg_replace("�","u",$isim);
$isim = ereg_replace("�","U",$isim);
$isim = ereg_replace("�","O",$isim);
$isim = ereg_replace("<",")",$isim);



$sorgu = "UPDATE user SET isim='$isim' WHERE nick='$nick'";
mysql_query($sorgu);
echo "say�n $nick; <br>en afillisinden ismin de�i�tirildi. s�per oldu. ";
exit;
mysql_close();

?>
