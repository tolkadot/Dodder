jQuery(function( $ ){

	$(" .nav-primary ").addClass("responsive-menu").before('<div class="responsive-menu-icon"></div>');
	//@tolkadot rmoved lots of classes from the select part of this function so that the class is only added to the .nav-primary class

	$(".responsive-menu-icon").click(function(){
		$(this).next("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .genesis-nav-menu").slideToggle();
	});

	$(window).resize(function(){
		if(window.innerWidth > 767) {
			$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .genesis-nav-menu, nav .sub-menu").removeAttr("style");
			$(".responsive-menu > .menu-item").removeClass("menu-open");
		}
	});

	$(".responsive-menu > .menu-item").click(function(event){
		if (event.target !== this)
		return;
			$(this).find(".sub-menu:first").slideToggle(function() {
			$(this).parent().toggleClass("menu-open");
		});
	});

});