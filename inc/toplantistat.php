<fieldset>
<?
/*
zirve istatistikleri
*/

?>
<a href='sozluk.php?process=toplantigoster'>toplant�</a> | <a href='sozluk.php?process=toplantistat'>istatistikler</a><hr>
<br>
toplant�lar�n rakama d�n��m�s halleri<br>
<br>
<fieldset>
<table border="0">
<?php
echo "<div class='highlight'>en �ok toplant� yap�lan �ehirler</div>";
$sorgu=mysql_query("select sehir,count(id) as sayi from zirvemax group by sehir order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "<tr>
      <td>$say. $oku[sehir] - $oku[sayi]</td>
      <td>";
}
?> 

</table> </fieldset>
<br><hr><fieldset>
<table border="0">
<?php
echo "<div class='highlight'>en �ok toplant� d�zenliyenler'lar <a href='' title='en cok toplant� duzenleyenler'>*</a></div>";
$sorgu=mysql_query("select organizator,count(id) as sayi from zirvemax group by organizator order by sayi desc limit 10");
while ($oku=mysql_fetch_array($sorgu)) {
 echo "<tr>
      <td>$say. $oku[organizator] - $oku[sayi]</td>
      <td>";
}
?> 

</table></fieldset>
</fieldset>