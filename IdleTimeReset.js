var idleTime=0;

//Adds the reset timer
$(document).ready(function () {
	var idleInterval = setInterval(timerIncrement, 60000);
	$(this).mousemove(function(e) {
		idleTime=0;
	});
	
	
});

//function to change window when it has been idle for too long
function timerIncrement(){
	idleTime=idleTime+1;
	if(idleTime>5){
		window.location.replace("HomeScreen.html");
	}
	
}


//This function is for the right click feature so no one can get
//out of the program via right click
 $(function() {
        $.contextMenu({
            selector: 'html', 
            callback: function(key, options) {
                var m = "clicked: " + key;
                if(key=='Home'){
					window.location = "HomeScreen.html";
				}
            },
            items: {
                "Home": {name: "Home", icon: "home"},
                
                "quit": {name: "Quit", icon: function(){
                    return 'context-menu-icon context-menu-icon-quit';
                }}
            }
        });

         
    });
