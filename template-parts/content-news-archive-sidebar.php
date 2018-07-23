<?php

$args = array(
  'taxonomy' => 'news-category',
  'title_li' => ''
);

?>
<div id="sidebar-first" class="pull-left">
	<div class="navbar navbar-default" role="navigation">
		
		 
		
		
		
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-1x fa-chevron-down"></i>
			</button>
			<span class="visible-xs"><h2><span><a href="/news">News</a></span></h2></span>
		</div>
		<h2 class="hidden-xs"><span><a href="/news">News</a></span></h2>
		<div class="navbar-collapse collapse sidebar-navbar-collapse">
			<ul class="nav navbar-nav">
		  		<?php wp_list_categories( $args ); ?>
			</ul>
		</div>		
		
		
	</div>
</div>