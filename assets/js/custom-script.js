jQuery(window).on('load', function($){
	jQuery(".preload").delay(350).fadeOut('slow');
	if(jQuery(window).scrollTop() < 50){
		jQuery(".navbar").addClass("navbar-t");
	}else{
		jQuery(".navbar").removeClass("navbar-t");
	}
});
jQuery(document).ready(function($){
        // Check if the scroll position no in the top & navbar opacity class 
        if($(window).scrollTop() < 50){
            $(".navbar").addClass("navbar-t");
        }else{
            $(".navbar").removeClass("navbar-t");
	}
	$(document).on('scroll', function(){
		if($(window).scrollTop() < 50){
			$(".navbar").addClass("navbar-t");
		}else{
			$(".navbar").removeClass("navbar-t");
		}
	});
	$(".nav-link").on("click", function(event){
		if(this.hash !== ""){
			var target = this.hash;
            $('html, body').stop().animate({
                scrollTop: $($(this).attr('href')).offset().top - 56
            }, 1000);
			window.location.hash = target;
			event.preventDefault();
			// Remove class from all link;
			$(".nav-link").each(function(){
				$(this).removeClass("nav-link-active");
			});
			// Add class to the current scrolled link;
			$(this).addClass("nav-link-active");
		}
	});
	$(".enter").click(function(){
		if(this.hash !== ""){
			var target = this.hash;
            $('html, body').stop().animate({
                scrollTop: $($(this).attr('href')).offset().top + 76
            }, 1000);
			window.location.hash = target;
			event.preventDefault();
		}
	});
});