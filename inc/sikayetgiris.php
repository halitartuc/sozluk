<script language="JavaScript">
function cf(f) {
	if (!(/.+\@.+\..+/.test(f.e.value))) {
		f.e.focus();
		alert("girdi�iniz e-mail adresi ge�erli de�il");
		return false;
	}
	if(f.k.value=="") {
		f.k.focus();
		alert("adiniz?");
		return false;
	}
	if(f.m.value=="") {
		f.m.focus();
		alert("mesaj�n�z?");
		return false;
	}
	return true;
}
</script>
<? include "config.php";  ?>
<body>
<LINK href="images/sozluk.css" type=text/css rel=stylesheet>
<center>
<div align="center">
<fieldset><legend><?=$sitename?> ileti�im</legend>
<div width='90%' style='width:90%;' align=justify>
  <p>Merhaba! 
    A�a��da g�rd���n�z formu doldurarak <?=$sitename?> ekibiyle irtibata ge�ebilirsiniz. Size ula�abilmemiz a��s�ndan mail adresinizi do�ru girmenizi �neririz.<b>mesajlariniz yazarlara <i>iletilmemektedir.</i></b> �lginize te�ekkur ederiz.</p>
  <p>    <b>Not: <i>Eger bir entry'yi �ikayet edecekseniz mesaj k�sm�na l�tfen id numaras�n� yaz�n�z.</i></b>
    </p>
</div>
<br /><form method="post" action="sozluk.php?process=sikayetettimgitti" onSubmit="return cf(this);">
<table class="msg" border=0 width="90%" cellspacing=2 cellpadding=2>
<tr>
<td width="30" align="right" nowrap>email adresiniz</td>

<td align="left"><input type="text" name="e" size="50" ></td>
</tr>
<tr>
<td width="30" align="right" nowrap>ad�n�z</td>

<td align="left"><input type="text" name="k" size="50" ></td>
</tr>
<tr>
<td align="right" valign="top">mesaj</td>
<td align="left" valign="top"><textarea name="m" cols="40" rows="10"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td><td align="left"><input type="submit" class="but"  value="gonder"><input type="reset" class="but"  value="sil"></td>
</tr>
</table>
</form>
</fieldset>
</div>
</center>
<script type="text/javascript">var ee=document.getElementById('e');if(ee){ee.focus();}</script>
<hr /><div style="text-align:center;font-size:7pt">

<?=$sitename?>
Burada yaz�lanlar ger�ek ya da de�ildir. Bilinemez. T�m entrylerin sorumluluklar� yazarlar�na aittir.
Copyright by <?=$sitename?> 2009 (c)</a>
</div>  