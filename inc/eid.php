<?
if ($eid) {
$eid =@$_GET["eid"];
$eid = ereg_replace("#","",$eid);


$sorgu1 = "SELECT id,sira FROM mesajciklar WHERE `id` = '$eid'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$konusira=$kayit2["sira"];
$sorgu1 = "SELECT baslik,id FROM konucuklar WHERE `id` = '$konusira'";
$sorgu2 = mysql_query($sorgu1);
$kayit2=mysql_fetch_array($sorgu2);
$baslik=$kayit2["baslik"];

if (!$baslik) {
echo "<div class=dash><center><b>b�yle bir entry yok,ya da kedi yedi..";
die;
}

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

if ($verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "mod")
$baslikduzenle = "<a class=link> - </a><a class=div href=sozluk.php?process=adm&islem=baslikduzenle&id=$id><font color=green size=2 face=verdana>edit</font></a>";

if ($verified_kat == "admin" or $verified_kat == "modust") //basl�k silme sadece �st seviye modlar�n g�revi
$basliksil = "<br><a class=div href=sozluk.php?process=adm&islem=basliksil&id=$id><font color=red size=2 face=verdana>Sil</font></a>";

$sor = mysql_query("select * from oylar WHERE entry_id = '$eid' and oy = 2");
$garip = mysql_num_rows($sor);
$garip = "<b><font size=1>entere: $garip</a></b>";

$sor = mysql_query("select * from oylar WHERE entry_id = '$eid' and oy = 1");
$arti = mysql_num_rows($sor);
$arti = "<b><font size=1>�uku: $arti</a></b>";

$sor = mysql_query("select * from oylar WHERE entry_id = '$eid' and oy = 0");
$eksi = mysql_num_rows($sor);
$eksi = "<b><font size=1>��k�: $eksi</a></b>";

echo "
<title>$baslik - $site</title>
<TABLE width=\"100%\">
  <TBODY>
  <TR>
    <TD width=\"80%\" height=15>
      <H3><FONT size=3><A href=\"sozluk.php?process=word&q=$link\">$baslik</A> $arti $eksi $garip $basliksil $baslikduzenle</FONT>
      </H3></TD>
</TR></TBODY></TABLE>
";

$sorgu1 = "SELECT * FROM mesajciklar WHERE `id` = '$eid'";
$sorgu2 = mysql_query($sorgu1);
$kayit=mysql_fetch_array($sorgu2);

$id=$kayit["id"];
$sira=$kayit["sira"];
$mesaj=stripslashes($kayit["mesaj"]);
$updater=$kayit["updater"];
$yazar=$kayit["yazar"];
$tarih=$kayit["tarih"];
$gun=$kayit["gun"];
$ay=$kayit["ay"];
$yil=$kayit["yil"];
$saat=$kayit["saat"];
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

if (strstr($mesaj,"youtube.com/watch")) {
            $youtube='#((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?#i';
            preg_match($youtube,$mesaj,$tube);
            $tube=$tube[0];
            $tube2=str_replace("watch?v=","v/",$tube);
        }  

$mesaj = preg_replace("'\(bkz: (.*)\)'Ui","(bkz: <a href=\"sozluk.php?process=word&q=\\1\">\\1</a>)",$mesaj);
$mesaj = preg_replace("'\(gbkz: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\">\\1</a>",$mesaj);
$mesaj = preg_replace("'\(u: (.*)\)'Ui","<a href=\"sozluk.php?process=word&q=\\1\" title=\"\\1\">*</a>",$mesaj);
$mesaj = preg_replace("'\(spoiler: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=spoiler\">spoiler</a>---<br><br>",$mesaj);
$mesaj = preg_replace("'\(alinti: (.*)\)'Ui","<br><br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br> \\1 <br>---<a href=\"sozluk.php?process=word&q=alinti\">alinti</a>---<br><br>",$mesaj);
$mesaj = preg_replace( "`((http)+(s)?:(//)|(www\.))((\w|\.|\-|_)+)(/)?(\S+)?`i", "<a target=_blank href=\"http\\3://\\5\\6\\8\\9\" title=\"\\0\">\\5\\6</a>", $mesaj);
$mesaj = preg_replace("'\#([0-9]{1,9})'","<a href=sozluk.php?process=eid&eid=\\1>#\\1</a>",$mesaj);


$uzunluk = 142;
if($mesaj && strlen($mesaj)>$uzunluk) {
$mesaj=preg_replace("/([^\n\r -]{".$uzunluk."})/i"," \\1\n<br />",$mesaj);
}


$say++;

if (!$ayazar)
die;

if ($ayazar == $verified_user or $verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$sil = "<a href=sozluk.php?process=esil&id=$id&sr=$sira><font size=1>sil</a>";

if ($ayazar == $verified_user or $verified_kat == "admin" or $verified_kat == "mod" or $verified_kat == "modust")
$duzenle = "<a href=sozluk.php?process=eduzenle&id=$id&sr=$sira><font size=1>edit</a> -";
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
$yazar = "<font color=red title=admin><b>&$yazar</b></font>";
}
if ($yetki == "modust") {
$yazar = "<font color=purple title=moderat�r><b>+$yazar</b></font>";
}
if ($yetki == "mod") {
$yazar = "<font color=orange title=co-mod><b>-$yazar</b></font>";
}
if ($yetki == "gammaz") {
$yazar = "<font color=green title=gammaz><b>%$yazar</b></font>";
}
if ($yazar != $verified_user and $verified_user)
$oylama = " <a href=\"javascript:od('sozluk.php?process=arti&id=$id',300,200)\">:)</a> | <a href=\"javascript:od('sozluk.php?process=enteresan&id=$id',300,200)\">:o</a> |</font> <a href=\"javascript:od('sozluk.php?process=eksi&id=$id',300,200)\">:(</a> ";
else
$oylama = "";
if ($yazar != $verified_user and $verified_user)
$kim = " <a href=\"javascript:od('sozluk.php?process=ben&kim=$yazartitle',350,450)\">?</a> ";
else
$kim = "";
// admin check
if ($verified_user)
$msg = "<A  href=\"sozluk.php?process=inbox&gkime=$yazartitle\"><font size=1>msg</A>|</font>";
echo "
<OL>
  <LI value=$say>
  <DIV class>$mesaj<BR>
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
  <DIV class=div2 align=right><font size=1>$duzenle $sil (#$id) <A
  href=\"sozluk.php?process=word&q=$echoyazar\" title=\"$yazartitle\"><font size=1>$yazar</A>|$gun/$ay/$yil $saat $bastir| $oylama |$kim|$msg
  </DIV><BR><BR>
  </li>
";


echo "
<br>

";
?>




<?php

echo "<center><form action=\"sozluk.php?process=word&q=$link\" method=post>
<input type=submit class=but value=\"hepsini g�ster\">
</form></center>
";
} // eid
else {
echo "<div class=dash><center>bilemedim �imdi..";
exit;

}
?>