<?

//burada zirveci bilgileri kaydedilecek

$muzik=$_POST['muzik'];
$film=$_POST['film'];
$ruh=$_POST['ruh'];
$mekan=$_POST['mekan'];
$tanim=$_POST['tanim'];


##film
$film = ereg_replace("�","�",$film);
$film = ereg_replace("�","�",$film);
$film = ereg_replace("�","i",$film);
$film = ereg_replace("�","�",$film);
$film = ereg_replace("�","�",$film);
$film = ereg_replace("�","�",$film);
$film = ereg_replace("�","O",$film);
$film = ereg_replace("�","c",$film);
$film = ereg_replace("�","C",$film);
$film = ereg_replace("�","i",$film);
$film = ereg_replace("�","u",$film);
$film = ereg_replace("�","U",$film);
$film = ereg_replace("�","g",$film);
$film = strtolower($film);
##mekan
$mekan = ereg_replace("�","�",$mekan);
$mekan= ereg_replace("�","�",$mekan);
$mekan = ereg_replace("�","i",$mekan);
$mekan = ereg_replace("�","�",$mekan);
$mekan = ereg_replace("�","�",$mekan);
$mekan = ereg_replace("�","�",$mekan);
$mekan = ereg_replace("�","O",$mekan);
$mekan = ereg_replace("�","c",$mekan);
$mekan = ereg_replace("�","C",$mekan);
$mekan = ereg_replace("�","i",$mekan);
$mekan = ereg_replace("�","u",$mekan);
$mekan = ereg_replace("�","U",$mekan);
$mekan = ereg_replace("�","g",$mekan);
$mekan = strtolower($mekan);
##tanim
$tanim = ereg_replace("�","�",$tanim);
$tanim = ereg_replace("�","�",$tanim);
$tanim = ereg_replace("�","i",$tanim);
$tanim = ereg_replace("�","�",$tanim);
$tanim = ereg_replace("�","�",$tanim);
$tanim = ereg_replace("�","�",$tanim);
$tanim = ereg_replace("�","O",$tanim);
$tanim = ereg_replace("�","c",$tanim);
$tanim = ereg_replace("�","C",$tanim);
$tanim = ereg_replace("�","i",$tanim);
$tanim = ereg_replace("�","u",$tanim);
$tanim = ereg_replace("�","U",$tanim);
$tanim = ereg_replace("�","g",$tanim);
$tanim = strtolower($tanim);

$film = ereg_replace("<","(",$film);
$mekan = ereg_replace(">",")",$mekan);
$tanim = ereg_replace(">",")",$tanim);
$tanim = ereg_replace("\n","<br>",$tanim);

if (strlen($tanim)>200) { die ("egoist misin sen? 200 harf kullanarak anlat kendini.");}
if (strlen($film)>100) { die ("filmi anlatma ismini yaz. bu uzunlukta film ad� m� olur lan?");}
if (strlen($tanim)>100) { die ("mekan�n adresini sormadik, adini sorduk. bu uzunlukta mekan ad� m� olur? birisi sorunca ne diyorsan onu yaz...");}

$sorgu = "INSERT INTO zirveuser ";
$sorgu .= "(zuser,muzik,film,ruh,mekan,tanim)";
$sorgu .= " VALUES ";
$sorgu .= "('$verified_user','$muzik','$film','$ruh','$mekan','$tanim')";
mysql_query($sorgu);

if ($sorgu) {
	echo "toplant�c� kayd�n yap�ld�. sosyalle�me yanl�s� insan seni.";
}
else {
	echo "Anam! bir sey oldu ben de anlamad�m. mediterranean e haber ver en iyisi...";
}

?>