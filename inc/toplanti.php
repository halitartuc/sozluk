<fieldset>
<?php
if (!$verified_user) die("just register yazarlar girebilir lan!");
include "config.php"; 
echo "
<a href='sozluk.php?process=toplantigoster'>toplant�lar</a> | <a href='sozluk.php?process=toplantistat'>istatistikler</a> | <a target='window' href='$site/galeri' title='zirve resimleri'>toplant� galeri</a>
<fieldset><legend>toplanti d�zenle</legend><br>
<form action='sozluk.php?process=addtoplanti' method='POST'>
toplant� ad�:<br>
<input type='text' name='zirve' size='30'><br>
sehir neresi<br>
<SELECT name='sehir' class='Input' >
          <OPTION value='SANAL ALEM' selected >SANAL ALEM</OPTION>
          <OPTION value='ADANA'>ADANA</OPTION>
          <OPTION value='ADIYAMAN'>ADIYAMAN</OPTION>
          <OPTION value='AFYON'>AFYON</OPTION>
          <OPTION value='AGRI'>AGRI</OPTION>
          <OPTION value='AKSARAY'>AKSARAY</OPTION>
          <OPTION value='AMASYA'>AMASYA</OPTION>
          <OPTION value='ANKARA'>ANKARA</OPTION>
          <OPTION value='ANTALYA'>ANTALYA</OPTION>
          <OPTION value='ARDAHAN'>ARDAHAN</OPTION>
          <OPTION value='ARTVIN'>ARTVIN</OPTION>
          <OPTION value='AYDIN'>AYDIN</OPTION>
          <OPTION value='BALIKESIR'>BALIKESIR</OPTION>
          <OPTION value='BARTIN'>BARTIN</OPTION>
          <OPTION value='BATMAN'>BATMAN</OPTION>
          <OPTION value='BAYBURT'>BAYBURT</OPTION>
          <OPTION value='BILECIK'>BILECIK</OPTION>
          <OPTION value='BING�L'>BING�L</OPTION>
          <OPTION value='BITLIS'>BITLIS</OPTION>
          <OPTION value='BOLU'>BOLU</OPTION>
          <OPTION value='BURDUR'>BURDUR</OPTION>
          <OPTION value='BURSA'>BURSA</OPTION>
          <OPTION value='�ANAKKALE'>�ANAKKALE</OPTION>
          <OPTION value='�ANKIRI'>�ANKIRI</OPTION>
          <OPTION value='�ORUM'>�ORUM</OPTION>
          <OPTION value='DENIZLI'>DENIZLI</OPTION>
          <OPTION value='DIYARBAKIR'>DIYARBAKIR</OPTION>
          <OPTION value='D�ZCE'>D�ZCE</OPTION>
          <OPTION value='EDIRNE'>EDIRNE</OPTION>
          <OPTION value='ELAZIG'>ELAZIG</OPTION>
          <OPTION value='ERZINCAN'>ERZINCAN</OPTION>
          <OPTION value='ERZURUM'>ERZURUM</OPTION>
          <OPTION value='ESKISEHIR'>ESKISEHIR</OPTION>
          <OPTION value='GAZIANTEP'>GAZIANTEP</OPTION>
          <OPTION value='GIRESUN'>GIRESUN</OPTION>
          <OPTION value='G�M�SHANE'>G�M�SHANE</OPTION>
          <OPTION value='HAKKARI'>HAKKARI</OPTION>
          <OPTION value='HATAY' >HATAY</OPTION>
          <OPTION value='IGDIR'>IGDIR</OPTION>
          <OPTION value='ISPARTA'>ISPARTA</OPTION>
          <OPTION value='I�EL'>I�EL</OPTION>
          <OPTION value='ISTANBUL'>ISTANBUL</OPTION>
          <OPTION value='IZMIR'>IZMIR</OPTION>
          <OPTION value='KAHRAMANMARAS'>KAHRAMANMARAS</OPTION>
          <OPTION value='KARAB�K'>KARAB�K</OPTION>
          <OPTION value='KARAMAN'>KARAMAN</OPTION>
          <OPTION value='KARS'>KARS</OPTION>
          <OPTION value='KASTAMONU'>KASTAMONU</OPTION>
          <OPTION value='KAYSERI'>KAYSERI</OPTION>
          <OPTION value='KIBRIS'>KIBRIS</OPTION>
          <OPTION value='KIRIKKALE'>KIRIKKALE</OPTION>
          <OPTION value='KIRKLARELI'>KIRKLARELI</OPTION>
          <OPTION value='KIRSEHIR'>KIRSEHIR</OPTION>
          <OPTION value='KILIS'>KILIS</OPTION>
          <OPTION value='KOCAELI'>KOCAELI</OPTION>
          <OPTION value='KONYA'>KONYA</OPTION>
          <OPTION value='K�TAHYA'>K�TAHYA</OPTION>
          <OPTION value='MALATYA'>MALATYA</OPTION>
          <OPTION value='MANISA'>MANISA</OPTION>
          <OPTION value='MARDIN'>MARDIN</OPTION>
          <OPTION value='MUGLA'>MUGLA</OPTION>
          <OPTION value='MUS'>MUS</OPTION>
          <OPTION value='NEVSEHIR'>NEVSEHIR</OPTION>
          <OPTION value='NIGDE'>NIGDE</OPTION>
          <OPTION value='ORDU'>ORDU</OPTION>
          <OPTION value='OSMANIYE'>OSMANIYE</OPTION>
          <OPTION value='RIZE'>RIZE</OPTION>
          <OPTION value='SAKARYA'>SAKARYA</OPTION>
          <OPTION value='SAMSUN'>SAMSUN</OPTION>
          <OPTION value='SIIRT'>SIIRT</OPTION>
          <OPTION value='SINOP'>SINOP</OPTION>
          <OPTION value='SIVAS'>SIVAS</OPTION>
          <OPTION value='SANLIURFA'>SANLIURFA</OPTION>
          <OPTION value='SIRNAK'>SIRNAK</OPTION>
          <OPTION value='TEKIRDAG'>TEKIRDAG</OPTION>
          <OPTION value='TOKAT'>TOKAT</OPTION>
          <OPTION value='TRABZON'>TRABZON</OPTION>
          <OPTION value='TUNCELI'>TUNCELI</OPTION>
          <OPTION value='USAK'>USAK</OPTION>
          <OPTION value='VAN'>VAN</OPTION>
          <OPTION value='YALOVA'>YALOVA</OPTION>
          <OPTION value='YOZGAT'>YOZGAT</OPTION>
          <OPTION value='ZONGULDAK'>ZONGULDAK</OPTION>
		  </SELECT><br>
		  toplanti tarihi<br>
