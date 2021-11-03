<?php

function csd_enqueue_style() {

	$theme = wp_get_theme();

	wp_enqueue_style( 'theme', get_template_directory_uri() . '/style.css', '', $theme->version ); 

	wp_enqueue_style( 'print', get_template_directory_uri() . '/css/print.css', '', $theme->version ); 

	wp_enqueue_style( 'ie10-viewport-bug-workaround', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css' ); 

	wp_enqueue_style( 'font-awesome-5', 'https://use.fontawesome.com/releases/v5.14.0/css/all.css' ); 

}

add_action( 'wp_enqueue_scripts', 'csd_enqueue_style', 100 );

function csd_enqueue_script() {

	$theme = wp_get_theme();

	wp_deregister_script( 'jquery' );

	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, null );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'popper.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', 'jquery', '', true );

	wp_enqueue_script( 'bootstrap.min.js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', 'jquery', '', true );

	wp_enqueue_script( 'core.js', get_template_directory_uri() . '/assets/js/core.js', '', $theme->version, true );

	wp_enqueue_script( 'cookies.js', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', '', $theme->version, true );	
	
	if ( is_page_template( 'page-calendar.php' ) || is_singular( 'news' ) ) {
		
		wp_enqueue_script( 'addthis_widget.js', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56c3954e3471722a' );		
				
	}
		
}

add_action( 'wp_enqueue_scripts', 'csd_enqueue_script' );

function csd_calendar_scripts() {

	if ( is_page( 'home' ) || is_page( 'calendar' ) ) {

		wp_enqueue_style( 'fullcalendar.min.css', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' ); 

		wp_enqueue_script( 'moment.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js', 'jquery', '', true );

		wp_enqueue_script( 'full-calendar.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js', 'jquery', '', true );

		wp_enqueue_script( 'gcal.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/gcal.min.js', 'jquery', '', true );

	}

}

add_action( 'wp_enqueue_scripts', 'csd_calendar_scripts' );

function csd_theme_setup() {

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'square', 600, 600, true );

	add_image_size( 'Square Column 3', 285, 285, true );

	add_image_size( 'Square Column 4', 380, 380, true );

	add_image_size( 'News Image Small', 262, 175, true );

	add_image_size( 'News Image Medium', 410, 273, true );

	add_image_size( 'News Image Large', 750, 500, true );

	add_image_size( 'News Image Featured', 945, 500, true );

	add_image_size( 'Staff Directory', 326, 453, true );

	add_image_size( 'Callout Block', 263, 186, true );

	add_image_size( 'Page Builder Image', 825, 315, true );

	add_image_size( 'eFriday Folder Image', 230, 298, true );

	add_image_size( 'Parent Header', 1600, 314, true );

	add_image_size( 'Home Slider', 1600, 500, true );

	add_image_size( 'Full Width', 1170 );

	add_image_size( 'Text Block', 530, 640, true );

}

add_action( 'after_setup_theme', 'csd_theme_setup' );

// Custom CSS for Admin
add_action('admin_head', 'dashboard_styles');

function dashboard_styles() {
	
	echo '<style>
	/*
	** Plugin: SearchWP
	*/
	#searchwp-index-errors-notice {
		display: none;
	}
	
	/* 
	** Plugin: ACF-Crop
	*/
	.acf-field-image-crop {
		display: none;
	}
	
	/* 
	** Plugin: ACF to Rest API
	*/
	.acf-to-rest-api-donation-button, #acf-to-rest-api-settings p, .acf-to-rest-api-donation-notice {
		display: none;
	}
	
	</style>';

}

// Register 
function register_my_menus() {
	
	register_nav_menus(
		array(
		  'header-menu' => __( 'Header Menu' ),
		  'header-menu-mobile' => __( 'Header Menu Mobile' ),      
		  'header-toplinks' => __( 'Header Top Links Menu' ),
		  'footer-topmenu-col-1-1' => __( 'Footer Menu Column 1.1' ),   
		  'footer-topmenu-col-1-2' => __( 'Footer Menu Column 1.2' ), 
		  'footer-topmenu-col-1-3' => __( 'Footer Menu Column 1.3' ),              
		  'footer-topmenu-col-2-1' => __( 'Footer Menu Column 2.1' ),
		  'footer-topmenu-col-3-1' => __( 'Footer Menu Column 3.1' ),
		  'footer-topmenu-col-3-2' => __( 'Footer Menu Column 3.2' ),
		  'footer-topmenu-col-4-1' => __( 'Footer Menu Column 4.1' ),
		  'footer-bottommenu' => __( 'Header Bottom Menu' ),
		)
	);
	
}

