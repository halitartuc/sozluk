</br>
</br>
<b><font size="3" color="#B7310B" margin: 5px;>hesab�m</font></b>
</br>
</br>
<?
if (!$verified_user) die("just register yazarlar girebilir lan!");
?>
<?php
//include("baglan.php");
//$sql=mysql_query("select * from user where nick='$verified_user'");
//while ($record = mysql_fetch_object($sql)) {
?>
<script  type="text/javascript" src="images/dinamikresim.js"></script>

<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
                    <TD class=tab>
            
            <TD class=tabsel>hesap bilgilerim</TD>

          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>


<td class="tabin">
<?

if ($ucur) {
$sorgu = "SELECT yazar,id FROM mesajciklar WHERE `id` = '$ucur' and yazar = '$verified_user'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$id=$kayit["id"];
$sorgu = "DELETE FROM mesajciklar WHERE id = '$id' LIMIT 1";
mysql_query($sorgu);
echo "<div class=dash><center><b>(#$id) entry'iniz sistemden u�uruldu.</div>";
die;
}
}
}

if (!$oks) {
$sorgu = "SELECT nick,email FROM user WHERE `nick`='$verified_user'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kay�tlar� listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$email=$kayit["email"];
} //while
} // if
}
else {
// degiskenleri ata
if ($yemail == "") {
echo "l�tfen mail adresinizi yaz�n�z.";
exit;
}

$yemail =@$_POST["yemail"];
$ileti =@$_POST["ileti"];

$site = $_SERVER["HTTP_REFERER"];
$site = explode("/", $site);
$site = $site[2];


$nick = $verified_user;
/*$yemail = ereg_replace("�","s",$yemail);
$yemail = ereg_replace("�","S",$yemail);
$yemail = ereg_replace("�","c",$yemail);
$yemail = ereg_replace("�","C",$yemail);
$yemail = ereg_replace("�","i",$yemail);
$yemail = ereg_replace("�","I",$yemail);
$yemail = ereg_replace("�","g",$yemail);
$yemail = ereg_replace("�","G",$yemail);
$yemail = ereg_replace("�","o",$yemail);
$yemail = ereg_replace("�","O",$yemail);
$yemail = ereg_replace("�","u",$yemail);
$yemail = ereg_replace("�","U",$yemail);
$yemail = ereg_replace("�","O",$yemail);*/



$sorgu = "SELECT nick,email FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kay�tlar� listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$nick=$kayit["nick"];
$email=$kayit["email"];
$sorgu = "UPDATE user SET email='$yemail' WHERE nick='$nick'";
mysql_query($sorgu);
echo "email adresin bilinmeyen sebeplerden dolayi (?) <b>$yemail</b> olarak de�i�tirildi.";
exit;
}
}
}
?>
<body>

<div class=div1>

<center><?
 $sorgu=mysql_query("select * from user where nick='$nick'");
 $nick=@mysql_result($sorgu,0,'nick');
 $avatar=@mysql_result($sorgu,0,'avatar');
 $cinsiyet=@mysql_result($sorgu,0,'cinsiyet');
 

  echo " ";
  ?></center>
<table width="500" border="0">
  <tr>
    <td>
    <form action="sozluk.php?process=passwd" method="post">
<table  class=dash vAlign=top width="376" border="0">

  <tr class=dash vAlign=top>
    <td width="144">eski �ifreniz</br><input name="esifre" type="password" id="esifre" class=inp></td>
  </tr>
  <tr>
    <td>yeni �ifreniz</br><input name="ysifre" type="password" id="ysifre" class=inp></td>
  </tr>
  <tr>
    <td>tekrar �ifre</br><input name="ysifre2" type="password" id="ysifre2" class=inp></td>
  </tr>
  <tr>
    <input type=hidden name=okpasswd value=ok>
    <td><input type="submit" name="Submit" value="kaydet" class=but></td>
  </tr>
</table>
</form>

 <form action="" method="post">
<table width="376" border="0" class=dash vAlign=top>
  <tr>

    <td>yeni mail </br><input name="yemail" type="text" id="yemail" placeholder="<? echo "$email"; ?>" class=inp></td>
  </tr>
  <tr>
    <input type=hidden name=oks value=ok>
    <td><input type="submit" name="Submit" value="degistir" class=but></td>
  </tr>
  <tr>

  </tr>

</table>
</form>





</div>

    </td>

  </tr>

  

</table>




<?
$sorgu = "SELECT * FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){