<input type='text' name='tarih' size='30'> <i>�rn: 31.31.2031</i><br>
mekan:<br>
<input type='text' name='yer' size='30'> <i>�rn: cemalettinlerin kafe</i><br>
<table width='290' border='0'>
  <tr>
    <td width='290'>detay:</td>
	
	 </tr>
	  <tr>
    <td><textarea name='detay' rows='5' cols='10'></textarea></td>
	</table><br>
	<table width='290' border='0'>
  <tr>
    <td width='290'>tavsiye: (organizatorun tavsiyeleri)</td>
	
	 </tr>
	  <tr>
    <td><textarea name='tavsiye' rows='5' cols='10'></textarea></td>
	</table><br>
	<input type='submit' value='ayarla' class='but'>
	</form>
	<div class='copyright'><br>toplantiler organizator ve ''hadiii toplanti yapsanizaaa'' diyenlerin sorumlulu�undad�r, $sitename ekibinin bu konudan dolay� ba��n� a�r�tacak her sey ''ben mi dedim toplanin diye, biz topluya karsiz zaten!?'' diyerek ba�tan at�l�r. ayr�ca uludagda kar topu oynayal�m i�ine tas koyup saka yapal�m gibi atraksiyonlara girerseniz sizi tan�m�yoruz, aksine ba�l�k a��p alt�na geyik d�s�yoruz..
	<br>
	$sitename  Toplant� Eklentisi</div>
	<br></fieldset>
	
";

?>
</fieldset>