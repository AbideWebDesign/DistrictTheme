<?php 

$links_col_1 = get_field('popular_pages_list', 'option'); 
$links_col_2 = get_field('popular_resources_list', 'option'); 

?>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="entry-content well">
			<h2><?php the_field('error_page_title', 'option'); ?></h2>
			<div class="entry-lead">
				<p class="lead"><?php the_field('error_page_message', 'option'); ?></p>
			</div>
			<div class="padding-bottom-two" id="search-form">
				<form role="search" id="sites-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
					 <label class="sr-only" for="search-text">Search</label>
					 <input type="text" class="search-field input-lg" id="search-text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">
					 <button type="submit" class="btn btn-primary btn-lg">Search</button>
				</form>
			</div>	
		</div>
	</div>
</div>
<div class="row entry-content padding-top-two">
	<div class="col-sm-3 col-sm-offset-1">
		<h3>Popular Pages</h3>
		<ul class="list list-flush">
			<?php foreach($links_col_1 as $link): ?>
				<li><a href="<?php echo $link->guid; ?>"><?php echo $link->post_title; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="col-sm-3">
		<h3>Popular Resources</h3>
		<ul class="list list-flush">
			<?php foreach($links_col_2 as $link): ?>
				<li><a target="_blank" href="<?php echo $link->guid; ?>"><?php echo $link->post_title; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="col-sm-4">
		<h3>District Information</h3>
		<p><?php the_field('contact_us_text', 'option'); ?></p>
		<?php the_field('district_office_address_street', 'options'); ?><br>
		<?php the_field('district_office_city', 'options'); ?> Oregon, <?php the_field('district_office_zip', 'options'); ?><br>		
		<?php the_field('district_office_phone', 'options'); ?> - Office<br>
		<?php the_field('district_office_fax', 'options'); ?> - Fax<br>
		<a href="mailto:<?php the_field('district_office_email', 'options'); ?>" target="_blank"><?php the_field('district_office_email', 'options'); ?></a>
	</div>
</div>