<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>
<?

if ($verified_kat="admin") {
echo " <a href=\"javascript:if(confirm('t�m �zel mesajlar� siliyorsun son karar�n mi?'))location.href='sozluk.php?process=adm&islem=sildb'\"> silmek i�in bas gaza </a></td>";
}
echo "<br> <font color='red'><i>��kan uyar�ya tamam dersen t�m kullanicilarin �zel mesajlar� silinecek</i></font><br><br><br>";

if ($verified_kat="admin") {
echo "<a href='sozluk.php?process=tebrikmail'>Dokunma Bile Buna</a>"; }
?>