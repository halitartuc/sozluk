<fieldset>
<?
/*
zirve istatistikleri
*/

?>
<a href='sozluk.php?process=anketgoster'>anketler</a> | <a href='sozluk.php?process=anketstat'>istatistikler</a><hr>
<br>
anket�r istatistikleri<br>
<br>

<br><hr><fieldset>
<table border="0">
<?php
echo "<div class='highlight'>en anket�r yazarlar <a href='' title='en anket�r yazarlar'>*</a></div>";
$sorgu=mysql_query("select organizator,count(id) as sayi from anketor group by organizator order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "<tr>
      <td>$say. $oku[organizator] - $oku[sayi]</td>
      <td>";
}
?> 

</table></fieldset>
</fieldset>