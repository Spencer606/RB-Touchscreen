var slideIndex = 0;


var folder = "images/HomeScreenSlides/";
var slides = [];

$.ajax({
    url : folder,
    success: function (data) {
        $(data).find("a").attr("href", function (i, val) {
            if( val.match(/\.(jpe?g|png|gif|JPE?G)$/) ) {
                slides.push(  folder + val );
            }
        });
		showSlides();
    }
});

var timeoutVar;

function showSlides() {
	var curSlide = document.getElementById("curSlide");
	slideIndex++;
    if (slideIndex >= slides.length) {slideIndex = 0;}
    if (slides[slideIndex].equals("Icon")) {
      console.log("Found the stupid file");
    } else {
      console.log("slide name: " + slides[slideIndex]);
    }
    curSlide.setAttribute("src", slides[slideIndex]);
	// Change image every 15 seconds
	timeoutVar = setTimeout(showSlides, 15000);
}

function switchSlide(){
	var curSlide = document.getElementById("curSlide");
    if (slideIndex >= slides.length) {slideIndex = 0;}
	if(slideIndex<0){slideIndex=slides.length-1;}
    curSlide.setAttribute("src", slides[slideIndex]);
	clearTimeout(timeoutVar);
	timeoutVar = setTimeout(showSlides, 15000);
}

$("#curSlide").click(function(e){
   var pWidth = $(this).innerWidth(); //use .outerWidth() if you want borders
   var pOffset = $(this).offset();
   var x = e.pageX - pOffset.left;
    //left
	if(pWidth/2 > x){
       slideIndex--;
	}
    else{ // right
        slideIndex++;
	}
	switchSlide();

});
