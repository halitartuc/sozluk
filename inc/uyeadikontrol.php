<?php

include "../config.php";

// Veri Tabanimiza baglandik Simdi POST ile gelen username in veri taban�n�n user tablosunda olup olmadigina bakiyoruz
// Once POST ile gelen username trimleyip tmizleyelim....

	
	$nick=trim($_POST["nick"]); 
    $sorgu = mysql_query("SELECT * FROM user WHERE nick='$nick'"); 
    if ( mysql_num_rows($sorgu) >= 1 ) 
    { 
    echo "<img src=\"images/hata.gif\" height=\"12\"> �zg�n�m! Bu kullan�c� ad� sistemde mevcut";
    }
    
	else 
	{
	echo "<img src=\"images/ok.gif\" height=\"12\"> Kullan�labilir";
	}
?>