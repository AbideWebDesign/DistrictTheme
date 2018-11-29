<div class="table-responsive">
	<?php
	$table = get_sub_field( 'table' );
	
	if ( $table ) {
	
	    echo '<table class="table table-striped table-bordered mb-1">';
	
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