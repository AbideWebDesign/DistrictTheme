				<section id="footer-top" class="<?php echo ( is_page_template( 'page-full-width.php' ) ? 'bg-white' : 'bg-gray' ); ?> py-2">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-lg-3">
							
								<?php 
								
								$menu_location = 'footer-topmenu-col-1-1';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
								
								?>
								
								<h5><?php echo $menu_name; ?></h5>
								
								<?php 
								
								wp_nav_menu( array('theme_location' => 'footer-topmenu-col-1-1', 'items_wrap' => '<ul>%3$s</ul>' ));
								$menu_location = 'footer-topmenu-col-1-2';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
								
								?>
								
								<h5><?php echo $menu_name; ?></h5>
								
								<?php 
								
								wp_nav_menu( array('theme_location' => 'footer-topmenu-col-1-2', 'items_wrap' => '<ul>%3$s</ul>' )); 
								$menu_location = 'footer-topmenu-col-1-3';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
								
								?>
								
								<h5><?php echo $menu_name; ?></h5>
								
								<?php wp_nav_menu( array('theme_location' => 'footer-topmenu-col-1-3', 'items_wrap' => '<ul>%3$s</ul>' )); ?>
							
							</div>
							<div class="col-md-6 col-lg-3">
								
								<?php 
								
								$menu_location = 'footer-topmenu-col-2-1';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
								
								?>
								
								<h5><?php echo $menu_name; ?></h5>
								
								<?php wp_nav_menu( array('theme_location' => 'footer-topmenu-col-2-1', 'items_wrap' => '<ul>%3$s</ul>' )); ?>
							
							</div>
							<div class="col-md-6 col-lg-3 footer-top-section">
								
								<?php 
								
								$menu_location = 'footer-topmenu-col-3-1';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
								
								?>
								
								<h5><?php echo $menu_name; ?></h5>
								
								<?php 
								
								wp_nav_menu( array('theme_location' => 'footer-topmenu-col-3-1', 'items_wrap' => '<ul>%3$s</ul>' ));
								$menu_location = 'footer-topmenu-col-3-2';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');

								?>
								
								<h5><?php echo $menu_name; ?></h5>
								
								<?php wp_nav_menu( array('theme_location' => 'footer-topmenu-col-3-2', 'items_wrap' => '<ul>%3$s</ul>' )); ?>
							
							</div>
							<div class="col-md-6 col-lg-3">
								
								<?php 

								$menu_location = 'footer-topmenu-col-4-1';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');

								?>
								
								<h5><?php echo $menu_name; ?></h5>
								
								<?php wp_nav_menu( array('theme_location' => 'footer-topmenu-col-4-1', 'items_wrap' => '<ul>%3$s</ul>' )); ?>
								
								<h5>District Information</h5>
								<p>District Office<br>
								
									<?php the_field('district_office_address_street', 'options'); ?><br>
								
									<?php the_field('district_office_city', 'options'); ?> Oregon, <?php the_field('district_office_zip', 'options'); ?></p>
								
									<p><?php the_field('district_office_phone', 'options'); ?> - Office<br>
								
									<?php the_field('district_office_fax', 'options'); ?> - Fax<br>
								
									<a href="mailto:<?php the_field('district_office_email', 'options'); ?>" target="_blank"><?php the_field('district_office_email', 'options'); ?></a>
								</p>

							</div>						
						</div>
					</div>
				</section>
				<section id="footer-bottom" class="py-2">
					<div class="container">
						<div class="row">
							<div class="col-6 col-md-4 col-lg-2 mb-1">
								<a href="/"><img class="img-fluid" src="<?php the_field('logo', 'options'); ?>" alt="<?php bloginfo('name'); ?>" /></a>						
							</div>
							<div class="col-lg-5">
								
								<?php wp_nav_menu( array('theme_location' => 'footer-bottommenu', 'items_wrap' => '<ul class="list-unstyled">%3$s</ul>' )); ?>
								
								<div class="footer-text pt-1"><?php the_field('harassment_statement', 'options'); ?></div>
								<p class="footer-text pt-2">
									&#169; Corvallis School District. Corvallis, Oregon 97333
								</p>
							</div>
							<div class="col-lg-5">
								<div class="text-xs text-white">
									<div class="footer-text"><?php the_field('non_discrimination_statement', 'options'); ?></div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section id="footer-social" class="py-2">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 mb-1 mb-lg-0">
								<ul class="social-media-links">
									<p>Connect with Us</p>
									<li>
										<a href="https://www.twitter.com/csdnow" target="_blank" class="social">
											<i class="fab fa-twitter-square fa-2x"></i>
										</a>	
									</li>
									<li>
										<a href="https://www.facebook.com/csd509j" target="_blank" class="social">
											<i class="fab fa-facebook-square fa-2x"></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/corvallis.schools/" target="_blank" class="social">
											<i class="fab fa-instagram fa-2x"></i>
										</a>
									</li>
									<li>
										<a href="https://www.linkedin.com/company/corvallis-school-district-509j" target="_blank" class="social">
											<i class="fab fa-linkedin-square fa-2x"></i>
										</a>
									</li>
								</ul>
							</div>
							<div id="credits" class="col-lg-6 text-center text-lg-right">
								<a href="https://abidewebdesign.com" target="_blank">Website Design and Maintenance by Abide Web Design</a>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<div class="modal fade" id="modalNotification" tabindex="-1" role="dialog" aria-labelledby="modalNotification" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-dark py-3">
						<div class="d-flex w-100 h-100 justify-content-center">
							<i class="fas fa-external-link-alt fa-3x text-white"></i>
						</div>
					</div>
					<div class="modal-body p-2 text-center"><h3 class="mb-0"><?php the_field('external_link_notification', 'options'); ?></h3></div>
					<div class="modal-footer">
						<a id="externalLink" href="#" class="btn btn-dark btn-lg btn-block"><?php _e('Proceed','csd'); ?></a>
					</div>
				</div>
			</div>
		</div>
		<?php get_template_part('template-parts/content', 'pop-up'); ?>
		<?php wp_footer(); ?>
		<div id="google_translate_element" class="d-none"></div>
		<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script>
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	</body>
</html>