<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($ispit != 1 and $verified_kat != "gammaz") {
echo "Bu i�lem i�in gerekli yetkiye sahip de�ilsiniz";
die;
}

if ($canlandir) {
$sorgu = "UPDATE mesajciklar SET `statu` = '' WHERE id='$canlandir'";
mysql_query($sorgu);
$sorgu = "UPDATE mesajciklar SET `update` = '$tarih' WHERE id='$canlandir'";
mysql_query($sorgu);
$sorgu = "UPDATE mesajciklar SET `updater` = 'System Administrator' WHERE id='$canlandir'";
mysql_query($sorgu);
$sorgu = "UPDATE mesajciklar SET `updatesebep` = '�spitlenen entry tekrar ba�l��a eklendi.' WHERE id='$canlandir'";
mysql_query($sorgu);
echo "$canlandir red edildi ve entry aktif edildi.";
}
else {
echo "�spitlenen Entryler";

$max = 40;
if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }
$alt = ($_GET["sayfa"] - 1)  * $max;

$sor = mysql_query("SELECT id FROM mesajciklar WHERE `statu`='ispit'");
$w = mysql_num_rows($sor);

$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
echo "<center><p class=eol><font face=Verdana size=1>
<b>Toplam $w/$max adet ba�l�k listeleniyor</b><br>
Sayfalar:
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
echo "<a class=link href=?process=adm&islem=ispit&sayfa=$linksayfa><font face=verdana size=1><<</font></a>";
}
}

}

echo "
<SELECT class=ksel onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {

if ($sayfa == $i) {
echo " <OPTION value=sozluk.php?process=adm&islem=ispit&sayfa=$i selected>$i</OPTION>";
} // if
else {
echo "<OPTION value=sozluk.php?process=adm&islem=ispit&sayfa=$i>$i</OPTION>";
} // new

}
echo "</SELECT>";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster) {
echo "<a class=link href=?process=adm&islem=ispit&sayfa=$linksayfa><font face=verdana size=1>>></font></a>";
}

}

echo "</center>";
}



$sorgu = "SELECT id,statu FROM mesajciklar WHERE `statu`='ispit' limit $alt,$max";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$eid=$kayit["id"];

$sorgu1 = "SELECT id,sira FROM mesajciklar WHERE `id` = '$eid'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$konusira=$kayit2["sira"];
$sorgu1 = "SELECT baslik,id FROM konucuklar WHERE `id` = '$konusira'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];

/*$baslik = ereg_replace("�","s",$baslik);
$baslik = ereg_replace("�","S",$baslik);
$baslik = ereg_replace("�","c",$baslik);
$baslik = ereg_replace("�","C",$baslik);
$baslik = ereg_replace("�","i",$baslik);
$baslik = ereg_replace("�","I",$baslik);
$baslik = ereg_replace("�","g",$baslik);
$baslik = ereg_replace("�","G",$baslik);
$baslik = ereg_replace("�","o",$baslik);
$baslik = ereg_replace("�","O",$baslik);
$baslik = ereg_replace("�","u",$baslik);
$baslik = ereg_replace("�","U",$baslik);
$baslik = ereg_replace("�","O",$baslik);*/

$baslik = strtolower($baslik);

$yazar = $verified_user;

$link = ereg_replace(" ","+",$baslik);

echo "
      <H3><FONT size=3><A href=\"sozluk.php?process=word&q=$link\">$baslik</A>$basliksil $baslikduzenle</FONT>
      </H3>
";

$sorgu1 = "SELECT * FROM mesajciklar WHERE `id` = '$eid'";
$sorgu2 = mysql_query($sorgu1);
$kayit=mysql_fetch_array($sorgu2);

