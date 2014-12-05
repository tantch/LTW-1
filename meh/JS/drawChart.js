function parseURLParams(url) {
    var queryStart = url.indexOf("?") + 1,
        queryEnd   = url.indexOf("#") + 1 || url.length + 1,
        query = url.slice(queryStart, queryEnd - 1),
        pairs = query.replace(/\+/g, " ").split("&"),
        parms = {}, i, n, v, nv;

    if (query === url || query === "") {
        return;
    }

    for (i = 0; i < pairs.length; i++) {
        nv = pairs[i].split("=");
        n = decodeURIComponent(nv[0]);
        v = decodeURIComponent(nv[1]);

        if (!parms.hasOwnProperty(n)) {
            parms[n] = [];
        }

        parms[n].push(nv.length === 2 ? v : null);
    }
    return parms;
}

function drawQuestion(poll,qes,name){
		var formData = {pid : String(poll), qid : String(qes)}
		var options= {packages: ['corechart'], callback : drawChart};
      google.load("visualization", "1", options);
      function drawChart() {
		var jsonData = $.ajax({
	          url: "actions/action_getJsonData.php",
	          type: "POST",
	          data: formData,
	          dataType:"json",
	          async: false
	          }).responseText;
			
        var options = {
          title: name,
          backgroundColor: '#f0f0f0',
          width : 600,
          height: 400,
          pieHole: 0.2,
        };
        var data = new google.visualization.DataTable(jsonData);
        function selectHandler(row,column) {
        	
              options.slices = options.slices || {};
              // clear all slice offsets
              for (var x in options.slices) {
                  
                  options.slices[x].offset = 0;
                  
              }
              options.slices[row['row']] = options.slices[row['row']] || {};
              options.slices[row['row']].offset = 0.1;
              chart.draw(data, options);
          }

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'+qes));
        google.visualization.events.addListener(chart, 'onmouseover', selectHandler); 
        google.visualization.events.addListener(chart, 'onmouseout', function(){
        	alert('cenas');
        }); 
        chart.draw(data,options);
      }
}
function getQuestionNumber(pollid){
	var formData = {pid : String(pollid)}
		var jsonData = $.ajax({
	          url: "actions/action_getQuestionNumber.php",
	          type: "POST",
	          data: formData,
	          dataType:"json",
	          async: false
	          }).responseText;
	return Number(jsonData);
}
function getPollNames(pollid){
	var formData = {pid : String(pollid)}
	var jsonData = $.ajax({
		url: "actions/action_getPollNames.php",
		type: "POST",
		data: formData,
		dataType:"json",
		async: false
	}).responseText;
	return jsonData;
}