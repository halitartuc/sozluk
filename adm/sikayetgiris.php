<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>

<body>
<LINK href="www.naletlendik.com/images/sozluk.css" type=text/css rel=stylesheet>
<center>
<div align="center">
<fieldset><legend><?=$sitename?> �leti�im!</legend>
<div width='90%' style='width:90%;' align=justify>merhaba! 
a�a��da g�rd���n�z formu doldurarak s�zl�k ekibiyle ileti�ime ge�ebilirsiniz. <b>Mesajlar�n�z yazarlara iletilmemektedir.</b><br>
<i>�ikayet etmek istedi�iniz entry'nin numaras�n� mesaj b�l�m�nde belirtiniz</i>
</div>
<br /><form method="post" action="sozluk.php?process=sikayet" onSubmit="return cf(this);">
<table class="msg" border=0 width="90%" cellspacing=3 cellpadding=3>
<tr>
<td width="30" align="right" nowrap>email&nbsp;adresiniz</td>

<td align="left"><input type="text" name="e" size="50" ></td>
</tr>
<tr>
<tr>
<td width="30" align="right" nowrap>kullanici adiniz</td>

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
</a>
</div>

