var player = "X";
var win = false;
var moveCount=0;


$(document).ready(function(){
    
	document.getElementById("resetButton").onclick = reset;
	
	
	function reset(){		
		for(let i=0; i<9; i++){
			$("#"+i).text("  ");
			$("#"+i).removeClass("green");
		}
		player = "X";
		$("#curPlayer").text(" Player's Turn: "+player);
		win = false;
		moveCount=0;		
	}
	for(let i=0; i<9; i++){
		$("#"+i+"").click(function(){
			
			if($("#"+i).text().trim()=="" && !win ){
				console.log(player);
				$("#"+i).text(player);
				player = switchPlayer();
				$("#curPlayer").text(" Player's Turn: "+player);
			    checkWin();
				moveCount++;
				if(moveCount==9 && !win){
					$("#curPlayer").text("Tie Game!" );	
				}
			}
			
		});
    }
	
	
	function checkWin(){
		//check rows
		
		for( let i=0; i<9; i=i+3){
			if($("#"+i).text()!="  " &&
			$("#"+i).text()==$("#"+(i+1)).text() &&
			$("#"+i).text()==$("#"+(i+2)).text()			
			){
				//Winning row
				$("#curPlayer").text($("#"+i).text()+" wins!"); 
				$("#"+i).addClass("green");
				$("#"+(i+1)).addClass("green");
				$("#"+(i+2)).addClass("green");
				win=true;
			}
		}
		//check columns
		for(let i=0; i<3; i=i+1){
			if($("#"+i).text()!="  " &&
			$("#"+i).text()==$("#"+(i+3)).text() &&
			$("#"+i).text()==$("#"+(i+6)).text()			
			){
				//Winning column
				$("#curPlayer").text($("#"+i).text()+" wins!"); 
				$("#"+i).addClass("green");
				$("#"+(i+3)).addClass("green");
				$("#"+(i+6)).addClass("green");
				win=true;
			}
		}
		//check diagonals
		if($("#0").text()!="  " &&
			$("#0").text()==$("#4").text() &&
			$("#0").text()==$("#8").text()			
			){
				//Winning diagonal
				$("#curPlayer").text($("#0").text()+" wins!"); 
				$("#0").addClass("green");
				$("#4").addClass("green");
				$("#8").addClass("green");
				win=true;
		}
		if($("#2").text()!="  " &&
			$("#2").text()==$("#4").text() &&
			$("#2").text()==$("#6").text()			
			){
				//Winning diagonal
				$("#curPlayer").text($("#4").text()+" wins!"); 
				$("#2").addClass("green");
				$("#4").addClass("green");
				$("#6").addClass("green");
				win=true;
		}
		return win;
		
	}
	
	
	function switchPlayer(){
		if(player=="X"){
			return "O";
		}
		return "X";		
	}
	
});