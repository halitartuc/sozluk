<?
if (!$verified_user) {
 header("Location:sozluk.php?process=master&login=yescanim");
} else {
 if ($_GET['n']) {
 $sorgu=mysql_query("select * from rehber where kim='$_GET[n]' and kimin='$verified_user'");
 $kontrol=@mysql_num_rows($sorgu);
 if ($kontrol==0) {
 $ekle=mysql_query("insert into rehber values('','$_GET[n]','$verified_user','0')");
 $no=@mysql_num_rows($ekle);
  if ($no>=1) {
   echo "Hasstir.. bu hatayi ister gormezden gel �st�ne kalmasin, ister patrona bildir azar i�it..";
  } else {
   header("Location:sozluk.php?process=panpa");
  }
 } else {
  echo "bu ki�i zaten sizin listenizde mevcut bir daha eklenmez, �ok sevdiysen alip evde besle..";
 }
 }
}
?>
