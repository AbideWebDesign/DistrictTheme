				<section id="footer-top" class="bg-gray padding-vertical-two" role="contentinfo">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-3 col-md-3">
							
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
							<div class="col-xs-12 col-sm-3 col-md-3">
								
								<?php 
								
								$menu_location = 'footer-topmenu-col-2-1';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
								
								?>
								
								<h5><?php echo $menu_name; ?></h5>
								
								<?php wp_nav_menu( array('theme_location' => 'footer-topmenu-col-2-1', 'items_wrap' => '<ul>%3$s</ul>' )); ?>
							
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3 footer-top-section">
								
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
							<div class="col-xs-12 col-sm-3 col-md-3">
								
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
				<section id="footer-bottom">
					<div class="container">
						<div class="row">
							<div class="col-sm-2 col-xs-8">
								<a href="/"><img class="img-responsive" src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" /></a>						
							</div>
							<div class="col-sm-5 col-xs-12">
								
								<?php wp_nav_menu( array('theme_location' => 'footer-bottommenu', 'items_wrap' => '<ul class="list-unstyled">%3$s</ul>' )); ?>
								
								<p class="footer-text padding-top-one">
									Report bullying, harassment or intimidation at your school. The Harassment, Intimidation and Bullying Compliance Officer is <a href="mailto:kevin.bogatin@corvallis.k12.or.us" target="_blank">Kevin Bogatin</a>. The Title IX Compliance Officer is <a href="mailto:jennifer.duval@corvallis.k12.or.us" target="_blank">Jennifer Duvall</a>. The Section 504 & ADA Compliance Officer is <a href="mailto:rynda.gregory@corvallis.k12.or.us" target="blank">Rynda Gregory</a>.  
								</p>
								<p class="footer-text padding-top-two">
									&#169; Corvallis School District. Corvallis, Oregon 97333
								</p>
							</div>
							<div class="col-sm-5 col-xs-12">
								<p class="footer-text"><?php the_field('statement', 'options'); ?> <?php the_field('statement_contact_name', 'options'); ?> <?php the_field('statement_contact_title', 'options'); ?>, <a href="mailto:<?php the_field('statement_contact_email', 'options'); ?>" target="_blank"><?php the_field('statement_contact_email', 'options'); ?></a> <?php the_field('statement_contact_phone', 'options'); ?> </p>
							</div>
						</div>
					</div>
				</section>
				<section id="footer-social" class="padding-vertical-two">
					<div class="container">
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<ul class="social-media-links">
									<p>Connect with Us</p>
									<li>
										<a href="https://www.twitter.com/SuptNoss" target="_blank" class="social">
											<i class="fa fa-twitter-square fa-2x"></i>
										</a>	
									</li>
									<li>
										<a href="https://www.facebook.com/csd509j" target="_blank" class="social">
											<i class="fa fa-facebook-square fa-2x"></i>
										</a>
									</li>
									<li>
										<a href="https://www.linkedin.com/company/corvallis-school-district-509j" target="_blank" class="social">
											<i class="fa fa-linkedin-square fa-2x"></i>
										</a>
									</li>
								</ul>
							</div>
							<div id="credits" class="col-sm-6 col-xs-12 text-right">
								<a href="https://abidewebdesign.com" target="_blank">Website Designed and Maintained by Abide Web Design</a>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	
		<?php wp_footer(); ?>
		<div id="google_translate_element" class="hidden"></div>
		<script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script>
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	</body>
</html>