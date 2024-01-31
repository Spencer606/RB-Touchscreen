var csvObj = null;
var curRow = -1;

/**
 * Shuffles array in place.
 * @param {Array} a items The array containing the items.
 */
function shuffle(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
}

$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "CSV/trivia.csv",
        dataType: "text",
        success: function(csv) {
			csvObj = $.csv.toObjects(csv);
			console.log(csvObj);
			//shuffle questions
			shuffle(csvObj);
			startQuestions();
		}
     });
});

var clicked = false;

function startQuestions(){
				
	clicked = false;
	$('#result').replaceWith("<div class=\"row\" id='result'></div>"); // clear result
	curRow++;
	curRow = curRow % csvObj.length;
	var d = csvObj[curRow]; // d is curRowObj
	$('#question').text(d['Question']);
	var answers = [d['correct answer'], 
	d['wrong answer1'],
	d['wrong answer2'],
	d['wrong answer3']];
	shuffle(answers); // shuffle the questions
	for(let i = 1; i <= 4; i++){
		var curBtn = $('#a' + i);
		curBtn.text(answers[i-1]);
		curBtn.unbind('click');
		curBtn.on('click', function(){
			if(!clicked){
				var right;
				if($(this).text() == d['correct answer']){
					right = true;
					// right
					
					$(this).toggleClass("btn-sky");
					$(this).toggleClass("btn-fresh");
					
					console.log("r");
				}
				else{
					right = false;
					// wrong
					
					$(this).toggleClass("btn-sky");
					$(this).toggleClass("btn-hot");
					console.log('w');
				}
				var but = $(this);
				$('#result').append('<div class="col-sm-6 col-sm-offset-3"> <button id="next"  type="button" class="btn btn-sunny btn-block" style="height:50px;">Next Question</button></div>');
				$('#next').unbind('click');
				$('#next').on('click', function(){
					but.toggleClass(right ? 'btn-fresh' : 'btn-hot');
					but.toggleClass('btn-sky');
					startQuestions();
				});
				clicked=true;
			}
			
			
		});
	}
	
}
