<div id="sidebar-first">
	<div class="navbar navbar-default" role="navigation">
		<?php 
		
		if ( is_page_template( 'page-parent.php' ) ): ?>
			
			<div class="block-menu">
		
		<?php 
		
		endif;
		
		if($post->post_parent):
		  
		  	$parents = get_post_ancestors( $post->ID );

		  	if ( empty($parents) || count($parents) == 1 ):
		  		$root_page_id = $post->ID;
		  		$titlenamer = get_the_title($post->ID);
		  	else:
		  		$x = $post->ancestors;
		  		end($x);
		  		$root_page_id = prev($x);
		  		$titlenamer = get_the_title($root_page_id);
		  	endif;
		  		
		  	
			$walker = new Razorback_Walker_Page_Selective_Children();
			$children = wp_list_pages( array(
			    'title_li' => '',
			    'child_of' => $root_page_id,
			    'walker' => $walker,
			    'echo'	=> 0,
			    'sort_column' => 'post_title'
			));
			
		else:
			$children = wp_list_pages( array (
				'title_li' => '',
				'depth' => 1,
				'child_of' => $post->ID,
				'echo' => 0,
				'sort_column' => 'post_title'
			));
			
			$root_page_id = $post->ID;
			$titlenamer = get_the_title($post->ID);
		
		endif;
			  
		if ($children): ?>
		
		<div class="navbar-header d-block d-lg-none w-100">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-1x fa-chevron-down"></i>
			</button>
			<h2>
				<span <?php if ( is_page_template( 'page-parent.php' ) ): ?> class="sidebar-parent-title" <?php endif; ?>><a href="<?php the_permalink($root_page_id); ?>"><?php echo $titlenamer; ?></a></span>
			</h2>
		</div>
		<h2 class="d-none d-lg-block w-100">
			<span<?php if ( is_page_template( 'page-parent.php' ) ): ?> class="sidebar-parent-title" <?php endif; ?>><a href="<?php the_permalink($root_page_id); ?>"><?php echo $titlenamer; ?></a></span>
		</h2>
		<div class="navbar-collapse collapse sidebar-navbar-collapse">
			<ul class="nav navbar-nav">
		  		<?php echo $children; ?>		  		
			</ul>
		</div>		
		
		<?php 
			
		endif; 
		
		if ( is_page_template( 'page-parent.php' ) ): ?>
		
		</div>
		
		<?php endif; ?>
		
	</div>
</div>