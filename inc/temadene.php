<?

$sorgutema=mysql_query("select * from temalar order by id desc");
$kactema=@mysql_num_rows($sorgutema);
echo "<div>Toplam $kactema adet tema bulunmaktad�r. Se� be�endi�in birini i�te...</div>";
while ($oku=mysql_fetch_array($sorgutema)) {


?>
<table width="20%" border="1">
 <tr>
  <td width="20%"><?=$oku[tema]?></td>
  <td width="10%"><a href="sozluk.php?process=cp&tema=<?=$oku[tema]?>">Sec</a></td>
  <td width="10%"><a href="falanfilan">bak</a></td>
 </tr>
</table>


<?
}
?> 
