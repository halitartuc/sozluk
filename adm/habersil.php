<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>
<?
if ($haber != 1) {
echo "Bu i�lem i�in gerekli yetkiye sahip de�ilsiniz";
die;
}
$sorgu = "DELETE FROM haberler WHERE id = '$id' LIMIT 1";
mysql_query($sorgu);
echo "($id) haber silindi";
?>