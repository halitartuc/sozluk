<?php

include "config.php";

// Veri Tabanimiza baglandik Simdi POST ile gelen username in veri taban�n�n user tablosunda olup olmadigina bakiyoruz
// Once POST ile gelen username trimleyip tmizleyelim....

	
	$nick=trim($_POST["nick"]); 
    $sorgu = mysql_query("SELECT * FROM user WHERE nick='$nick'"); 
    if ( mysql_num_rows($sorgu) >= 1 ) 
    { 
    echo "�zg�n�m! Bu kullan�c� ad� sistemde mevcut";
    }
    
	else 
	{
	echo "Kullan�labilir";
	}
// Yukarida yazdigim Response mesajlar daha suslenebilir Gerisi sana kalmis....
//�ren�in Tick yada �arp� i�areti koyabilirsin k���k resim olarak...



?>