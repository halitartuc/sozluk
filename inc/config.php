<?
error_reporting(0);
$host = "localhost";
$user = "ankasozl_mix";
$password = "123321";
$name = "ankasozl_mix";
$baglan = mysql_connect($host,$user,$password) or die ("Veritabanina Ba�lan�lamad� Sekerim..");
mysql_select_db($name,$baglan) or die("Veritabani Secilemedi Sekerim...");
mysql_query("SET NAMES 'latin5'");  
mysql_query("SET CHARACTER SET latin5");  
mysql_query("SET COLLATION_CONNECTION = 'latin5_turkish_ci'"); 

$site = "http://www.ankasozluk.com/";
$sitename = "anka s�zl�k";
$description = "kutsal anka� asew";
$sitemail = "info@ankasozluk.com";
$adminmail = "admin@ankasozluk.com";
$facebook = "http://www.facebook.com/";

$sitemap = "$site/sitemap.xml";
$siterss = "$site/xml/today.xml";

$avataryukseklik = "150";
?>