<?php 
global $adams;
if ( tribe_event_in_category( 'adams-elementary' ) ):
	$id = $adams;
endif;
?>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>Corvallis School District - <a href="<?php the_field('website', $id); ?>"><?php echo get_the_title($id); ?></a></p>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>