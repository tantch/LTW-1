<?php 
session_start();
if (!isset ( $_SESSION ['username'] )){
	$_SESSION['msg']='<p id="error">Not logged in</p>';
	header ( 'Location: ./' );
	return false;
}
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="./JS/drawChart.js"></script>
<script type="text/javascript">

$(document ).ready(function() {
	var get=parseURLParams(document.URL);
    var ques=getQuestionNumber(get['id']);
    var nomes=$.parseJSON(getPollNames(get['id']));
    $('#charts').before(nomes[0]['name']);
    for(var i=0;i<ques;i++){
    	drawQuestion(get['id'],i,nomes[i+1]['question']);
        $('#charts').append('<div id="donutchart'+i+'" style="width: 900px; height: 500px;"></div>');
    }
});
</script>
<div id ='charts'></div>
