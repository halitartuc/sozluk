<?
$cachetime = (60*12) * 60;
include "cache.php";
cache_check('fikirdegistirenmod');
?>

�abuk fikir de�i�tirenler ve be�enmeyenler (Modlar di�er entryleri d�zenleyebilmektedir):
<table border="0">
<?php
$sorgu=mysql_query("select updater,count(id) as sayi from mesajciklar group by updater order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "
  <tr>
   <td>$oku[updater] - $oku[sayi]</td>
  </tr>
 ";
}
?>
</table> 
<?
cache_save('fikirdegistirenmod');
?>