add_action( 'init', 'register_my_menus' );

function csd_widgets_init() {
	
	register_sidebar( array(
	    'name' => __( 'Main Sidebar', 'csd' ),
	    'id' => 'sidebar',
	    'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'csd' ),
	    'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
	    'name' => __( 'Calendar - Home', 'csd' ),
	    'id' => 'home_calendar',
	    'description' => __( 'Widget area for calendar events on home page.', 'csd' ),
	
	) );
	
}

add_action( 'widgets_init', 'csd_widgets_init' );

// Limit number of excerpt characters
function custom_excerpt_length( $length ) {

	return 10;

}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {

	return '';

}

add_filter('excerpt_more', 'new_excerpt_more');

// ACF Options Page
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page();

}

if ( function_exists( 'acf_add_options_sub_page' ) ) {
	
	acf_add_options_sub_page( 'General' );

	acf_add_options_sub_page( 'Pages' );

	acf_add_options_sub_page( 'Quick Links' );

	acf_add_options_sub_page( 'Calendar' );

	acf_add_options_sub_page( 'Food Services' );

	acf_add_options_sub_page( 'eFriday Folders' );

	acf_add_options_sub_page( 'Footer' );

	acf_add_options_sub_page( '404/Search Page' );

	acf_add_options_sub_page( 'External Links' );

}

add_filter( 'wp_link_query_args', 'csd_wp_link_query_args' ); 
 
function csd_wp_link_query_args( $query ) {

	$query['post_status'] = array( 'publish','inherit' );
	
	$query['post_type'] = array( 'news', 'page', 'attachment' ); 
	
	return $query;

}

function humanTiming ( $time ) {

	$time = time() - $time; // to get the time since that moment

	$tokens = array (
		31536000 => 'year',
		2592000 => 'month',
		604800 => 'week',
		86400 => 'day',
		3600 => 'hour',
		60 => 'minute',
		1 => 'second'
	);
	
	foreach ( $tokens as $unit => $text ) {

		if ( $time < $unit ) continue;

		$numberOfUnits = floor( $time / $unit );
	
		return $numberOfUnits.' '.$text.( ( $numberOfUnits > 1 ) ? 's':'' );
	
	}

}

function acf_load_sidebar_callout_blocks_field_choices( $field ) {
    // reset choices
    $field['choices'] = array();
    // if has rows
    if( have_rows('callout_blocks', 'option') ) {        
        // while has rows
        while( have_rows('callout_blocks', 'option') ) {
            // instantiate row
            the_row();
            
            // vars
            $value = get_sub_field('callout_block_heading');
            $label = get_sub_field('callout_block_heading');

            // append to choices
            $field['choices'][ $value ] = $label;
        }
    }
    // return the field
    return $field;
} 
add_filter('acf/load_field/name=sidebar_callout_blocks', 'acf_load_sidebar_callout_blocks_field_choices');

function acf_load_sidebar_contact_blocks_field_choices( $field ) {
    // reset choices
    $field['choices'] = array();
    // if has rows
    if( have_rows('contact_blocks', 'option') ) {
        // while has rows
        while( have_rows('contact_blocks', 'option') ) {
            // instantiate row
            the_row();
            
            // vars
            $value = get_sub_field('contact_name');
            $label = get_sub_field('contact_name');

            // append to choices
            $field['choices'][ $value ] = $label;
        }
    }
    // return the field
    return $field;
} 
add_filter('acf/load_field/name=sidebar_contact_block', 'acf_load_sidebar_contact_blocks_field_choices');

function acf_set_featured_image( $value, $post_id, $field  ){
	
	update_post_meta( $post_id, '_thumbnail_id', $value );
	
	return $value;
}
add_filter( 'acf/update_value/name=featured_img', 'acf_set_featured_image', 10, 3 );

