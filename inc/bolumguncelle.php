<?

$bolum =@$_POST["bolum"];
if ($bolum == "Di�er"){$bolum =@$_POST["bolum2"];}
if (empty ($bolum)){echo "Bi zahmet b�l�m yaz..";}else{

$sorgu = "UPDATE user SET bolum='$bolum' WHERE nick='$nick'";
mysql_query($sorgu);
echo "say�n $nick; <br>yeni b�l�m�n $bolum olarak de�i�tirildi. 
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=cop\">";}
exit;
mysql_close();

?>
