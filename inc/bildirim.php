<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1254">
<SCRIPT language=javascript src="sozluk.js"></SCRIPT>
</HEAD>
<BODY>

<?



if (!$verified_user) die("just register yazarlar girebilir lan!");

?>
<?php include("menu.php"); ?>


<td class="tabin">

<table>

<tr>

<td>

<fieldset><legend>Bildirimler</legend>

<?php
function fark($onceki,$simdi) {  
$fark = $simdi-$onceki;  
if($fark<60) {  
$d= $fark.' saniye �nce';  
}elseif($fark>60&&$fark<3600) {  
$fark = ceil($fark/60);  
$d= $fark. ' dakika �nce';  
}elseif($fark>3600&&$fark<86400) {  
$fark = ceil($fark/3600);  
$d= $fark.' saat �nce';   
}elseif($fark>86400&&$fark<604800) {  
$fark = ceil($fark/86400);  
$d= $fark.' g�n �nce';  
}elseif($fark>604800&&$fark<2592000) {  
$fark = ceil($fark/18144000);  
$d= $fark.' hafta �nce';  
}elseif($fark>2592000&&$fark<31536000) {  
$fark = ceil($fark/2592000);  
$d= $fark.' ay �nce';  
}elseif($fark>31536000) {  
$fark = ceil($fark/31536000);  
$d= $fark.' y�l �nce';  
}  
return $d;  
}  
 
 


$limit = 50;
$sayfa = $_GET["sayfa"];
if(($sayfa=="") or !is_numeric($sayfa)){
 	 $sayfa=1; }
$satirsayisi = mysql_num_rows(mysql_query("SELECT * FROM bildirim WHERE nick='$verified_user'"));
$toplamsayfa = ceil($satirsayisi / $limit);
$baslangic= ($sayfa-1) * $limit;


$bildirimq = mysql_query("SELECT * FROM bildirim WHERE nick='$verified_user'");
$bildirims = mysql_num_rows($bildirimq);
$sorgubil = mysql_query("SELECT * FROM bildirim WHERE nick='$verified_user' ORDER BY id DESC LIMIT $baslangic,$limit");

if ($bildirims == 0) {
echo "<br/><br/>hi� bildiriminiz yok..";
}
else {

echo "bildirim say�s�: <a>($bildirims)</a><br/>";




echo "<div align='right'>";
if ($sayfa > 1) {
echo "<span class='link'><a title='ilk sayfa' href='sozluk.php?process=bildirim&sayfa=1'>&#60;ilk sayfa</a></span>&nbsp;&nbsp;&nbsp;";
}

if ($sayfa >= 2) {
$oncekisayfa = $sayfa-1;
echo "<span class='link'><a title='�nceki sayfa' href='sozluk.php?process=bildirim&sayfa=$oncekisayfa'>&#60;geri</a></span> ";
}


echo "&nbsp;<select style=\"font-size:12px;\" id='link' name='link' onchange='javascript:window.location.href=this.value;'>";
for($x=1; $x<=$toplamsayfa; $x++)
{
  if($sayfa==$x){
  echo "<option value='sozluk.php?process=bildirim&sayfa=".$x."' selected>".$x."</option>&nbsp;";  
  } 

  else { 
  echo "<option value='sozluk.php?process=bildirim&sayfa=".$x."'>".$x."</option>&nbsp;";  
  }
}
echo "</select>&nbsp;";

$sonsayfa = $x-1;
if ($sayfa < $sonsayfa) {
$bisonraki = $sayfa+1;
echo " <span class='link'><a title='sonraki sayfa' href='sozluk.php?process=bildirim&sayfa=".$bisonraki."'>ileri&#62;</a></span>&nbsp;&nbsp;&nbsp;";

echo " <span class='link'><a title='son sayfa' href='sozluk.php?process=bildirim&sayfa=".$sonsayfa."'>son sayfa&#62;</a></span>";
}

echo "</div><br/>";









echo "<table>
<tr><td style=\"width:500px;\" align=\"center\"><b>bildirim</b></td><td align=\"center\"><b>ne zaman?</b></td></tr>";

while ($bildirimw = mysql_fetch_array($sorgubil)) {

$onceki = $bildirimw["tarih"]; //�nceki saat 
$simdi = time(); //�imdiki saat 

?>
<tr><td><?php echo $bildirimw["bildirim"]; ?></td><td><?php echo fark($onceki,$simdi);  ?></td></tr>

<?php
}

}
?>
</table>

</fieldset>
</TABLE>
</TR></TBODY></TABLE>
<BR>
<BR>
<?
if ($verified_user) {
 include("foot.php"); 
 }
 ?>
</BODY>
</HTML>
