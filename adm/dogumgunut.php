<?
if ($verified_kat != "admin" and $verified_kat != "mod" and $verified_kat != "gammaz" and $verified_kat != "modust") {
echo "ANANIN AMINDA DA A�IK VAR ORAYA DA BAK!";
die;
}
?>

<?
if ($verified_kat == "admin" or $verified_kat == "modust")
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"86000;URL=sozluk.php?process=adm&islem=tebrikmail\">";
$konu="Do�um G�n�n�z Kutlu Olsun";
$fromname=$sitename;
$fromemail=$sitemail;

$mesaj="De�erli kullan�c�m�z<br><br>
Do�um g�n�n�z� en i�ten dileklerimizle kutlar�z.<br>Hayat�n t�m g�zellikleri sizinle olsun.<br><br>
$sitename<br>
www.halicsozluk.com";
$day=date("j");
$month=date("n");
$today="$day/$month";
$dtsorgu = mysql_query("SELECT * FROM user WHERE dt like '$today%'");
$dttarihtoplam = mysql_num_rows($dtsorgu);
while($goster = mysql_fetch_assoc($dtsorgu)) {    
if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
        $eol="\r\n";        
    }
    elseif (strtoupper(substr(PHP_OS,0,3)=='MAC'))
        $eol="\r";
    else
        $eol="\n"; 
    $mid = md5($_SERVER['REMOTE_ADDR'] . $fromname);
    $name = $_SERVER["SERVER_NAME"];
	$headers .= "Content-type: text/html; charset=iso-8859-9".$eol;
    $headers .= "From: $fromname <$fromemail>".$eol;    
    $headers .= "Reply-To: $fromname <$fromemail>".$eol;
    $headers .= "Return-Path: $fromname <$fromemail>".$eol;
    $headers .= "Message-ID: <$mid $sitemail".$eol;
    $headers .= "X-Mailer: PHP v".phpversion().$eol; 
        $headers .= "MIME-Version: 1.0".$eol; 
        $headers .= "X-Sender: PHP".$eol;       
$mail = @mail($goster['email'],$konu,$mesaj,$headers) or stderr("Hata. Mail g�nderilemedi the brain'e ula��n"); 
}
if($mail) {echo "Do�um g�nleri kutland�."; } else { echo "Hata! Do�um g�nleri kutlanamad� yada bug�n do�an hi�kimse yok..";}
?> 