<br>
<br>
<fieldset><legend>Ki�isel �letini Gir</legend>
<form action="sozluk.php?process=iletiekle" method="post">
<input type="text" name="ileti">
<input class="but" type="submit" value="gonder">

</form>
<br>
<?php $sorgu=mysql_query("select ileti from user where nick='nick'");
 $ileti=@mysql_result($sorgu,0,'ileti');
 echo "Kulland���n�z �leti: '$ileti'";?>
<br><small>
<i>i. �leti 30 karakterden uzun olmamal�</i><br>
<i>ii.Siyasi vb. i�erikli iletiler koymay�n.</i><br>
<i>Ya da bunlara uymay�n iletiniz silinsin</i></small>
</fieldset>