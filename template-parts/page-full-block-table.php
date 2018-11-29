<div id="table-block" class="pt-1 pb-2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="text-block-wrap">
					<div class="text-block-content">
						<h2 class="mb-1"><?php the_sub_field('table_section_heading'); ?></h2>
						<?php if(get_sub_field('table_section_text')): ?>
							<?php the_sub_field('table_section_text'); ?>
						<?php endif; ?>
						<div class="table-responsive">
						<?php 
							$table = get_sub_field( 'table' );
							
							if ( $table ) {
							
							    echo '<table class="table mb-1">';
							
							        if ( $table['header'] ) {
							
							            echo '<thead>';
							
							                echo '<tr>';
							
							                    foreach ( $table['header'] as $th ) {
							
							                        echo '<th>';
							                            echo $th['c'];
							                        echo '</th>';
							                    }
							
							                echo '</tr>';
							
							            echo '</thead>';
							        }
							
							        echo '<tbody>';
							
							            foreach ( $table['body'] as $tr ) {
							
							                echo '<tr>';
							
							                    foreach ( $tr as $td ) {
							
							                        echo '<td>';
							                            echo $td['c'];
							                        echo '</td>';
							                    }
							
							                echo '</tr>';
							            }
							
							        echo '</tbody>';
							
							    echo '</table>';
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>