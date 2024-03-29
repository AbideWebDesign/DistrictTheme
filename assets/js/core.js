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
  
	let url = location.href.replace(/\/$/, "");
	
	if (location.hash) {
		const hash = url.split('#');
		if ($(".nav-tabs").size()){
			console.log('made it');
			$('.nav-tabs a[href="#'+hash[1]+'"]').tab('show');
			url = location.href.replace(/\/#/, "#");
			history.replaceState(null, null, url);
			setTimeout(() => {
				$(window).scrollTop(0);
			}, 400);
			$('html, body').animate({
				scrollTop: $('#tabs-block-header').offset().top
			}, 600);
		} else {
			scrollToAnchor(url);
		}
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

	// External Link Pop-up with domains to whitelist
 	var domains = ['csd509j.net', 'csd509j.us2', 'https://teachcorvallis.org', 'https://www.parentsquare.com', 'corvallis-school-district.local'];

	$('a[href^="http"]:not(.btn-popup)').on('click', function (e) {
		
		var link = $(this).attr('href');
		
		var external = domains.find( function (domain) {
			var reg = new RegExp( domain );
			return link.match(reg) !== null;		
		});

		if ( external === undefined ) {
			e.preventDefault();
			$('#externalLink').attr('href', $(this).attr('href'));
			$('#modalNotification').modal('show');
		}
				
	});
	
	$( '#department-select' ).change( function () {
        
        location.href = $( this ).val();
        
    } );

	$( '#course-select' ).change( function () {
        
        location.href = $( this ).val();
        
    } );
    
    function scrollToAnchor (url) {	
	  var urlHash = url.split('#')[1];
	  if (urlHash &&  $('#' + urlHash).length) {
	        $('html').animate({
	            scrollTop: $('#' + urlHash).offset().top - 120
	        }, 500);
	  }
	}
	$('.anchor').click(function (event) {
	  event.preventDefault(); // stop the browser from snapping to the anchor
	  scrollToAnchor(event.target.href);
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
