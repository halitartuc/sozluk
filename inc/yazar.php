<?

$yazar = htmlspecialchars(strip_tags($_GET["yazar"]));

echo "$yazar adl� yazara ait olan entry'lar:";

$max = 40;
if (!$_GET["sayfa"])  { $_GET["sayfa"]=1; }
$alt = ($_GET["sayfa"] - 1)  * $max;

$sor = mysql_query("SELECT yazar FROM mesajciklar WHERE `yazar`='$yazar'");
$w = mysql_num_rows($sor);

$goster = $w/$max;
$goster=ceil($goster);
if ($goster >1) {
echo "<center><p class=eol><font face=Verdana size=1>
<b>Toplam $w adet entry listeleniyor</b><br>
Sayfalar:
";

if ($sayfa >= 1 or !$sayfa) {

$linksayfa = $sayfa - 1;
if ($sayfa > 1 or $sayfa) {
if ($sayfa != 1) {
echo "<a class=but href=\"?process=yazar&yazar=$yazar&sayfa=$linksayfa\"><font face=verdana size=1><<</font></a>";
}
}

}

echo "
<SELECT class=ksel onchange=\"jm('self',this,0);\" name=sayfa>";
for ($i=1;$i<=$goster;$i++) {

if ($sayfa == $i) {
echo " <OPTION value=\"?process=yazar&yazar=$yazar&sayfa=$i\" selected>$i</OPTION>";
} // if
else {
echo "<OPTION value=\"?process=yazar&yazar=$yazar&sayfa=$i\">$i</OPTION>";
} // new

}
echo "</SELECT>";

if ($sayfa >= 1 or !$sayfa) {
if (!$sayfa)
$sayfa = 1;

$linksayfa = $sayfa + 1;

if ($linksayfa <= $goster) {
echo "<a class=but href=\"?process=yazar&yazar=$yazar&sayfa=$linksayfa\"><font face=verdana size=1>>></font></a>";
}

}

echo "</center>";
}



$sorgu = "SELECT id,statu,yazar FROM mesajciklar WHERE `statu`='' and `yazar` = '$yazar' limit $alt,$max";
$sorgulama = mysql_query($sorgu);
if (mysql_num_rows($sorgulama)>0){
while ($kayit=mysql_fetch_array($sorgulama)){
$eid=$kayit["id"];
$entry_yazari=$kayit["yazar"];

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


$sor = mysql_query("select * from oylar WHERE entry_id = '$eid' and oy = 1");
$arti = mysql_num_rows($sor);
$arti = "<b><font size=1>Arti: $arti</a></b>";

$sor = mysql_query("select * from oylar WHERE entry_id = '$eid' and oy = 0");
$eksi = mysql_num_rows($sor);
$eksi = "<b><font size=1>Eksi: $eksi</a></b>";


echo "
      <H3><FONT size=3><A href=\"sozluk.php?process=word&q=$link\">$baslik</A> $arti $eksi $basliksil $baslikduzenle</FONT>
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
$link = ereg_replace("�","O",$link);*/

$mesaj = ereg_replace("�","�",$mesaj);
$mesaj = ereg_replace("�","�",$mesaj);
$mesaj = ereg_replace("�","i",$mesaj);
$mesaj = ereg_replace("�","�",$mesaj);
$mesaj = ereg_replace("�","�",$mesaj);
$mesaj = ereg_replace("�","�",$mesaj);

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
$yazar = "<font color=red title=Administrator><b>&$yazar</b></font>";
}
if ($yetki == "mod") {
$yazar = "<font title=Moderat�r><b>+$yazar</b></font>";
}
if ($yetki == "gammaz") {
$yazar = "<font title=Ispitci>$yazar</font>";
}
// admin check
if ($verified_user)
$msg = "<A  href=\"sozluk.php?process=privmsg&islem=yenimsj&gkime=$yazartitle&gkonu=$id nolu entryiniz\"><font size=1>msg</A>|</font>";
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
  <font size=1>$updater tarafindan d�zenlendi.$updatesebep</font>
  ";
  echo "
  </DIV>
  <DIV class=div2 align=right><font size=1>$duzenle $sil (<a href=?process=eid&eid=$id>#$id</a>) <B><A
  href=\"sozluk.php?process=word&q=$echoyazar\" title=\"$yazartitle\"><font size=1>$yazar</A></B>|$gun/$ay/$yil $saat $bastir| $msg
  </DIV>
  </li>
  </ol>
  </center>
";
} // if
} // while
?>