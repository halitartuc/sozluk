<?

// Fonksiyonlar Basliyor...

// Baglaniyor...
function baglan () {

}
// Baglandi
baglan();
$ayar["upload"]["profil"]["klasor"]="inc/resimler/avatar/"; 
$ayar["upload"]["profil"]["yol"]= "inc/resimler/avatar/"; 
$ayar["upload"]["resim"]["maximum"]=102400;
$ayar["upload"]["editor"]["domain"]="$site/inc"; 

//saat farki

date_default_timezone_set('Europe/Istanbul');

//harf k���lt
function kucultuver($deger) {
$turkce=array("\n","�","�","�","�","�","�","�","  ","%u0130","%u015e","%u015f","%u0131","I","%u011e","%u011f",":)",":\(",":d",";)",":p",":s","\(A\)","\(6\)","\(:","):",":.\("," )","&#8217;");
$duzgun=array("<br>","i","�","�","�","�","�","�"," ","i","�","�","�","�","�","�","","","","","","","","","","","",")","'");
$deger=str_replace($turkce,$duzgun,$deger);
$deger = strtolower($deger);
return $deger;
}
?>
