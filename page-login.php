<?php
/**
 * Template Name: Login 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage CSD
 * @since CSD 1.0
 */

if ( is_user_logged_in() ):
	wp_redirect(home_url() . '/wp-admin');
	exit;	
endif;

get_header(); ?>

<div id="primary" class="content-area py-3">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3 well">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
			
					if ( ! is_user_logged_in() ): // Display WordPress login form:
					
					?>
					
					<h2 class="text-center pb-1">Sign in</h2>
					
					<?php if(isset($_GET['login']) && $_GET['login'] == 'failed'): ?>
					
						<div class="alert alert-danger">	
							<strong>ERROR</strong>: Your Username and Password combination is incorrect.
						</div>
						
					<?php endif; ?>
					
					<?php 
					    $args = array(
					        'redirect' => home_url() . '/wp-admin', 
					        'form_id' => 'loginform',
					        'label_username' => __( 'Username' ),
					        'label_password' => __( 'Password' ),
					        'label_remember' => __( 'Remember Me' ),
					        'label_log_in' => __( 'Sign in' ),
					        'remember' => true
					    );
					    
					    wp_login_form( $args );
					
						?>
						
						<p class="meta text-center pt-1"><a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Forgot password?</a></p>

					<?php
					
					else: // If logged in:
						wp_redirect( home_url() ); exit;
							//redirect logged in users to home page
				
					
					endif;
		
				endwhile;
				
				?>
			</div>
		</div>			
	</div>		
</div>
<?php get_footer(); ?>