<?
if (!$verified_user) {
 header("Location:sozluk.php?process=master&login=yescanim");
} else {
 if ($_GET['id'] and $_GET['sr'] and !$_POST['tasi']) {
 ?>
 <form action="" method="POST">
 #<?=$id?> numaral� entry'yi #<input type="text" size="5" name="sira"> numaral� ba�l��a ta��!<br>
 <input type="submit" name="tasi" value="tamamdir">
 </form>
 <?
 } else if ($_POST['tasi']) {
 $degistir=mysql_query("update mesajciklar set sira='$_POST[sira]' where id='$_GET[id]'");
 $no=@mysql_num_rows($degistir);
  if ($no>=1) {
  echo "engine s��t� sonra tekrar deneyiniz";
  } else {
  echo "entryniz #$_POST[sira] numaral� ba�l��a ta��nm��t�r";
  }
 }
}
?>
