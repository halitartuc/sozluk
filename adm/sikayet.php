<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>

<?php

$e = $_POST['e'];
$m = $_POST['m'];
$k = $_POST['k'];
//$_POST['hede']; 

if ($e == "" || $k == "" || $m == "") die("Heryeri doldurun!");

$m = ereg_replace("<","",$m);
$m = ereg_replace(">","",$m);
$e = ereg_replace(">","",$e);
$k = ereg_replace(">","",$k);
//
$s = "INSERT into sikayet";
$s.= "(e,m,k)";
$s.= "VALUES";
$s.= "('$e','$m','$k')";

$s = mysql_query ($s);
//

if ($s) {    
    echo "G�r���n�z� kaydettik. Te�ekk�rler.";
} else {    
    echo "Ups! Trajedik bir hata olu�tu. G�r���n�z kaydedilemedi.";
}

?> 