$(document).ready(function(){

	// ANIMATIONS
	var $animation_elements = $('.animElement');
	var $window = $(window);

	function check_if_in_view() {
	  var window_height = $window.height();
	  var window_top_position = $window.scrollTop();
	  var window_bottom_position = (window_top_position + window_height);
	 
	  $.each($animation_elements, function() {
	    var $element = $(this);
	    var element_height = $element.outerHeight();
	    var element_top_position = $element.offset().top;
	    var element_bottom_position = (element_top_position + element_height);
	 
	    //check to see if this current container is within viewport
	    if ((element_bottom_position >= window_top_position) &&
	        (element_top_position <= window_bottom_position)) {
	      $element.addClass('in-view');
	    }
	  });
	}

	$window.on('scroll resize', check_if_in_view);
	$window.trigger('scroll');

	$(window).on('hashchange', function(e){
	    history.replaceState ("", document.title, e.originalEvent.oldURL);
	});

	$('.tabsAnchor').on('click', 'a', function(e) {

		var target = this.hash.slice(1);

		$(this).parent().find('a').removeClass('active');
		$(this).addClass("active");

		$(this).parent().next('.tabsContent').find('div').removeClass('active');
		$('#tab'+target).addClass('active');
		e.preventDefault();

	});

	$('#toTop').click(function(){
		$('html, body').animate({scrollTop:0}, 'slow');
		return false;
	});

	$('#menuAnchor').on('click', function(e) {
		$('body').toggleClass('menuopen');
		e.preventDefault();
	});

	$('#menuClose').on('click', function(e) {
		$('body').removeClass('menuopen');
		e.preventDefault();
	});

	// OPEN MODAL
	$("[data-toggle='modal']").on('click', function(e) {
		e.preventDefault();
		var target = $(this).data('target');
		$(target).toggleClass('open');
	});

	$('.modal').find('.close').on('click', function(e) {
		e.preventDefault();
		$(this).parent().removeClass('open');
		$(this).parent().parent().parent().removeClass('open');
	});

});

$(window).scroll(function() {

	if($(this).scrollTop() > 200){
		$('#toTop').addClass('show');
	}else{
		$('#toTop').removeClass('show');
	} 

});