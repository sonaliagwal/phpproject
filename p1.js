$(document).ready(function(){
	$("#i1").hover(function(){

		$("#a1").show();
	



	});
});
$(document).ready(function(){
	$("#i1").mouseleave(function(){
		$("#a1").hide();
		
	});
});

$(document).ready(function(){
	$("#i2").hover(function(){

		$("#a2").show();
	



	});
});
$(document).ready(function(){
	$("#i2").mouseleave(function(){
		$("#a2").hide();
		
	});
});
$(document).ready(function(){
	$("#i3").hover(function(){

		$("#a3").show();
	



	});
});
$(document).ready(function(){
	$("#i3").mouseleave(function(){
		$("#a3").hide();
		
	});
});
$(function(){
    $('.fadein img:gt(0)').hide();
    setInterval(function(){
      $('.fadein :first-child').fadeOut()
         .next('img').fadeIn()
         .end().appendTo('.fadein');}, 
      3000);
});