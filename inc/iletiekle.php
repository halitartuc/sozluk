<?php
if ($verified_durum == "off" or $verified_durum == "wait")
die("malesef b�yle bir l�kse sahip degilsin.<br><br>
<input type=button class='but' onClick='history.go(-1)' value='hih cok laz�md� sanki'>");


if( strlen($ileti) >30) {
die("iletiniz 30 karakter s�n�rlamas�n� a��yor. bu kabul edilemez <br><br> <input type=button class='but' onClick='history.go(-1)' value='sayg� duyar�m'>");}

$ileti=$_POST['ileti'];

$ileti = ereg_replace("�","s",$ileti);
$ileti = ereg_replace("�","S",$ileti);
$ileti = ereg_replace("�","c",$ileti);
$ileti = ereg_replace("�","C",$ileti);
$ileti = ereg_replace("�","i",$ileti);
$ileti = ereg_replace("�","I",$ileti);
$ileti = ereg_replace("�","g",$ileti);
$ileti = ereg_replace("�","G",$ileti);
$ileti = ereg_replace("�","o",$ileti);
$ileti = ereg_replace("�","O",$ileti);
$ileti = ereg_replace("�","u",$ileti);
$ileti = ereg_replace("�","U",$ileti);
$ileti = ereg_replace("�","O",$ileti);
$ileti = ereg_replace("\,","",$ileti);
$ileti = ereg_replace("  "," ",$ileti);
$ileti = ereg_replace("\?","",$ileti);
$ileti = ereg_replace("\!","",$ileti);
$ileti = ereg_replace("<",")",$ileti);

$ileti= strtolower($ileti);


$sorgu = "UPDATE user SET ileti='$ileti' WHERE nick='$nick'";
mysql_query($sorgu);
echo "say�n $nick; <br>ki�isel iletini '$ileti' olarak belirledin. Ne Mutlu Sana. <br>
<br>
<input type='button' value='eyvallah' onclick='window.close();' class=but>
";
exit;
mysql_close();
?>
