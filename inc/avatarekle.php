<title><? echo $sitename;?> - Avatar Ayarc�k</title>
<?
if ($verified_durum !== "off" or $verified_durum == !"wait" or $verified_durum !== "on")
{
function trsil($deger) {
$turkce=array("�","�","�","�","I","�","�","�","�","�","�","--","","�");
$duzgun=array("s","S","g","G","I","o","O","C","c","u","U","-","-","i");
$deger=str_replace($turkce,$duzgun,$deger);
return $deger;
}

if ($_POST["url"]){  

if( strlen($avatar) <20) {
die("bukadar k�sa url mi olur len bi daha bak �una <br><br> <input type=button class='but' onClick='history.go(-1)' value='�z�r dilerim'>");
}

$avatar=$_POST['avatar'];


$sorgu = "UPDATE user SET avatar='$avatar' WHERE nick='$nick'";
mysql_query($sorgu);
echo "say�n $nick; <br>avatar�n� de�i�tirdin. Ne Mutlu Sana. <br>
<br>
<input type='button' value='eyvallah' onclick='window.close();' class=but>
";
exit;
mysql_close();
}

if ($_POST["yukle"]){

if (empty($_FILES["avatar"]["name"])) {
  echo '
    <script language="javascript">
        alert("Resim se�ilmedi se�de gel.");
        history.back();
    </script>';
exit;
}
$kaynak = $_FILES["avatar"]["tmp_name"]; 
$dosya = str_replace(" ", "_", $_FILES[avatar][name]);
$dosya = trsil($dosya);
$uzanti = explode(".", $_FILES[avatar][name]);
$hedef  = "images/avatar/".$dosya;

if ($uzanti[1] == "jpg" || $uzanti[1] == "bmp" || $uzanti[1] == "JPG" || $uzanti[1] == "gif" || $uzanti[1] == "GIF" || $uzanti[1] == "png" || $uzanti[1] == "PNG" || $uzanti[1] == "TIF" || $uzanti[1] == "TIFF" ) {
if (file_exists($hedef)) {
    $hmz = substr(md5(uniqid(rand())),0,3);
    $hedef = "images/avatar/$hmz-".$dosya;
    $dosya = "$hmz-".$dosya;
}
move_uploaded_file($kaynak,$hedef);

$sorgu = "UPDATE user SET avatar='$hedef' WHERE nick='$nick'";
mysql_query($sorgu);
echo "say�n $nick; <br>avatar�n� y�kledin. Ne Mutlu Sana. <br>
<br>
<input type='button' value='eyvallah' onclick='window.close();' class=but>
";
exit;
mysql_close();
} else

{ echo " ge�ersiz dosya tipi "; } 

}

if ($_POST["sil"]){echo "<center>";
 echo "Geri d�n�lmez bir yola giriyorsun. E�er i�lemi onaylarsan y�kledi�in avatar silinecek ve sende s�radan insanlar gibi temsili resimle s�sleneceksin..
 <br><br><form name='ok' method='post' action='sozluk.php?process=avatarekle'>
 <input class='but' name='ok' type='submit' id='submit' value='sonunu d���nen kahraman olamaz'> <input type=button class='but' onClick='history.go(-1)' value='g�z�m yemedi! geri d�n'>
</form>";
echo "</center>";}  

if ($_POST["ok"]){
$sorgu = "UPDATE user SET avatar='' WHERE nick='$nick'";
$update=mysql_query($sorgu);
if($update){
echo "say�n $nick; <br>art�k sende s�radan bir �yesin.. Haydi ko�, z�pla, sevin..<br>
<br>
<input type='button' value='eyvallah' onclick='window.close();' class=but>
";}else {echo "vallaha silemedim billaha silemedim.. bence bu bir i�aret.<br>
<br>
<input type='button' value='oo tanr�m �ok mutluyum' onclick='window.close();' class=but>";}
exit;
mysql_close();
}}
?>
