<?php 
require WP_CONTENT_DIR . '/plugins/plugin-update-checker-master/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/csd509j/DistrictTheme',
	__FILE__,
	'DistrictTheme'
);

$myUpdateChecker->setBranch('master'); 

function csd_enqueue_style() {
	$theme = wp_get_theme();
	wp_enqueue_style( 'theme', get_template_directory_uri() . '/style.css', '', $theme->version ); 
	wp_enqueue_style( 'print', get_template_directory_uri() . '/css/print.css', '', $theme->version ); 
	wp_enqueue_style( 'ie10-viewport-bug-workaround', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css' ); 
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' ); 
}
add_action( 'wp_enqueue_scripts', 'csd_enqueue_style', 100 );

function csd_enqueue_script() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, null );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap.min.js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', '', '', true );
	wp_enqueue_script( 'core.js', get_template_directory_uri() . '/assets/js/core.js', '', '', true );
	
	if ( is_page_template( 'page-calendar.php' ) || is_singular( 'tribe_events' ) || is_singular( 'news' ) || is_singular('tribe_venue') ) {
		wp_enqueue_script( 'addthis_widget.js', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56c3954e3471722a' );				
	}	
}
add_action( 'wp_enqueue_scripts', 'csd_enqueue_script' );

function csd_theme_setup() {
	add_theme_support('post-thumbnails');
	add_image_size('square', 600, 600, true);
	add_image_size('Square Column 3', 219, 219, true);
	add_image_size('Square Column 4', 266, 266, true);
	add_image_size('News Image Small', 262, 175, true);
	add_image_size('News Image Medium', 410, 273, true);
	add_image_size('News Image Large', 750, 500, true);
	add_image_size('News Image Featured', 945, 500, true);
	add_image_size('Staff Directory', 326, 453, true);
	add_image_size('Callout Block', 263, 186, true);
	add_image_size('Page Builder Image', 825, 315, true);
	add_image_size('eFriday Folder Image', 230, 298, true);
	add_image_size('Parent Header', 1600, 314, true);
	add_image_size('Home Slider', 1600, 500, true);
	add_image_size('Full Width', 1170);
	add_image_size('Text Block', 530, 640, true);
}
add_action( 'after_setup_theme', 'csd_theme_setup' );

// Custom CSS for Admin
add_action('admin_head', 'dashboard_styles');

function dashboard_styles() {
  echo '<style>
    /*
	** Plugin: Imagify
	*/
	.imagify-notice.imagify-notice {
		display: none !important;
	}
	
	/*
	** Plugin: SearchWP
	*/
	#searchwp-index-errors-notice {
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
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
if( function_exists('acf_add_options_sub_page') ) {
    acf_add_options_sub_page( 'General' );
    acf_add_options_sub_page( 'Pages' );
    acf_add_options_sub_page( 'Calendar' );
    acf_add_options_sub_page( 'Food Services' );
    acf_add_options_sub_page( 'eFriday Folders' );
    acf_add_options_sub_page( 'Footer' );
    acf_add_options_sub_page( '404 Page' );
}

function humanTiming ($time) {
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
  foreach ($tokens as $unit => $text) {
      if ($time < $unit) continue;
      $numberOfUnits = floor($time / $unit);
      return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
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
	$id = $value;
	if( ! is_numeric( $id ) ){
		$data = json_decode( stripcslashes($id), true );
		$id = $data['cropped_image'];
	}
	update_post_meta( $post_id, '_thumbnail_id', $id );
	return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter( 'acf/update_value/name=featured_image', 'acf_set_featured_image', 10, 3 );

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
		    'sort_column' => 'post_title'
		));
	} else {
		$parent_id = $post->ID;
		
		$children = wp_list_pages( array (
			'title_li' => '',
			'depth' => 1,
			'child_of' => $post->ID,
			'echo' => 0,
			'sort_column' => 'post_title'
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
