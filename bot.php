<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//TR" "http://www.w3c.org/TR/1999/REC-html401-19991224/frameset.dtd">
<META http-equiv=Content-Type content="text/html; charset=iso-8859-9">
<META content="MSHTML 6.00.2800.1106" name=GENERATOR>


<?php 
$soru = htmlspecialchars($_POST["soru"]);
$cevaplar = array("selam"=>"Sana da selam",
"sa"=>"As",
"naber"=>"Tesekkurler sen?",
"kim"=>"Tan�m�yorum",
"seni seviyorum"=>"Bende seni asqiw",
"ad�n ne"=>"S�zl�k Robotu",
"nerde ya��yorsun"=>"Anka S�zl�kte",
"�ifre"=>"ananzaa xd",
"anan"=>"ananzaa xd",
"nas�ls�n"=>"iyiyim sen ?",
"benimle"=>"malesef babanla evliyim.",
"lan"=>"ne var be.",
"nap�yorsun"=>"s�zl��� kontrol ediyorum sen ?.",
"nap"=>"s�zl��� kontrol ediyorum sen ?.",
"hey"=>"heey.",
"iyi"=>"h�m pekii.",
"peki"=>"konu�muyacak m�s�n ?.",
"seni sikerim"=>"sen �nce elini sikmeyi ��ren",
"sikerim"=>"sen �nce elini sikmeyi ��ren",
"siki"=>"yata�ama bekliyorum yak���kl�",
"vajina"=>"g�ne�i g�rmek ister misin delikanl�",
"meme"=>"bende var g�rmek ister misin",
"g�t"=>"ister misin ?",
"evet"=>"kar� istiyosan �nce anneni elden ge�ir",
"porno"=>"ben varken izlememelisin",
"siktir"=>"Terbiyesiz",
"mal"=>"Sensin o",
"amc�k"=>"annen'de var",
"orospu �ocu�u"=>"biz karde�iz",
"beni sik"=>"domalman� bekliyorum",
"renvacy"=>"yarat�c�m",
"seviyorum"=>"kimi ?",
"seni"=>"ayy bende seni asqiw",
"lise"=>"kendinle kar��t�rd�n.",
"sus"=>"siktir git",
);
$anlamadim = array("Anlayamad�m?","Afedersin?","Uff snne be slk .s.s","Bilmiyorum ki","Zekice �eyler sor bence h�h !");

foreach($cevaplar as $sorunun=>$cevap) {
        if(eregi($sorunun,$soru)) {
        die($cevap);
        }
}

echo $anlamadim[rand(0,count($anlamadim))];

?>