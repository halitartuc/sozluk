<?
//

//
$e = htmlspecialchars(strip_tags($_POST["e"]));
$m = htmlspecialchars(strip_tags($_POST["m"]));
$k = htmlspecialchars(strip_tags($_POST["k"]));
//
$m = ereg_replace("<","",$m);
$m = ereg_replace(">","",$m);

$e = ereg_replace(">","",$e);

$k = ereg_replace(">","",$k);

//     
$s = "INSERT into sikayet";
$s.= "(e,m,k)";
$s.= "VALUES";
$s.= "('$e','$m','$k')";
mysql_query ($s);

if ($s) {
    
    echo "G�r���n�z� kaydettik, en k�sa s�rede ilgilenilecektir. Te�ekk�rler...";
}

else {
    
    echo "trajedik bir hata olu�tu. g�r���n�z kaydedilemedi.";
}

?> 