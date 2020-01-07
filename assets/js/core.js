jQuery(function ($) {
	var $searchlink = $('#search-toggle i');
	var $searchbar  = $('#search-bar');
	var $searchfield = $('#search-text');
	
	$('#nav-top-links a').on('click', function(e){
	// e.preventDefault();
	
	if($(this).attr('id') == 'search-toggle') {
		if(!$searchbar.is(":visible")) { 
			// if invisible we switch the icon to appear collapsable
			$searchlink.removeClass('fa-search').addClass('fa-search-minus');
		} else {
			// if visible we switch the icon to appear as a toggle
			$searchlink.removeClass('fa-search-minus').addClass('fa-search');
		}
		
		$searchbar.slideToggle(250, function(){
			// callback after search bar animation
			$searchfield.focus();
			});
		}
	});
	
	$('#searchform').submit(function(e){
		e.preventDefault(); // stop form submission
	});
  
  	//Reponsive video embeds
	//$("iframe").wrap('<div class="embed-responsive embed-responsive-16by9"/>');
	//$("iframe").addClass('embed-responsive-item');

	let url = location.href.replace(/\/$/, "");
	
	if (location.hash) {
		const hash = url.split('#');
		$('.nav-tabs a[href="#'+hash[1]+'"]').tab('show');
		url = location.href.replace(/\/#/, "#");
		history.replaceState(null, null, url);
		setTimeout(() => {
			$(window).scrollTop(0);
		}, 400);
		$('html, body').animate({
			scrollTop: $('#tabs-block-header').offset().top
		}, 600);
	} 
	
	// Linking to tabs
	$('a[data-toggle="tab"]').on('click', function() {
		let newUrl;
		const hash = $(this).attr('href');
		if(hash == '#home') {
			newUrl = url.split('#')[0];
		} else {
			  newUrl = url.split('#')[0] + hash;
		}
		newUrl += '/';
		history.replaceState(null, null, newUrl);
	});
	
	// Tabbed content button links to tabs
	$('.btn-tab').on('click', function (e) {
		e.preventDefault();
		var target = '#' + $(this).attr('aria-controls') + '-tab';
		$('html, body').animate({scrollTop: $(target).offset().top}, 'fast');
		$(target).tab('show');
	})

	// External Link Pop-up
 	var domain = 'csd509j.net';

	$('a[href^="http"]').on('click', function (e) {
		
		var link = $(this).attr('href');
		var reg = new RegExp( domain );
		
		if ( link.match(reg) == null ) {
			e.preventDefault();
			$('#externalLink').attr('href', $(this).attr('href'));
			$('#modalNotification').modal('show');

		}
				
	});
	
});

$( document ).ready(function() {
	var height = $('#full-width-header').height();
	if (height % 2 == 0) {
		$('#header-right').css({
			height: height+1
		});
	}
});

function print_screen() {
    window.print();
}