function featured_news_sort( $args, $field, $post ) {

    $args['orderby'] = 'date';
    $args['order'] = 'DESC';

    return $args;
}
add_filter('acf/fields/post_object/query/name=featured_news_1', 'featured_news_sort', 10, 3);
add_filter('acf/fields/post_object/query/name=featured_news_2', 'featured_news_sort', 10, 3);
/*
 * Get pages for full-width subnav
 */
function get_full_width_children_pages($post) {
	if($post->post_parent) {
		$parent_id = get_topmost_parent($post->id);
			  				  	
		$children = wp_list_pages( array(
		    'title_li' => '',
		    'child_of' => $parent_id,
		    'echo'	=> 0,
		    'sort_column' => 'post_title',
		    'exclude' => '36226,36236,36224,36234,36209,36229,36232,36333,36329,36327,36319,35781,36331',
		));
	} else {
		$parent_id = $post->ID;
		
		$children = wp_list_pages( array (
			'title_li' => '',
			'depth' => 1,
			'child_of' => $post->ID,
			'echo' => 0,
			'sort_column' => 'post_title',
			'exclude' => '36226,36236,36224,36234,36209,36229,36232,36333,36329,36327,36319,35781,36331',
		));
	}

	if ($children) {
		$pages = array(
			'parent' => $parent_id,
			'children' => $children,
		);
		return($pages);
	} else {
		return false;
	}
}

/*
 * Custom pagination function
 */
function show_pagination_links()
{
    global $wp_query;

    $page_tot   = $wp_query->max_num_pages;
    $page_cur   = get_query_var( 'paged' );
    $big        = 999999999;

    if ( $page_tot == 1 ) return;

    echo paginate_links( array(
            'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
            'format'    => '?paged=%#%',
            'current'   => max( 1, $page_cur ),
            'total'     => $page_tot,
            'prev_next' => true,
			'prev_text'    => __('&lsaquo; Previous', 'progression'),
			'next_text'    => __('Next &rsaquo;', 'progression'),
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list'
        )
    );
}

function efriday_archive( $query ) {
	if( !is_admin() ){
		if ( $query->is_post_type_archive( 'efriday' ) ) {
		    $dt = new DateTime();
			$dt->setTimezone(new DateTimeZone('America/Los_Angeles'));
			
		    $meta_query = array(
				array(
					'key' => 'end_date',
					'value' => $dt->format('Ymd'),
					'type' => 'DATE',
					'compare' => '>='
				),
				array(
					'key' => 'start_date',
					'value' => $dt->format('Ymd'),
					'type' => 'DATE',
					'compare' => '<='
				)
			);
			$query->set( 'meta_key', 'end_date' );
		    $query->set( 'meta_query', $meta_query );
		}
	}
}	
add_filter( 'pre_get_posts', 'efriday_archive' );

