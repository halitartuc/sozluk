<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
<style type="text/css">
.kutu {
        background:#eee;
        border: 1px solid #ddd;
        padding:10px;
        margin-bottom:10px;
                height:500px;
                weight:200px;
}
#sorular {
        height:440px;
        padding:10px;
        overflow:scroll;
        overflow-x:hidden;
}
</style>
<script type="text/javascript">
function sor() {
var soru = $("#konus :input").val();
if(soru != '') {
$.post("bot.php",$('#konus').serialize(), function(gelen) { 
$("#sorular").append("ben:"+soru+" <br />s�zl�k robotu:"+gelen+" <br />");
}); 
}else{
 alert("Bir�eyler yazmay� deneyebilirsiniz?");  
}
return false; }</script>
<div class="kutu">s�zl�k robotuyla s�cak dakikalar !
<div id="sorular">bi�eyler yazman� bekliyorum a�qim;<br /></div>
<form id="konus" name="form1" method="post" action="javascript:void(0);">
    <label>
        <input name="soru" type="text" id="soru" value="" size="30" />
         </label>
        <label>
            <input type="submit" name="button" id="button" value="yolla asq�m" onclick="sor()"/>
        </label>
</form></div>
