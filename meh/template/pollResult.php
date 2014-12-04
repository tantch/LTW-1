<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="./JS/drawChart.js"></script>
<script type="text/javascript">

$(document ).ready(function() {
	var get=parseURLParams(document.URL);
    var ques=getQuestionNumber(get['id']);

    for(var i=0;i<ques;i++){
    	drawQuestion(get['id'],i);
        $('#charts').append('<div id="donutchart'+i+'" style="width: 900px; height: 500px;"></div>');
    }
});
</script>
<div id ='charts'></div>
