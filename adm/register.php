<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($oluler != 1) {
echo "Bu i�lem i�in gerekli yetkiye sahip de�ilsiniz";
die;
}
$ip = getenv('REMOTE_ADDR');
if ($nick and $email) { // basla

// degiskenleri ata
$nick =@$_POST["nick"];
if ($nick == "" or $email == "" or $day == "" or $month == "" or $year == "" or $cinsiyet == "" or $sehir == "") {
echo "
Heryeri doldur can�m..";
exit;
}

if (!ereg ("^[' A-Za-z0-9]+$", $nick)) {
echo "Nickinizde;<br>sadece k���k ve ingilizce harfler,<br>bo�luk {space},<br>ve rakamlar bulunabilir.<br>L�tfen bu kurallara uygun bir nick yaz�n.";
die;
}

if (!eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $email)) {
die ("E-Mail Adresiniz Ge�ersiz");
}

$sorgu = "SELECT email FROM user WHERE `email` = '$email'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)){
$email=$kayit["email"];
echo "Belirtti�iniz e-mail adresi zaten sistemde kay�tl�.";
die;
}

$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$reg=$kayit2["reg"];
if ($reg == "off") {
$sifre =@$_POST["sifre"];
$sifre2 =@$_POST["sifre2"];
if (!$sifre or !$sifre2) {
echo "�ifre yaz hocam..";
exit;
}
if ($sifre != $sifre2) {
echo "Alti �st� �ifreyi 2 yere birden yaz�can onuda beceremiyosun.. Gen�li�ine yaz�k hocam..";
exit;
}

}

$isim =@$_POST["isim"];
$nick =@$_POST["nick"];
$email =@$_POST["email"];
$day =@$_POST["day"];
$month =@$_POST["month"];
$year =@$_POST["year"];
$cinsiyet =@$_POST["cinsiyet"];
$sehir =@$_POST["sehir"];

/*$nick = ereg_replace("�","s",$nick);
$nick = ereg_replace("�","S",$nick);
$nick = ereg_replace("�","c",$nick);
$nick = ereg_replace("�","C",$nick);
$nick = ereg_replace("�","i",$nick);
$nick = ereg_replace("�","I",$nick);
$nick = ereg_replace("�","g",$nick);
$nick = ereg_replace("�","G",$nick);
$nick = ereg_replace("�","o",$nick);
$nick = ereg_replace("�","O",$nick);
$nick = ereg_replace("�","u",$nick);
$nick = ereg_replace("�","U",$nick);
$nick = ereg_replace("�","O",$nick);

$email = ereg_replace("�","s",$email);
$email = ereg_replace("�","S",$email);
$email = ereg_replace("�","c",$email);
$email = ereg_replace("�","C",$email);
$email = ereg_replace("�","i",$email);
$email = ereg_replace("�","I",$email);
$email = ereg_replace("�","g",$email);
$email = ereg_replace("�","G",$email);
$email = ereg_replace("�","o",$email);
$email = ereg_replace("�","O",$email);
$email = ereg_replace("�","u",$email);
$email = ereg_replace("�","U",$email);
$email = ereg_replace("�","O",$email);


$sehir = ereg_replace("�","s",$sehir);
$sehir = ereg_replace("�","S",$sehir);
$sehir = ereg_replace("�","c",$sehir);
$sehir = ereg_replace("�","C",$sehir);
$sehir = ereg_replace("�","i",$sehir);
$sehir = ereg_replace("�","I",$sehir);
$sehir = ereg_replace("�","g",$sehir);
$sehir = ereg_replace("�","G",$sehir);
$sehir = ereg_replace("�","o",$sehir);
$sehir = ereg_replace("�","O",$sehir);
$sehir = ereg_replace("�","u",$sehir);
$sehir = ereg_replace("�","U",$sehir);
$sehir = ereg_replace("�","O",$sehir);


$isim = ereg_replace("�","s",$isim);
$isim = ereg_replace("�","S",$isim);
$isim = ereg_replace("�","c",$isim);
$isim = ereg_replace("�","C",$isim);
$isim = ereg_replace("�","i",$isim);
$isim = ereg_replace("�","I",$isim);
$isim = ereg_replace("�","g",$isim);
$isim = ereg_replace("�","G",$isim);
$isim = ereg_replace("�","o",$isim);
$isim = ereg_replace("�","O",$isim);
$isim = ereg_replace("�","u",$isim);
$isim = ereg_replace("�","U",$isim);
$isim = ereg_replace("�","O",$isim);*/

