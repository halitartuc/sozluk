<title><? echo $sitename;?> - Avatar Ayarc�k</title>
<fieldset><legend>�eklini Belirt</legend>
<?php $sorgu=mysql_query("select * from user where nick='$nick'");
 $avatar=@mysql_result($sorgu,0,'avatar'); 
 $nick=@mysql_result($sorgu,0,'nick');
 $cinsiyet=@mysql_result($sorgu,0,'cinsiyet');
 
 @mysql_close();
 echo "<center>";
 if (empty($avatar)) {
  if ($cinsiyet =="m"){
  echo"<img src=\"images/avatar/erkek.jpg\" alt=\"$nick - $sitename yazar�\" width=\"$avataryukseklik\"/>";
  }
  if ($cinsiyet =="f"){
  echo"<img src=\"images/avatar/kadin.jpg\" alt=\"$nick - $sitename yazar�\" width=\"$avataryukseklik\"/>";
  }
  if ($cinsiyet =="mf"){
  echo"<img src=\"images/avatar/adamkadin.jpg\" alt=\"$nick - $sitename yazar�\" width=\"$avataryukseklik\"/>";
  }
  if ($cinsiyet =="fm"){
  echo"<img src=\"images/avatar/kadinadam.jpg\" alt=\"$nick - $sitename yazar�\" width=\"$avataryukseklik\"/>";
  }
  echo "<br>";
  }
  else {
  echo"<img src=\"$avatar\" alt=\"$nick - $sitename yazar�\" width=\"$avataryukseklik\"/>";
  echo "<br>"; 
  } 
   echo "</center>";
 echo"evlad�m $nick;<br><br>";
 echo "G�rd���n avatar� de�i�tirmek mi istiyorsun? Se�im senin..<br><font color=\"red\">K�rm�z�</font> hap� se�ersen url girmek zorundas�n..<br><font color=\"blue\">Mavi</font> hap� se�ersen bilgisayar�ndan resim se�ersin..<br>Hangi hap� yutacaks�n gen�? Karar�n� ver.. Yada g�z�m g�rmesin seni..";
 ?>

<br><br><fieldset><legend>K�rm�z� Hap</legend>

<form name="url" action="sozluk.php?process=avatarekle" method="post">
url: <input type="text" name="avatar">
<input class="but" name="url" type="submit" value="evet evet resmim bu adreste eminim">

</form>
</fieldset>

<br><fieldset><legend>Mavi Hap</legend>

<form name="yukle" enctype="multipart/form-data" method="post" action="sozluk.php?process=avatarekle">
 rsm: <input name="avatar" type="file" id="avatar">
  <input class="but" name="yukle" type="submit" id="submit" value="vallaha se�tim. y�kle gitsin"> 

</form>
</fieldset>
<br><fieldset><legend>Siyah Hap</legend>

<form name="sil" enctype="multipart/form-data" method="post" action="sozluk.php?process=avatarekle">
E�er bu butona t�klarsan vallaha avatar�n� sileriz...<br>
  <center><input class="but" name="sil" type="submit" id="submit" value="avatar silen buton"> </center>
</form>
</fieldset>
  <br>
</fieldset>
<div class='copyright' align='right'>(c) <? include "config.php";  echo $sitename;?> </div>