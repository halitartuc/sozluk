<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>
<?

$sql = mysql_query("Delete from sikayet"); 

if ($sql) {
	echo "tamam� silindi";

}
else {
	echo "bir �ey oldu anlayamad�m, silemedim, yapamad�m";
}
?>