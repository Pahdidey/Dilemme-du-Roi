$(document).ready(function() {


    $('.respmenu').click(function(){
      $('body>header nav').animate({width: 'toggle'});
      $('body>header nav').toggleClass('open');
      $(this).toggleClass('open');
    });




	$('.accordion > div > h3').click(function(){
		$(this).next().slideToggle();
		$(this).parent().toggleClass('open');
    });





	setInterval(function(){
	   $("#profil #objectif-secret").load("#profil #objectif-secret .box");
	}, 5000);

});