$nick = strtolower($nick);
$email = strtolower($email);

$sorgu = "SELECT nick,id FROM user WHERE `nick`='$nick'";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
//kay�tlar� listele
while ($kayit=mysql_fetch_array($sorgulama)){
###################### var ##############################################
$id=$kayit["id"];
if ($id) {
echo "B�yle bi yazar zaten var, �zenti olmayal�m ve farkl� bir nick se�elim l�tfen :)";
exit;
}
}
}

$tarih = date("Y/m/d G:i");
$dt = "$day/$month/$year";
$durum = "on";
if ($reg == "on") {
$ifade = md5(rand(0,99999));
$sifre = substr($ifade, 17, 6);
$betasifre = sha1($sifre);
}
else {
$betasifre = sha1($sifre);
}
$yetki = "user";

$sorgu = "INSERT INTO user ";
$sorgu .= "(isim,nick,sifre,email,dt,cinsiyet,sehir,durum,yetki,regip,regtarih)";
$sorgu .= " VALUES ";
$sorgu .= "('$isim','$nick','$betasifre','$email','$dt','$cinsiyet','$sehir','$durum','$yetki','$ip','$tarih')";
mysql_query($sorgu);
$kime = $email;
$konu = "Yazar �ifreniz";
$icerik = "Merhaba $isim<br><br>
$sitename'e kay�t oldu�unuz i�in te�ekk�rler. Sisteme giri� yapabilmeniz i�in gerekli ekipmanlar a�a��da verilmi�tir.<br>
Sisteme giri� yapt�ktan sonra �ifreni de�i�tirmen senin i�in yararl� olacakt�r. Yarat�c� biri ol ve �ifreni do�um tarihin yada 123456 gibi ard���k rakamlar yapma.<br><br>
<b>Kullan�c� ad�n�z:</b> $nick<br>
<b>�ifreniz:</b> $sifre<br>
<br><br>
�yi �an�lar<br><br>
$sitename Y�netim<br>
$site;
";

$tarih = date("YmdHi");
$gun = date("d");
$ay = date("m");
$yil = date("Y");
$saat = date("H:i");

$konu = "<img src=images/unlem.gif> Ho�geldiniz!";
$system = "SYSTEM";
$yazi = "
<b>Yazarl���n�z $verified_user taraf�ndan direk olarak aktif edildi.</b>
";

$yazi = ereg_replace("\n","<br>",$yazi);

$sorgu = "INSERT INTO privmsg ";
$sorgu .= "(kime,konu,mesaj,gonderen,tarih,okundu,gun,ay,yil,saat)";
$sorgu .= " VALUES ";
$sorgu .= "('$nick','$konu','$yazi','$system','$tarih','1','$gun','$ay','$yil','$saat')";
mysql_query($sorgu);

$mailkonu = "$sitename'e Ho�geldiniz!";
$fromname=$sitename;
$fromemail=$sitemail;
if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
        $eol="\r\n";        
    }
    elseif (strtoupper(substr(PHP_OS,0,3)=='MAC'))
        $eol="\r";
    else
        $eol="\n"; 
    $mid = md5($_SERVER['REMOTE_ADDR'] . $fromname);
    $name = $_SERVER["SERVER_NAME"];
	$headers .= "Content-type: text/html; charset=iso-8859-9".$eol;
    $headers .= "From: $fromname <$fromemail>".$eol;    
    $headers .= "Reply-To: $fromname <$fromemail>".$eol;
    $headers .= "Return-Path: $fromname <$fromemail>".$eol;
    $headers .= "Message-ID: <$mid $sitemail".$eol;
    $headers .= "X-Mailer: PHP v".phpversion().$eol; 
        $headers .= "MIME-Version: 1.0".$eol; 
        $headers .= "X-Sender: PHP".$eol;       
