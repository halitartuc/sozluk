<?php
 //Bu dosya mysql ba�lant�s� vs i�erecek.
define("USERIP",$_SERVER['REMOTE_ADDR']);
$timeout_value = time()-900;

(iMEMBER?$culname=$username:$culname="Anonym"); // Burda $culname adl� de�i�kene e�er kullan�c� �ye ise �ye ad�n� veriyoruz de�ilse 'Anonym' ad�n� veriyoruz.

if(@mysql_num_rows(mysql_query("SELECT * FROM usersonline WHERE ip='".USERIP."'"))>0) {
    @mysql_query("UPDATE usersonline SET page='".$_SERVER['PHP_SELF']."',timein='".time()."',usonname='".$culname."' WHERE ip='".USERIP."'");
} else {
    @mysql_query("INSERT INTO usersonline VALUES(NULL,'".$culname."','".$_SERVER['PHP_SELF']."','".time()."','".USERIP."')");
}

define("TOTALUSERSNOW",mysql_num_rows(mysql_query("SELECT DISTINCT(ip) FROM usersonline WHERE timein>$timeout_value")));
define("TOTALMEMBERSNOW",mysql_num_rows(mysql_query("SELECT DISTINCT(ip) FROM usersonline WHERE usonname!='Anonym' AND timein>$timeout_value")));
define("TOTALANONYMSNOW",mysql_num_rows(mysql_query("SELECT DISTINCT(ip) FROM usersonline WHERE usonname='Anonym' AND timein>$timeout_value")));

?> 