while ($kayit=mysql_fetch_array($sorgulama)){
$nick=$kayit["nick"];
$sehir=$kayit["sehir"];
$isim=$kayit["isim"];
$bolum=$kayit["bolum"];
}
}

 echo " ad�n�z soyad�n�z </br> <form action='sozluk.php?process=isimguncelle' method='post'><input type='text' name='isim' placeholder='$isim'></br><input type='submit' value='g�ncelle' class='but'></form><br>
  
bulundu�unuz yer  
 <form action='sozluk.php?process=sehirguncelle' method='post'> <SELECT name=sehir id='sehir' class='ksel'>
	  	<option value='' ></option>
		<option value='�stanbul' >�stanbul
		<option value='�zmir' >�zmir
		<option value='Ankara' >Ankara
		<option value='Adana' >Adana
		<option value='Ad�yaman' >Ad�yaman
		<option value='Afyon' >Afyon
		<option value='Aksaray' >Aksaray
		<option value='Amasya' >Amasya
		<option value='Antalya' >Antalya
		<option value='Ardahan' >Ardahan
		<option value='Artvin' >Artvin
		<option value='Ayd�n' >Ayd�n
		<option value='A�r�' >A�r�
		<option value='Bal�kesir' >Bal�kesir
		<option value='Bart�n' >Bart�n
		<option value='Batman' >Batman
		<option value='Bayburt' >Bayburt
		<option value='Bilecik' >Bilecik
		<option value='Bing�l' >Bing�l
		<option value='Bitlis' >Bitlis
		<option value='Bolu' >Bolu
		<option value='Burdur' >Burdur
		<option value='Bursa' >Bursa
		<option value='�anakkale' >�anakkale
		<option value='�ank�r�' >�ank�r�
		<option value='�orum' >�orum
		<option value='Denizli' >Denizli
		<option value='Diyarbak�r' >Diyarbak�r
		<option value='D�zce' >D�zce
		<option value='Edirne' >Edirne
		<option value='Elaz��' >Elaz��
		<option value='Erzincan' >Erzincan
		<option value='Erzurum' >Erzurum
		<option value='Eski�ehir' >Eski�ehir
		<option value='Gaziantep' >Gaziantep
		<option value='Giresun' >Giresun
		<option value='G�m��hane' >G�m��hane
		<option value='Hakkari' >Hakkari
		<option value='Hatay' >Hatay
		<option value='I�d�r' >I�d�r
		<option value='�sparta' >�sparta
		<option value='Kahramanmara�' >Kahramanmara�
		<option value='Karab�k' >Karab�k
		<option value='Karaman' >Karaman
		<option value='Kars' >Kars
		<option value='Kastamonu' >Kastamonu
		<option value='Kayseri' >Kayseri
		<option value='K�rklareli' >K�rklareli
		<option value='Kilis' >Kilis
		<option value='Kocaeli' >Kocaeli
		<option value='Konya' >Konya
		<option value='K�tahya' >K�tahya
		<option value='K�r�kkale' >K�r�kkale
		<option value='K�r�ehir' >K�r�ehir
		<option value='Malatya' >Malatya
		<option value='Manisa' >Manisa
		<option value='Mardin' >Mardin
		<option value='Mersin' >Mersin
		<option value='Mu�la' >Mu�la
		<option value='Mu�' >Mu�
		<option value='Nev�ehir' >Nev�ehir
		<option value='Ni�de' >Ni�de
		<option value='Ordu' >Ordu
		<option value='Osmaniye' >Osmaniye
		<option value='Rize' >Rize
		<option value='Sakarya' >Sakarya
		<option value='Samsun' >Samsun
		<option value='Siirt' >Siirt
		<option value='Sinop' >Sinop
		<option value='Sivas' >Sivas
		<option value='�anl�urfa' >�anl�urfa
		<option value='��rnak' >��rnak
		<option value='Tekirda�' >Tekirda�
		<option value='Tokat' >Tokat
		<option value='Trabzon' >Trabzon
		<option value='Tunceli' >Tunceli
		<option value='U�ak' >U�ak
		<option value='Van' >Van
		<option value='Yalova' >Yalova
		<option value='Yozgat' >Yozgat
		<option value='Zonguldak' >Zonguldak
		<option value='Yurtd���' >Yurtd���</option>
			</select></br><input type='submit' value='g�ncelle' class='but'>
 </form>


 ";
 $tarih = date("Y-m-d");
 echo "</br></br><a href=\"javascript:od('sozluk.php?process=ilet',500,300)\">(kisisel ileti girin)</a><br> ";
 ?>
<br>


</div>
<p>&nbsp;</p>
</body>