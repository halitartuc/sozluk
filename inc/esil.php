<?
if (!$verified_user) die("yapma bunu, yapma bunuuuu!");
?>

<?
if ($id and $sira) {
$sebep =@$_POST['sebep'];
if (empty($sebep)){echo "sebep girmelisin dostum!";}else{
$id =@$_POST["id"];
$sira =@$_POST["sira"];

$sorgu1 = "SELECT baslik,id FROM konucuklar WHERE `id` = '$sira'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];

$sorgu1 = "SELECT mesaj,id,yazar FROM mesajciklar WHERE `id` = '$id'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$mesaj=$kayit2["mesaj"];
$dbyazar=$kayit2["yazar"];

if ($dbyazar != $verified_user and $verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "modust" )  {
$ip = getenv('REMOTE_ADDR');
echo "bu i�lem i�in yetkili de�ilsin babu�!<br>ip adresini ($ip) kaydettim ona g�re!";
die;
}

$tarih = gmdate("YmdHi"); 
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$sebep = kucultuver($sebep);
//burasi modlog icin
if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust") {
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");
$tarih = gmdate("YmdHi"); 
$sorgu = "INSERT INTO history ";
$sorgu .= "(olay,mesaj,moderat,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('entry sil','#$id nolu entry silindi','$verified_user','$tarih','$gun','$ay' ,'$yil','$saat')";
mysql_query($sorgu); }
//modlog bitti
//entry silinme nedeni g�ster�l�or
$konu = "$id numaral� entry\'iniz silindi.";
$yazi = "
<br><i>(gbkz: $baslik)</i> ba�l���na yazd���n�z #$id numaral� entry\'iniz silinmi�tir. ��pl�kten kontrol edebilirsiniz.
<br><br>sebep: $sebep <br><br>
";
$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$dbyazar','$konu','$yazi','SYSTEM','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

if (!$ucur) {
$sorgu = "UPDATE mesajciklar SET `statu` = 'silindi' WHERE id='$id'";
mysql_query($sorgu);
$sorgu = "UPDATE mesajciklar SET `silen` = '$verified_user' WHERE id='$id'";
mysql_query($sorgu);
$sorgu = "UPDATE mesajciklar SET `silsebep` = '$sebep' WHERE id='$id'";
mysql_query($sorgu);

echo "<div class=dash><center><b>$id, $sebep sebebi ile silinenler listesine eklendi.</div>
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1;URL=sozluk.php?process=word&q=$baslik\">";
}
}}
else if ($id) {
echo "
      <FORM name=a method=post action=>

<table width='570' height='52' border='0'>
    <tr>
      <td colspan=\"2\">
<input type=text name=sebep size=90 value=\"$updatesebep\"> (sebep)
          </td>
    </tr>


		
  <tr>
    <td>&nbsp;</td>
    <td><input type=hidden name=sira value=$sr>
        <input type=hidden name=id value=$id>
        <INPUT type=hidden value=gonder name=gonder>
        <INPUT class=but id=kaydet type=submit value=sil name=kaydet></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
      </FORM>
";
}

?>