<?
//zirveditle
$detay=htmlspecialchars($_POST['detay']);


/*$detay = ereg_replace("�","s",$detay);
$detay = ereg_replace("�","S",$detay);
$detay = ereg_replace("�","c",$detay);
$detay = ereg_replace("�","C",$detay);
$detay = ereg_replace("�","i",$detay);
$detay = ereg_replace("�","I",$detay);
$detay = ereg_replace("�","g",$detay);
$detay = ereg_replace("�","G",$detay);
$detay = ereg_replace("�","o",$detay);
$detay = ereg_replace("�","O",$detay);
$detay = ereg_replace("�","u",$detay);
$detay = ereg_replace("�","U",$detay);
$detay = ereg_replace("�","O",$detay);*/
$detay = ereg_replace("\,","",$detay);
$detay = ereg_replace("  "," ",$detay);
$detay = ereg_replace("\?","",$detay);
$detay = ereg_replace("\!","",$detay);

$detay= strtolower($ileti);

$sorgu = "UPDATE zirvebox SET detay='$detay' WHERE id='$id'";
mysql_query($sorgu);

if ($sorgu) { echo " s�per bir �ekilde d�zenledim"; } else { echo "d�zenleyemedim moruk bir hata oldu"; }

?>



