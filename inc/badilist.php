<TABLE cellSpacing=0 cellPadding=0 width="100%">
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%">
        <TBODY>
        <TR>
          <TD class=tab>
            
           <DIV><A href="sozluk.php?process=privmsg">mesajlar</A></DIV></TD>
          <TD class=tab>
            <DIV><A href="sozluk.php?process=cop">ki�isel</A></DIV></TD>
          <TD class=tab>
         <DIV><A href="sozluk.php?process=onlines">olan biten</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=gorunum">tema</A></DIV></TD>
         <TD class=tab>
            <TD class=tabsel>dost</TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=dusmanlarim">d��man</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=modlog2">modlog</A></DIV></TD>
         <TD class=tab>
            <DIV><A href="sozluk.php?process=yorumlarim">yorum alan�</A></DIV></TD>
          <TD class=tab style="WIDTH: 100%"> </TD></TR></TBODY></TABLE></TD></TR>

<td class="tabin">
<center>
<table>
   <tr>
      <td>
         <div style="width:170px;height:275px;overflow:scroll;overflow-x:hidden">
<fieldset><legend>Dost</legend>
<?
$sorgu=mysql_query("select * from rehber where kimin='$verified_user' and num='0' order by id desc");
$no=@mysql_num_rows($sorgu);
echo "<div>$no arkada��n var</div><br>";
while ($oku=mysql_fetch_array($sorgu)) {
$sorgu2=mysql_query("select * from online where nick='$oku[kim]'");
$bul=@mysql_result($sorgu2,0,'ondurum');
if ($bul=="on") {
 $durum="online";
} else {
 $durum="ofline";
}
echo "<div><a href='sozluk.php?process=privmsg&islem=yenimsj&gkime=$oku[kim]'>$oku[kim]</a> <a href='sozluk.php?process=rehbersil&num=0&kim=$oku[kim]' title='listemden ��ks�n'>(-)</a> $durum</div>";
}
?>
</fieldset>
</div>
      </td>

      <td>
         <div style="width:170px;height:275px;overflow:scroll;overflow-x:hidden">
<fieldset><legend>d��manlar�m</legend>
<?
$sorgu=mysql_query("select * from rehber where kimin='$verified_user' and num='1' order by id desc");
$no=@mysql_num_rows($sorgu);
echo "<div>$no d��man�n var</div><br>";
while ($oku=mysql_fetch_array($sorgu)) {
$sorgu2=mysql_query("select * from online where nick='$oku[kim]'");
$bul=@mysql_result($sorgu2,0,'ondurum');
if ($bul=="on") {
 $durum="online";
} else {
 $durum="ofline";
}
echo "<div><a href='sozluk.php?process=privmsg&islem=yenimsj&gkime=$oku[kim]'>$oku[kim]</a> <a href='sozluk.php?process=rehbersil&num=0&kim=$oku[kim]' title='listemden ��ks�n'>(-)</a> $durum</div>";
}
?>
</fieldset>
</div>
      </td>
   </tr>
</table>
</center>

</div>
