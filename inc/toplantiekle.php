<?
include "config.php";
if (!$verified_user) {
die("sen bi git cay koy bir zahmet"); }
if ($verified_durum == "off" or $verified_durum == "wait")
die("malesef yazarl���n�z onaylanana kadar bu fasilitelerden yararlanam�yorsunuz.");
echo "
<fieldset><legend><i>Zirvecinin El Kitab�</i></legend>
<b>i.</b> Zirve'nin net tarihini ve yerini belirt.<br>
<b>ii. </b>Olusabilecek herhangi bir aksilikte(edit, iptal durumlar� vs.) herhangi bir y�neticiye haber ver.<br>
<b>iii. </b>Zirve hakk�nda bilinmesi gereken detaylar�, a��klamaya ekle.<br>
<b>iv. </b>�ayet bir msn zirvesi ise �ehirler b�l�m�nden \"sanal alem\" se�ene�ini kullan.<br><br>
<td align='left'><i>- $sitename -</i></td><br><br>";
 ?>
 </fieldset>
<?
// rdzklng insaat 4-2007
if ($_POST['ok'])  {

if ($zirve =="" || $sehir =="" || $detay=="") {
die("bos yer b�rakt�n"); }

$zirve =@$_POST["zirve"];
$sehir =@$_POST["sehir"];
$detay =@$_POST["detay"];


$zirve = ereg_replace(">","<br>",$zirve);
$zirve = ereg_replace("�","c",$zirve);
$zirve = ereg_replace("�","g",$zirve);
$zirve = ereg_replace("�","i",$zirve);
$zirve = ereg_replace("�","o",$zirve);
$zirve = ereg_replace("�","u",$zirve);
$sehir = ereg_replace(">","<br>",$sehir);
$detay = ereg_replace(">","<br>",$detay);


$tarih = date("Y-m-d/H:i");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("G:i");

$sorgu = "INSERT INTO zirvebox ";
$sorgu .= "(detay,zirve,sehir,yazar,tarih,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$detay','$zirve','$sehir','$verified_user','$tarih','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);
echo "$zirve eklendi<br><br>
<a href='sozluk.php?process=rand'>S�zl�ge Geri D�n</a>"
;
}
else {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Zirve Ekle</title>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>
</head>

<body>
<form METHOD=post action>
<fieldset><legend>Ortama Ak<legend>
<center>
<strong>Zirveye Se�ti�in �sim:</strong><br>
<input type="text" name="zirve" size="30"><br>
<strong>Zirve �ehrini Se�iniz:</strong><br>
<SELECT name="sehir" class="Input" >
          <OPTION value="SANAL ALEM">SANAL ALEM</OPTION>
          <OPTION value="ADANA">ADANA</OPTION>
          <OPTION value="ADIYAMAN">ADIYAMAN</OPTION>
          <OPTION value="AFYON">AFYON</OPTION>
          <OPTION value="A�RI">A�RI</OPTION>
          <OPTION value="AKSARAY">AKSARAY</OPTION>
          <OPTION value="AMASYA">AMASYA</OPTION>
          <OPTION value="ANKARA">ANKARA</OPTION>
          <OPTION value="ANTALYA">ANTALYA</OPTION>
          <OPTION value="ARDAHAN">ARDAHAN</OPTION>
          <OPTION value="ARTV�N">ARTV�N</OPTION>
          <OPTION value="AYDIN">AYDIN</OPTION>
          <OPTION value="BALIKES�R">BALIKES�R</OPTION>
          <OPTION value="BARTIN">BARTIN</OPTION>
          <OPTION value="BATMAN">BATMAN</OPTION>
          <OPTION value="BAYBURT">BAYBURT</OPTION>
          <OPTION value="B�LEC�K">B�LEC�K</OPTION>
          <OPTION value="B�NG�L">B�NG�L</OPTION>
          <OPTION value="B�TL�S">B�TL�S</OPTION>
          <OPTION value="BOLU">BOLU</OPTION>
          <OPTION value="BURDUR">BURDUR</OPTION>
          <OPTION value="BURSA">BURSA</OPTION>
          <OPTION value="�ANAKKALE">�ANAKKALE</OPTION>
          <OPTION value="�ANKIRI">�ANKIRI</OPTION>
          <OPTION value="�ORUM">�ORUM</OPTION>
          <OPTION value="DEN�ZL�">DEN�ZL�</OPTION>
          <OPTION value="D�YARBAKIR">D�YARBAKIR</OPTION>
          <OPTION value="D�ZCE">D�ZCE</OPTION>
          <OPTION value="ED�RNE">ED�RNE</OPTION>
          <OPTION value="ELAZI�">ELAZI�</OPTION>
          <OPTION value="ERZ�NCAN">ERZ�NCAN</OPTION>
          <OPTION value="ERZURUM">ERZURUM</OPTION>
          <OPTION value="ESK��EH�R">ESK��EH�R</OPTION>
          <OPTION value="GAZ�ANTEP">GAZ�ANTEP</OPTION>
          <OPTION value="G�RESUN">G�RESUN</OPTION>
          <OPTION value="G�M��HANE">G�M��HANE</OPTION>
          <OPTION value="HAKKAR�">HAKKAR�</OPTION>
          <OPTION value="HATAY" >HATAY</OPTION>
          <OPTION value="I�DIR">I�DIR</OPTION>
          <OPTION value="ISPARTA">ISPARTA</OPTION>
          <OPTION value="��EL">��EL</OPTION>
          <OPTION value="�STANBUL">�STANBUL</OPTION>
          <OPTION value="�ZM�R">�ZM�R</OPTION>
          <OPTION value="KAHRAMANMARA�">KAHRAMANMARA�</OPTION>
          <OPTION value="KARAB�K">KARAB�K</OPTION>
          <OPTION value="KARAMAN">KARAMAN</OPTION>
          <OPTION value="KARS">KARS</OPTION>
          <OPTION value="KASTAMONU">KASTAMONU</OPTION>
          <OPTION value="KAYSER�">KAYSER�</OPTION>
          <OPTION value="KIBRIS">KIBRIS</OPTION>
          <OPTION value="KIRIKKALE">KIRIKKALE</OPTION>
          <OPTION value="KIRKLAREL�">KIRKLAREL�</OPTION>
          <OPTION value="KIR�EH�R">KIR�EH�R</OPTION>
          <OPTION value="K�L�S">K�L�S</OPTION>
          <OPTION value="KOCAEL�">KOCAEL�</OPTION>
          <OPTION value="KONYA">KONYA</OPTION>
          <OPTION value="K�TAHYA" selected >K�TAHYA</OPTION>
          <OPTION value="MALATYA">MALATYA</OPTION>
          <OPTION value="MAN�SA">MAN�SA</OPTION>
          <OPTION value="MARD�N">MARD�N</OPTION>
          <OPTION value="MU�LA">MU�LA</OPTION>
          <OPTION value="MU�">MU�</OPTION>
          <OPTION value="NEV�EH�R">NEV�EH�R</OPTION>
          <OPTION value="N��DE">N��DE</OPTION>
          <OPTION value="ORDU">ORDU</OPTION>
          <OPTION value="OSMAN�YE">OSMAN�YE</OPTION>
          <OPTION value="R�ZE">R�ZE</OPTION>
          <OPTION value="SAKARYA">SAKARYA</OPTION>
          <OPTION value="SAMSUN">SAMSUN</OPTION>
          <OPTION value="S��RT">S��RT</OPTION>
          <OPTION value="S�NOP">S�NOP</OPTION>
          <OPTION value="S�VAS">S�VAS</OPTION>
          <OPTION value="�ANLIURFA">�ANLIURFA</OPTION>
          <OPTION value="�IRNAK">�IRNAK</OPTION>
          <OPTION value="TEK�RDA�">TEK�RDA�</OPTION>
          <OPTION value="TOKAT">TOKAT</OPTION>
          <OPTION value="TRABZON">TRABZON</OPTION>
          <OPTION value="TUNCEL�">TUNCEL�</OPTION>
          <OPTION value="U�AK">U�AK</OPTION>
          <OPTION value="VAN">VAN</OPTION>
          <OPTION value="YALOVA">YALOVA</OPTION>
          <OPTION value="YOZGAT">YOZGAT</OPTION>
          <OPTION value="ZONGULDAK">ZONGULDAK</OPTION>
        </SELECT> <br>
		<strong>Detay:</strong><br>
		<textarea name="detay" rows=3 cols=10 wrap="off"></textarea><br>
		
		<br>
		<div align="left"><input type="submit" value="ortam budur" class="but" name="ok"></div><br>
		 
		
</fieldset>
<div class='copyright' align='center'>Ak�ll� uslu zirveler d�zenle. Co�up "hey hakkari'de kartopu oynuyoruz zirvesi" gibi atraksiyonlara girme. g�zel g�zel oyna. Organizasyonlar organizat�r�n sorumlulu�u alt�ndad�r.
Olas� herhangi ters bir durumda dpu sozluk ltd sti hicbir mesuliyet kabul etmez. bilakis kahkaha ile g�ler.</div>
<br>
<br>
<div class='copyright' align='center'>2009 (C) <?=$sitename?></div>

</form>
</body>
</html>
<? } ?>
