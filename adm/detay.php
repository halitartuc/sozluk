<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>

<? if ($_GET['id']) {
?>
<table width="580" border="1">
  <tr>
    <td width="290"><strong>Zirve Detaylar�</strong></td>
    <td width="290"><strong>Kat�lanlar</strong><small><i> (Ortam D�sk�n� Yazarlar)</i></small></td>
	
  </tr>
<?


$sorgu=mysql_query("SELECT yazar,zirve,detay,id FROM zirvebox where id=`$id`");
$kayit=mysql_fetch_array($sorgu);
/////////
$detay=$kayit["detay"];

echo "
  <tr>
    <td>$detay</a></td>
    <td>$katilan</td>
	</tr>";
    }
	echo "</table>";
	?>