<fieldset>
<?php
if (!$verified_user) die("just register yazarlar girebilir lan!");
include "config.php"; 
echo "
<a href='sozluk.php?process=anketgoster'>anketler</a> | <a href='sozluk.php?process=anketstat'>istatistikler</a>
<fieldset><legend>anket a�</legend><br>
<form action='sozluk.php?process=addanket' method='POST'>
anket adi:<br>
<input type='text' name='zirve' size='30'><br>
<table width='290' border='0'>
  <tr>
    <td width='290'>anket sorusu:</td>
	
	 </tr>
	  <tr>
    <td><textarea name='detay' rows='5' cols='10'></textarea></td>
	</table><br>
	<table width='290' border='0'>
  <tr>
    <td width='290'>anket�r�n cevab�:</td>
	
	 </tr>
	  <tr>
    <td><textarea name='tavsiye' rows='5' cols='10'></textarea></td>
	</table><br>
	<input type='submit' value='anket a�!' class='but'>
	</form>
	<div class='copyright'><br>a�t���n�z anketler ''en sevdi�iniz renk'',''en h�zl� araba'',''en b�y�k tak�m'' �eklinde zeka s�n�rlar�m�z� zorlay�p bize efor sarfettirmeyin. ayr�ca anket�r b�l�m�nde yazd�klar�n�z hi� bir �ekilde entry say�n�za ve oy say�n�za etki etmeyecektir.
	.<br>
	".$sitename." anket�r eklentisi</div>
	<br></fieldset>
	
";

?>
</fieldset>