<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<SCRIPT src="images/sozluk.js" type=text/javascript></SCRIPT>
<title></title>
</head>

<?
$sorgu1 = "SELECT * FROM ayar";
$sorgu2 = mysql_query($sorgu1);
mysql_num_rows($sorgu2);
$kayit2=mysql_fetch_array($sorgu2);
$reg=$kayit2["reg"];
if ($reg == "on") {
echo "
<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0;URL=sozluk.php?process=reg1222\">
";
}
?>



<body>
<b><P>anka s�zl�k cand�r canand�r, kutsal anka� s�zl�kt�r.. </b><BR>
<OL class=eol>
  <LI>adam olaca��ma,
  <LI>liseli olmuyaca��ma,
  <LI>birinci kurala uyaca��ma,
  <LI>ikinci kurala uyaca��ma
  <LI>���nc� kurala uyaca��ma,
</OL>
<FORM action=sozluk.php?process=reg2 method=post>
  <TABLE>
    <TBODY>
      <TR>
        <TD width="20"><INPUT id=you type=checkbox value=ok name=okmu></TD>
        <TD width="219"><LABEL for=you>anam ve babam�n �n�nde s�z veriyorum.</LABEL></TD>
      </TR>
    </TBODY>
  </TABLE>
<p align=right>
  <Center><input name="submit" type=submit class=gonder value="g�nder"></Center>
</p>
</FORM>
</body>
</html>