/* Calendar */
function render_calendar() {
?>
	<div class="row">
		<div class="col-lg-4 d-none d-lg-flex">
			<div class="calendar-dropdown">
				<button type="button" id="dropdown-menu" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-rss"></i> Subscribe </button>
	            <ul class="dropdown-menu" aria-labelledby="dropdown-menu" >
		            <?php if( have_rows('calendars', 'options') ): ?>
						<?php while( have_rows('calendars', 'options') ): the_row(); ?>
							<li>
								<a href="<?php the_sub_field('calendar_ical'); ?>"><i class="fa fa-download"></i> <label><?php the_sub_field('calendar_name'); ?></label></a>
							</li>
						<?php endwhile; ?>		
					<?php endif; ?>			
					<?php if( have_rows('school_calendars', 'options') ): ?>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">School Calendars</li>
						<?php while( have_rows('school_calendars', 'options') ): the_row(); ?>
							<li>
								<a href="<?php the_sub_field('calendar_ical'); ?>"><i class="fa fa-download"></i> <label><?php the_sub_field('calendar_name'); ?></label></a>
							</li>
						<?php endwhile; ?>
					<?php endif; ?>
	            </ul>
			</div>
			<div id="calendar-dropdown-view" class="calendar-dropdown">
				<button type="button" id="dropdown-menu-view" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-filter"></i> Filter </button>
				<ul class="dropdown-menu" aria-labelledby="dropdown-menu-view" >
					<?php if( have_rows('calendars', 'options') ): ?>
						<?php $count = 0; ?>
						<?php while( have_rows('calendars', 'options') ): the_row(); ?>
							<li>
							   <label class="checkbox"><input type="checkbox" id="<?php echo str_replace(' ', '_', get_sub_field('calendar_name')); ?>" <?php echo get_sub_field('visible') ? 'checked="checked"' : ''; ?> value="<?php echo $count; ?>" /><span class="label-text"><?php the_sub_field('calendar_name'); ?></label>
							</li>
							<?php $count++; ?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php if( have_rows('school_calendars', 'options') ): ?>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">School Calendars</li>	
					 	<?php while( have_rows('school_calendars', 'options') ): the_row(); ?>
					 		<li>
								<label class="checkbox"><input type="checkbox" id="<?php echo str_replace(' ', '_', get_sub_field('calendar_name')); ?>" <?php echo get_sub_field('visible') ? 'checked="checked"' : ''; ?> value="<?php echo $count; ?>" /><span class="label-text"><?php the_sub_field('calendar_name'); ?></label>
					 		</li>
					 		<?php $count++; ?>
					 	<?php endwhile; ?>
					<?php endif; ?>           
				</ul>
			</div>
		</div>
		<div class="col-12 col-md-7 col-lg-4 text-center text-md-left text-lg-center">
			<h1 id="month" class="mb-0"><?php echo date('F Y'); ?></h1>
		</div>
		<div id="calendar-buttons" class="col-12 col-md-5 col-lg-4 text-center text-md-right">
			<button id="prev" class="btn btn-primary btn-sm"><i class="fa fa-caret-left"></i> Prev</button>
			<button id="next" class="btn btn-primary btn-sm">Next <i class="fa fa-caret-right "></i></button>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mt-1 mt-lg-0">
			<div id="calendar"></div>
		</div>
	</div>
	<script>
		$(function() {
			window.mobilecheck = function() {
				var check = false;
				(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
				return check;
			};
	    
			var initialEventSources = [];
			var allEventSources = [];
			
			// Get district calendars
			<?php if( have_rows('calendars', 'options') ): ?>
				<?php while( have_rows('calendars', 'options') ): the_row(); ?>
					<?php $calendar_address = get_sub_field('calendar_address'); ?>
					<?php $calendar_name = get_sub_field('calendar_name'); ?>
					<?php $calendar_color = get_sub_field('calendar_color'); ?>
					
					// Load calendars that are marked as visable
					<?php if( get_sub_field('visible') ): ?>
						
						initialEventSources.push({
							id: '<?php echo str_replace(' ' , '_', $calendar_name); ?>', 
							googleCalendarId: '<?php echo $calendar_address; ?>', 
							textColor: '<?php echo $calendar_color; ?>',
							backgroundColor: '<?php echo $calendar_color; ?>',
							borderColor: '<?php echo $calendar_color; ?>',
						});
					
					<?php endif; ?>
					
					// Load all available calendars
					allEventSources.push({
						id: '<?php echo str_replace(' ' , '_', $calendar_name); ?>', 
						googleCalendarId: '<?php echo $calendar_address; ?>', 
						textColor: '<?php echo $calendar_color; ?>',
						backgroundColor: '<?php echo $calendar_color; ?>',
						borderColor: '<?php echo $calendar_color; ?>',
					});
					
				<?php endwhile; ?>
			<?php endif; ?>
			// If applicable, get school calendars
			<?php if( have_rows('school_calendars', 'options') ): ?>
				<?php while( have_rows('school_calendars', 'options') ): the_row(); ?>
					<?php $calendar_address = get_sub_field('calendar_address'); ?>
					<?php $calendar_name = get_sub_field('calendar_name'); ?>
					<?php $calendar_color = get_sub_field('calendar_color'); ?>
					
					// Load all available calendars
					allEventSources.push({
						id: '<?php echo str_replace(' ' , '_', $calendar_name); ?>', 
						googleCalendarId: '<?php echo $calendar_address; ?>', 
						textColor: '<?php echo $calendar_color; ?>',
						backgroundColor: '<?php echo $calendar_color; ?>',
						borderColor: '<?php echo $calendar_color; ?>',
					});
					
				<?php endwhile; ?>
			<?php endif; ?>
					
			// Toggle function for calendars
			$( '.dropdown-menu li' ).on( 'click', function( event ) {
		        var $checkbox = $(this).find('.checkbox');
		        
		        if (!$checkbox.length) {
		            return;
		        }
		        
		        var $input = $checkbox.find('input');
		        
		        if ($input.is(':checked')) {
		            $input.prop('checked', false);
		            $('#calendar').fullCalendar('removeEventSource', allEventSources[$input.val()]);
		        } else {
		            $input.prop('checked', true);
		            $('#calendar').fullCalendar('addEventSource', allEventSources[$input.val()]);
		        }
		        
		        $('#calendar').fullCalendar('rerenderEvents');
		        
		        return false;
	    	}); 
			
			// Only close dropdown when clicking outside
			$('#calendar-dropdown-view').on('click', function(event){
			    var events = $._data(document, 'events') || {};
			    events = events.click || [];
			    for(var i = 0; i < events.length; i++) {
			        if(events[i].selector) {
			
			            //Check if the clicked element matches the event selector
			            if($(event.target).is(events[i].selector)) {
			                events[i].handler.call(event.target, event);
			            }
			
			            // Check if any of the clicked element parents matches the 
			            // delegated event selector (Emulating propagation)
			            $(event.target).parents(events[i].selector).each(function(){
			                events[i].handler.call(this, event);
			            });
			        }
			    }
			    event.stopPropagation(); //Always stop propagation
			});
		
			$('#calendar').fullCalendar({
	
				header: false,
				
				defaultView: window.mobilecheck() ? "listMonth" : "month",
				
				displayEventTime: true, // show the time column in list view
				
				googleCalendarApiKey: 'AIzaSyCtn4VYI0llZ2sEGiMgezxWyBDTVuKaHds',
					
				eventSources: initialEventSources,
				
				timezone: 'America/Los_Angeles',
	
				eventClick: function (event) {
					// opens events in a popup window
					window.open(event.url, '_blank', 'width=700,height=600');
					return false;
				},
				
			});
			
			$('#prev').on('click', function() {
			    $('#calendar').fullCalendar('prev'); // call method
			    var moment = $('#calendar').fullCalendar('getDate');
			    $('#month').html(moment.format('MMMM YYYY'));
			});
	
			$('#next').on('click', function() {
				$('#calendar').fullCalendar('next'); // call method
				var moment = $('#calendar').fullCalendar('getDate');
				$('#month').html(moment.format('MMMM YYYY'));
			});
			
		});
	</script>
<?php
}

function render_list_view_district() { 
?>
	<div id='calendar-list-district'></div>
	<script>
		$(function() {
			
			var allEventSources = [];
			
			<?php if( have_rows('calendars', 'options') ): ?>
			
				<?php while( have_rows('calendars', 'options') ): the_row(); ?>
				
					<?php if ( get_sub_field('visible') ): ?>
					
						<?php $calendar_address = get_sub_field('calendar_address'); ?>
						<?php $calendar_name = get_sub_field('calendar_name'); ?>
						<?php $calendar_color = get_sub_field('calendar_color'); ?>
						
						allEventSources.push(
						{
							id: '<?php echo $calendar_name; ?>', 
							googleCalendarId: '<?php echo $calendar_address; ?>', 
							textColor: '<?php echo $calendar_color; ?>',
							backgroundColor: '<?php echo $calendar_color; ?>',
							borderColor: '<?php echo $calendar_color; ?>',
						});
						
					<?php endif; ?>
	
				<?php endwhile; ?>
				
			<?php endif; ?>	
			
			$('#calendar-list-district').fullCalendar({
	
				defaultView: 'list',
							
				googleCalendarApiKey: 'AIzaSyCtn4VYI0llZ2sEGiMgezxWyBDTVuKaHds',
					
				eventSources: allEventSources,
				
				header: false,
				
				timezone: 'America/Los_Angeles',
				
				views: {
	                list: {
	                    duration: { days: 30 },
	                    eventLimit: 1,
	                }
	            },
	
				eventClick: function (event) {
					// opens events in a popup window
					window.open(event.url, '_blank', 'width=700,height=600');
					return false;
				},
				
			});
		});
	</script>
<?php
}

// Helper function to help migrate away from ACF-Crop
function get_string_between($string, $start, $end){
	$string = ' ' . $string;
	$ini = strpos($string, $start);
	if ($ini == 0) return '';
	$ini += strlen($start);
	$len = strpos($string, $end, $ini) - $ini;
	return substr($string, $ini, $len);
}

function cptui_register_district_cpts() {

	/**
	 * Post Type: eFriday Folders.
	 */

	$labels = array(
		"name" => __( "eFriday Folders", "custom-post-type-ui" ),
		"singular_name" => __( "eFriday Folder", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "eFriday Folders", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "efriday", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-portfolio",
		"supports" => array( "title" ),
	);

	register_post_type( "efriday", $args );
}

add_action( 'init', 'cptui_register_district_cpts' );

function cptui_register_district_cpts_efriday() {

	/**
	 * Post Type: eFriday Folders.
	 */

	$labels = array(
		"name" => __( "eFriday Folders", "custom-post-type-ui" ),
		"singular_name" => __( "eFriday Folder", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "eFriday Folders", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "efriday", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-portfolio",
		"supports" => array( "title" ),
	);

	register_post_type( "efriday", $args );
}

add_action( 'init', 'cptui_register_district_cpts_efriday' );
function cptui_register_district_taxes_efriday() {

	/**
	 * Taxonomy: eFriday Categories.
	 */

	$labels = array(
		"name" => __( "eFriday Categories", "custom-post-type-ui" ),
		"singular_name" => __( "eFriday Category", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "eFriday Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'efriday-category', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "efriday-category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "efriday-category", array( "efriday" ), $args );
}
add_action( 'init', 'cptui_register_district_taxes_efriday' );
function cptui_register_district_taxes_efriday_category() {

	/**
	 * Taxonomy: eFriday Categories.
	 */

	$labels = array(
		"name" => __( "eFriday Categories", "custom-post-type-ui" ),
		"singular_name" => __( "eFriday Category", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "eFriday Categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'efriday-category', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "efriday-category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "efriday-category", array( "efriday" ), $args );
}
add_action( 'init', 'cptui_register_district_taxes_efriday_category' );


// Yoast SEO
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

add_filter( 'wpseo_enable_notification_post_trash', '__return_false' );

add_filter( 'wpseo_enable_notification_post_slug_change', '__return_false' );

add_filter( 'wpseo_enable_notification_term_delete', '__return_false' );

add_filter( 'wpseo_enable_notification_term_slug_change', '__return_false' );

// SearchWP
// Add search weight to more recently published entries in SearchWP.
function csd_searchwp_mods( $mods ) {
	
	global $wpdb;

	$mod = new \SearchWP\Mod();
	$mod->set_local_table( $wpdb->posts );
	$mod->on( 'ID', [ 'column' => 'id' ] );
	$mod->relevance( function( $runtime ) use ( $wpdb ) {
		return "
			COALESCE( ROUND( ( (
				UNIX_TIMESTAMP( {$runtime->get_local_table_alias()}.post_date )
				- (
					SELECT UNIX_TIMESTAMP( {$wpdb->posts}.post_date )
					FROM {$wpdb->posts}
					WHERE {$wpdb->posts}.post_status = 'publish'
					ORDER BY {$wpdb->posts}.post_date ASC
					LIMIT 1
				)
			) / 86400 ), 0 ), 0 )";
	} );

	$mods[] = $mod;

	return $mods;

}

add_filter( 'searchwp\query\mods', 'csd_searchwp_mods' );

add_filter('acf/rest_api/emergency-alert/get_items', function( $data, $request ) {

  	foreach ( $data->data as $key=>$d ) {

		$data->data[$key]['acf']['alert_title'] = get_the_title( $d['id'] );
	
		$data->data[$key]['acf']['alert_image_url'] = wp_get_attachment_image_url( $d['acf']['alert_image'], 'News Image Medium', false );
	  	
 	}

  return $data;
  
}, 10, 2 );