$id=$kayit["id"];
$sira=$kayit["sira"];
$mesaj=$kayit["mesaj"];
$updater=$kayit["updater"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
$silen=$kayit["silen"];
$silsebep=$kayit["silsebep"];
$update=$kayit["update2"];
$updatesebep=$kayit["updatesebep"];
$ayazar = $yazar;

$yazarlink = ereg_replace("&","",$yazar); // adminlerden ~ kald�r�yoruz
$yazartitle = ereg_replace("&","Administrator / ",$yazar); // adminlerden ~ kald�r�yoruz

/*$link = ereg_replace("�","s",$link);
$link = ereg_replace("�","S",$link);
$link = ereg_replace("�","c",$link);
$link = ereg_replace("�","C",$link);
$link = ereg_replace("�","i",$link);
$link = ereg_replace("�","I",$link);
$link = ereg_replace("�","g",$link);
$link = ereg_replace("�","G",$link);
$link = ereg_replace("�","o",$link);
$link = ereg_replace("�","O",$link);
$link = ereg_replace("�","u",$link);
$link = ereg_replace("�","U",$link);
$link = ereg_replace("�","O",$link);

$mesaj = ereg_replace("�","�",$mesaj);
$mesaj = ereg_replace("�","�",$mesaj);
$mesaj = ereg_replace("�","i",$mesaj);
$mesaj = ereg_replace("�","�",$mesaj);
$mesaj = ereg_replace("�","�",$mesaj);
$mesaj = ereg_replace("�","�",$mesaj);*/

$mesaj = strtolower($mesaj);

$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$mesaj);
$mesaj = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $mesaj);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=view&eid=\\1>#\\1</a>",$mesaj);


$uzunluk = 142;
if($mesaj && strlen($mesaj)>$uzunluk) {
$mesaj=preg_replace("/([^\n\r -]{".$uzunluk."})/i"," \\1\n<br />",$mesaj);
}


$say++;

if (!$ayazar)
die;

if ($ayazar == $verified_user or $verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust" or $verified_kat == "gammaz")
$sil = "<a href=sozluk.php?process=adm&islem=ispit&canlandir=$id><font size=1>Yanl�� ispit</a>";

if ($ayazar == $verified_user or $verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$duzenle = "<a href=sozluk.php?process=esil&id=$id&sr=$sira><font size=1>Onayla ve Patlat</a> -";
else
$duzenle = "";

if ($updatesebep)
$updatesebep = "(Sebep: $updatesebep)";
// admin check
$echoyazar = $yazar;
$sorgu1 = "SELECT nick,yetki FROM user WHERE `nick` = '$yazar'";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$yetki=$kayit2["yetki"];
$nick=$kayit2["nick"];
if ($yetki == "admin") {
$yazar = "<font color=white title=Administrator><b>&$yazar</b></font>";
}
if ($yetki == "mod" or $yetki == "modust") {
$yazar = "<font title=Moderat�r><b>+$yazar</b></font>";
}
if ($yetki == "gammaz") {
$yazar = "<font title=Ispitci>$yazar</font>";
}
// admin check
if ($verified_user)
$msg = "<A  href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$yazartitle&gkonu=$id nolu isptilenen entryiniz\"><font size=1>msg</A>|</font>";
echo "
<OL>
  <LI value=$say>
  <DIV class=highlight>$mesaj<BR>
  ";
  if ($updater == "System Administrator")
  $updater = "<img src=images/unlem.gif> $updater";
  if ($updater)
  $bastir = "~ $update";
  if ($updater and ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust"))
  echo "------------------------------------------------------------------------------<br>
  <font size=1>$updater taraf�ndan d�zenlendi.$updatesebep</font>
  ";
  echo "
  </DIV>
  <DIV class=div2 align=right><font size=1>$duzenle $sil (#$id) <B><A
  href=\"sozluk.php?process=word&q=$echoyazar\" title=\"$yazartitle\"><font size=1>$yazar</A></B>|$gun/$ay/$yil $saat $bastir| $msg
  </DIV>
  <DIV class=div2 align=right><font size=1>�spitleyen: <A  href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$silen&gkonu=[MOD] $id nolu ispitledi�iniz entry\">$silen</a> | �spitleme Sebebi: $silsebep</DIV>
  </li>
  </ol>
  </center>
";
} // if
} // while
} // else
?>