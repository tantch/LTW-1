var questionId = 0;
var questions = [];
$(document).ready(function() {
    $("#addQuestion").click(function() {
        var size = $(".removeQuestion").length;
        if(size >=6){
        	alert("u can't have more than 6 questions");
        	return false;
        }
        var pntr = 'button' + questionId;
        $("#addQuestion").before("<input required type='text' placeholder='Question' name= 'Q" + questionId + "' id= 'question" + questionId + "'/><input type='button' class='removeQuestion' value='X' name='rmvQ" + questionId + "' /><br name='braQ" + questionId + "'> " + "<input type='button' class='addAnswer' id ='button" + questionId + "' name='addAQ" + questionId + "' value='+' /><br name='brQ" + questionId + "'>");
        questions[questionId] = 0;
        questionId++;
        $(".addAnswer").off('click').click(function(event) {
        	var questionN = Number($(event.target).attr("name").substring(5, 6));
        	var answerN = questions[questionN];
        	var size = $(".removeAnswer[name*='Q" + questionN + "']").length;
            if(size >=6){
            	alert("u can't have more than 6 answers");
            	return false;
            }
            questions[questionN] ++;
            $(event.target).before("<input type='text' placeholder='Answer' required name='Q" + questionN + "A" + answerN + "'/><input type='button' class='removeAnswer' value='X' name='rmvQ" + questionN + "A" + answerN + "' /><br name='brQ" + questionN + "A" + answerN + "'>");
            $(".removeAnswer").off('click').click(function(event) {
                var nm = $(event.target).attr("name");
                var qs = Number(nm.substring(4, 5));
                var ans = Number(nm.substring(6, 7));
                var size = $(".removeAnswer[name*='Q" + qs + "']").length;
                if (size <= 2) {
                    alert('Must have at least 2 answers');
                    return false;
                }
                $("[name *='Q" + qs + "A" + ans + "']").remove();
                for (var i = (ans + 1); i < size; i++) {
                    var j = i - 1;
                    $("[name ='Q" + qs + "A" + i + "']").attr("name", "Q" + qs + "A" + j);
                    $("[name ='brQ" + qs + "A" + i + "']").attr("name", "brQ" + qs + "A" + j);
                    $("[name ='rmvQ" + qs + "A" + i + "']").attr("name", "rmvQ" + qs + "A" + j);
                }
            });
        });
        $("#" + pntr).click();
        $("#" + pntr).click();
        $(".removeQuestion").off('click').click(function(event) {
            var nm = $(event.target).attr("name");
            var qs = Number(nm.substring(4, 5));
            var size = $(".removeQuestion").length;
            if (size <= 1) {
                alert('Must have at least 1 question');
                return false;
            }
           
            $("[name *='Q" + qs + "']").remove();
            for (var i = (qs + 1); i < size; i++) {
            	var size2 = $(".removeAnswer[name*='Q" + i + "']").length;
            	alert(size2);
                var j = i - 1;
                $("[name = 'Q"+i+"']").attr("name","Q" + j);
                $("[name = 'addAQ"+i+"']").attr("name","addAQ" + j);
                $("[id = 'button"+i+"']").attr("id","button" + j);
                $("[id = 'question"+i+"']").attr("id","question" + j);
                $("[name = 'braQ"+i+"']").attr("name","braQ" + j);
                $("[name = 'brQ"+i+"']").attr("name","brQ" + j);
                $("[name = 'rmvQ"+i+"']").attr("name","rmvQ" + j);
                for (var k = 0; k < size2; k++) {
                	$("[name ='Q" + i + "A" + k + "']").attr("name", "Q" + j + "A" + k);
                	$("[name ='brQ" + i + "A" + k + "']").attr("name", "brQ" + j + "A" + k);
                	$("[name ='rmvQ" + i + "A" + k + "']").attr("name", "rmvQ" + j + "A" + k);
                }
            }
        });
    });
    $("#addQuestion").click();
});