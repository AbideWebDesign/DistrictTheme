<?php $counter = 0; ?>

<?php if ( have_rows( 'tabs' ) ): ?>

	<div class="wrapper-tabs pb-2">
		
		<ul class="nav nav-tabs" role="tablist">
			
	        <?php while ( have_rows( 'tabs' ) ): ?> 
	            
	            <?php the_row(); ?>
	
	            <?php $title = get_sub_field( 'title' ); ?>
	                        	            
	            <li class="nav-item" role="presentation">
	            	
					<a href="#" id="tab-<?php echo $counter; ?>" class="nav-link<?php echo $counter == 0 ? ' active' : ''; ?>" role="tab" data-toggle="tab" data-target="#id_<?php echo $counter; ?>" aria-controls="#id_<?php echo $counter; ?>"><?php echo $title; ?></a>
	                    	            
	            </li>
	            
	            <?php $counter ++; ?>
		            	        
		    <?php endwhile; ?>
		    
		</ul>
	    
	    <?php $counter = 0; ?>
	    
	    <div class="tab-content pt-2">
	    
		    <?php while ( have_rows( 'tabs' ) ): ?> 
	            
	            <?php the_row(); ?>
				
				<?php $content = get_sub_field('content'); ?>
				
				<div id="id_<?php echo $counter; ?>" class="tab-pane fade<?php echo $counter == 0 ? ' show active' : ''; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $counter; ?>">
					   
					<?php echo $content; ?>
					
					<?php if ( get_sub_field('table') ): ?>
					
						<?php get_template_part( 'template-parts/page-block', 'table' ); ?>
					
					<?php endif; ?>
							
				</div>
						            		        
		        <?php $counter++; ?>
		        
	        <?php endwhile; ?>
        
        </div>
			        
    </div>
    
<?php endif; ?>