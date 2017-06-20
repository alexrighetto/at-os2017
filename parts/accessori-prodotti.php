<div id="scheda-acessori">
        
        	<?php
			
			$post_id = get_the_id();
			if ( $post_id == ''){
			$post_id = absint($_REQUEST['post_id']);
			}
			
			$axl_atos_acessori	= get_post_meta( $post_id, 'axl_atos_pages', false );
			
			//print_r($axl_atos_acessori[0]);
			$args = array(
						'post_type' => 'acessori',
						'post__in' =>  $axl_atos_acessori[0],
						'orderby' => 'menu_order',
						'order' => 'ASC',
						
					);
					
			$query = new WP_Query($args);
				
				//print_r($query);
				if ( $query->have_posts() ) {
					
					echo '<div class="jcarousel acessori"><ul>';
					while ( $query->have_posts() ) {
						$query->the_post();
						
					
						echo '<li>';
						
						echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
						
						
						echo '</li>';
					}
				echo '</ul>
				
				</div>'; ?>
				<a href="#" class="jcarousel-control-prev" rel="tooltip" data-toggle="tooltip" data-placement="right" title="Acessori precedenti">&lsaquo;</a>
                <a href="#" class="jcarousel-control-next" rel="tooltip" data-toggle="tooltip" data-placement="left" title="Acessori sucessivi">&rsaquo;</a>
				<?php }
				
				wp_reset_postdata();
                    ?>
                    
        
        </div>