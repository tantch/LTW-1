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

function drawQuestion(poll,qes){
		alert(poll);
		var formData = {pid : String(poll), qid : String(qes)}
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
		var jsonData = $.ajax({
	          url: "actions/action_getJsonData.php",
	          type: "POST",
	          data: formData,
	          dataType:"json",
	          async: false
	          }).responseText;
			
        var options = {
          title: 'Poll Results',
          pieHole: 0.2,
        };
        var data = new google.visualization.DataTable(jsonData);
        function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              var topping = data.getValue(selectedItem.row, 0);
              options.slices = options.slices || {};
              // clear all slice offsets
              for (var x in options.slices) {
                  
                  options.slices[x].offset = 0;
                  
              }
              options.slices[selectedItem.row] = options.slices[selectedItem.row] || {};
              options.slices[selectedItem.row].offset = 0.1;
              chart.draw(data, options);
            }
          }

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        google.visualization.events.addListener(chart, 'select', selectHandler); 
        chart.draw(data,options);
      }
}