@mail($kime,$mailkonu,$icerik,$headers) or stderr("Hata. Mail g�nderilemedi the brain'e ula��n");   

echo "
<div class=div1>
Yazar eklendi.
</div>
";
die;
} // bitir

?>
<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>

<style type="text/css">
<!--
.style2 {color: #666666}
-->
</style>
<span class="link"><B>Yazarl�k ba�vurunuzun tamamlanmas� i�in a�ag�dakileri doldurunuz. </B>:<BR>
<BR>
</span>
<FORM method=post action=>
  <p>
    <INPUT type=hidden value=ok name=okmu>
    <INPUT
type=hidden value=y name=submit>
</p>
  <table width="580" border="0">
    <tr>
      <td width="91"><strong>Kullan�c� Ad�n</strong></td>
      <td width="3">:</td>
      <td width="464"><input maxlength=40 type=text size=30 name=nick id=nick onChange="javascript:kullaniciadikontrol();">
         <div id="sonuc"> </div> </td>
    </tr>
    <tr>
      <td colspan="3">S�zl�kte kullanmak istedi�in nick. (T�rk�e karakterler ve �zel karakterler olan @'^,.~ gibi karakterler i�eremez.)</td>
    </tr>
      <?
$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$reg=$kayit2["reg"];
if ($reg == "off") {
echo "
    <tr>
      <td width=\"91\"><strong>�ifren</strong></td>
      <td width=\"3\">:</td>
      <td width=\"464\"><INPUT type=password maxLength=50 size=40 name=sifre>
          </td>
    </tr>
    <tr>
      <td width=\"91\"><strong>�ifre (onay)</strong></td>
      <td width=\"3\">:</td>
      <td width=\"464\"><INPUT type=password maxLength=50 size=40 name=sifre2>
          </td>
    </tr>
    <tr>
      <td colspan=\"3\">T�rk ki�ilerin genelde \"do�um tarihi, kendi isimleri, kendi isimleri + il plaka kodu\" gibi kombinasyonlar kulland��� sanal unsur.Onay i�in iki defa yazmal�s�n�z.</td>
    </tr>

";
}
?>
    <tr>
      <td><strong>Mail adresin</strong></td>
      <td>:</td>
      <td><input maxlength=50 size=40 name=email></td>
    </tr>
    <tr>
	<?if ($reg == "off") {
echo "<td colspan=\"3\">Mail adresiniz. �ifrenizi unutman�z veya kaybetmeniz halinde ileti�im den bizimle irtibata ge�in ki yeni �ifrenizi hemen verelim.</td>";
	  }
	else {
	echo "<td colspan=\"3\">�ifreniz mail adresinize g�nderilecektir. Bu y�zden mail adresinizin ge�erli ve do�ru olmas� gerekmektedir. Yoksa zor giri� yapars�n..</td>";

	}  
	   ?>
	
	
      <td colspan="3"></td>
    </tr>
    <tr>
      <td><strong>Ad�n Soyad�n</strong></td>
      <td>:</td>
      <td><INPUT name=isim id="isim" size=30 maxLength=50></td>
    </tr>
    <tr>
      <td colspan="3"><img src="images/unlem.gif" width="12" height="12"> 10 Puanl�k s�nav sorusudur. Do�ru yazmad���n�z taktirde s�zl��e al�nmayacaks�n�z.</td>
    </tr>
    <tr>
      <td><strong>Do�du�un G�n</strong></td>
      <td>:</td>
      <td><SELECT name=day class="ksel">
        <OPTION
selected>
        <OPTION>1
          <OPTION>2
          <OPTION>3
          <OPTION>4
          <OPTION>5
          <OPTION>6
          <OPTION>7
          <OPTION>8
          <OPTION>9
          <OPTION>10
          <OPTION>11
          <OPTION>12
          <OPTION>13
          <OPTION>14
          <OPTION>15
          <OPTION>16
          <OPTION>17
          <OPTION>18
          <OPTION>19
          <OPTION>20
          <OPTION>21
          <OPTION>22
          <OPTION>23
          <OPTION>24
          <OPTION>25
          <OPTION>26
          <OPTION>27
          <OPTION>28
          <OPTION>29
          <OPTION>30
          <OPTION>31</OPTION>
      </SELECT>
        <SELECT name=month class="ksel">
          <OPTION selected>
          <OPTION value=1>ocak
          <OPTION
value=2>subat
          <OPTION value=3>mart
          <OPTION value=4>nisan
          <OPTION
value=5>mayis
          <OPTION value=6>haziran
          <OPTION value=7>temmuz
          <OPTION
value=8>agustos
          <OPTION value=9>eylul
          <OPTION value=10>ekim
          <OPTION
value=11>kasim
          <OPTION value=12>aralik</OPTION>
        </SELECT>
        <SELECT name=year class="ksel">
          <OPTION
selected>
<OPTION>1994
          <OPTION>1993
          <OPTION>1992
          <OPTION>1991
          <OPTION>1990
          <OPTION>1989
          <OPTION>1988
          <OPTION>1987
          <OPTION>1986
          <OPTION>1985
          <OPTION>1984
          <OPTION>1983
          <OPTION>1982
          <OPTION>1981
          <OPTION>1980
          <OPTION>1979
          <OPTION>1978
          <OPTION>1977
          <OPTION>1976
          <OPTION>1975
          <OPTION>1974
          <OPTION>1973
          <OPTION>1972
          <OPTION>1971
          <OPTION>1970
          <OPTION>1969
          <OPTION>1968
          <OPTION>1967
          <OPTION>1966
          <OPTION>1965
          <OPTION>1964
          <OPTION>1963
          <OPTION>1962
          <OPTION>1961
          <OPTION>1960
          <OPTION>1959
          <OPTION>1958
          <OPTION>1957
          <OPTION>1956
          <OPTION>1955
          <OPTION>1954
          <OPTION>1953
          <OPTION>1952
          <OPTION>1951
          <OPTION>1950
          <OPTION>1949
          <OPTION>1948
          <OPTION>1947
          <OPTION>1946
          <OPTION>1945
          <OPTION>1944
          <OPTION>1943
          <OPTION>1942
          <OPTION>1941
          <OPTION>1940
          <OPTION>1939
          <OPTION>1938
          <OPTION>1937
          <OPTION>1936
          <OPTION>1935
          <OPTION>1934
          <OPTION>1933
          <OPTION>1932
          <OPTION>1931
          <OPTION>OHA!</OPTION>
        </SELECT></td>
    </tr>
    <tr>
      <td colspan="3">Do�um tarihiniz istatiksel alanda kullan�lacakt�r.</td>
    </tr>
    <tr>
      <td><strong>Cinsin</strong></td>
      <td>:</td>
      <td><SELECT name=cinsiyet class="ksel" id="cinsiyet">
        <OPTION value="m">Erkek
          <option value="f">Bayan </option>
          <option value="h">Hermafrodit </option>
      </SELECT></td>
    </tr>
    <tr>
      
    </tr>
    <tr>
      <td><strong>�ehir</strong></td>
      <td>:</td>
      <td><INPUT name=sehir id="sehir" size=20 maxLength=50></td>
    </tr>
    <tr>
      <td colspan="3"><span>(Ya�ad���n�z yer!)</span>
      </td>
    </tr>
  </table>
  <p>Evet eminim :
    <input type=submit class=but value="Yardir">
</FORM>
    <br>
          <form action=sozluk.php?process=rand method="post">
    Geri D�nmek ��in
    <input type=submit class=but value="�ok Ge� Degil">
        </form>
</p>
  <p></P>
</body>
</html>