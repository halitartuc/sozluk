<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?=$sitename?> istatislik</title>
</head>

<body>
<form id="frm" action="sozluk.php" method="get" target="gostert">
				<div>
					<b><font size="2" color="#B7310B">anka s�zl�k istatistikleri </font></b><p>
					<select class="tedit" name="process" size="1" onchange='document.getElementById("frm").submit()'>
						<optgroup label="genel">
							<option value="gstat">genel istatistikler</option>
						</optgroup>
				
						<optgroup label="---entrysel---">
							<option value="entrystat">gelmi� ge�mi� en iyi entryler</option>
							<option value="kotu">en �ok kotulenmi� entryler</option>
                                                        <option value="entere">en enteresan entryler</option>
                                                        <option value="hit">en hit ba�l�klar</option>
                                                        <option value="baslikst">en dolu ba�l�klar</option>
                                                        <option value="eforay">en bir efor sarfedilen aylar</option>
                                                        <option value="eforgun">en bir efor sarf edilen g�nler</option>
                                                        <option value="ghiyi">gecen haftan�n miss entryleri</option>
							</optgroup>
						<optgroup label="---oy istatistikleri---">
                                                        <option value="encokarti">en �ok �uku oy alan yazarlar</option>
                                                        <option value="encokeksi">en �ok ��k� oy alan yazarlar</option>
                                                        <option value="enterealan">en enteresan yazarlar</option>
                                                        <option value="mesaj1">en �ok �uku oy verenler</option>
                                                        <option value="mesaj2">en �ok ��k� oy verenler</option>
                                                        <option value="entereveren">enteresan entry tespit�ileri</option>
                                                <optgroup label="---yazar istatistikleri---">
                                                        <option value="yazarstat">en �ok entry giren yazarlar</option>
                                                        <option value="ukteverenler">en �ok ukte veren yazarlar</option>
                                                        <option value="buayyazan">ay�n en �ok entry girenleri</option>
                                                        <option value="temastat">yazarlar�n tema tercihleri</option>
                                                        <option value="mesajgonder">olur olmaz mesaj atanlar</option>
                                                        <option value="sehir">nerden ulan bu yazarlar</option>
                                                        <option value="kime">mesaj kutusu dolu olanlar</option>
                                                        <option value="mod">en bi entry editleyen</option>
                                                        <option value="eklenen">arkada� listesine eklenenler</option>
                                                        <option value="ekleyen">arkada� listesine ekleyenler</option>
                                                <optgroup label="---moderator g�c�---">
                                                        
                                                        <option value="duyuru">en �ok duyuru yapanlar</option>
                                                <optgroup label="---di�er---">
                                                        <option value="burclar">yazarlar�n bur�lar�</option>
                                                        
                                                        </optgroup>
                                                      
					</select>
				</p></div>
			</form>
    <td>

        <DIV align=left><iframe name="gostert" id="gostert" width="100%" height="400" frameborder="0" src="sozluk.php?process=gstat"></iframe></DIV>
        </td>
  </tr>
</table>
</body>
</html>
<?
$sorgu = "SELECT tarih FROM stat";
$sorgulama = mysql_query($sorgu);
$kayit=mysql_fetch_array($sorgulama);
$tarih=$kayit["tarih"];
echo "$tarih";
?>
