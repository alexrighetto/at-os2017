<?php

/*
Single Post Template: [Descriptive Template Name]
Description: This part is optional, but helpful for describing the Post Template
*/
?>


<?php get_header('single-product'); ?>


<div id="content">

	<?php 

		the_post(); 
		$post_id = translated_id ( get_the_id() );

		$temp_post = $post;

		if(function_exists('atos_get_cat')){

			$atos_categoria = atos_get_cat($post_id);
			$atos_linea = atos_get_cat($post_id, 'linea');
			$atos_modello = atos_get_cat($post_id, 'modello');
			$atos_versione = atos_get_cat($post_id, 'versione');

		}
	?>


	<div id="scheda-prodotto">
	
		<footer class="product_info">
	
			<div class="breadcrumbs">
				<?php  atos_product_breadcrumbs($post_id); ?>
        	</div>
        	<?php get_template_part( 'parts/nav', 'prodotti' ); ?>
        
		</footer>   
		
		<div class='menu-product'>
			<?php bellows( 'main' , array( 'theme_location' => 'product-menu' ) ); ?>
		</div>
	
   
   
  
    <div id="scheda-dettagli">
    
     <!--
    
          <div id="carosello-prodotti-wrap">
            	
             <?php
			 
		
		
	
		$prodotti = array(
			'post_type' => 'prodotto',
			'posts_per_page' => '-1',
			'order' => 'ASC',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'categoria',
					'field' => 'id',
					'terms' =>  $atos_categoria['id']
				),
			
				array(
					'taxonomy' => 'linea',
					'field' => 'id',
					'terms' =>  $atos_linea['id']
					
				)
				,
				array(
					'taxonomy' => 'modello',
					'field' => 'id',
					'terms' => $atos_modello['id']
					
				),/*
				array(
					'taxonomy' => 'versione',
					'field' => 'slug',
					'terms' => array( 'automatica' )
					
				) */
			)
		);
		
			 $serie = new WP_Query($prodotti);
			
			
			if ( $serie->have_posts() ) :?>
       
		
			
           
                
                
                
            	<div id="carosello-modelli">
            	   <div class="owl-carousel owl-theme"  >
                   
                   <?php while ( $serie->have_posts() ) : $serie->the_post(); ?>
                   
                   		
						<div class=" <?php if ($post_id === translated_id( get_the_ID())){echo 'active';} ?>">

							<a class="product " data-container="body" rel="tooltip" data-toggle="tooltip" title="<?php echo get_the_title(); ?>" data-postid="<?php echo get_the_ID() ?>"  href="<?php echo  get_permalink( translated_id ( get_the_ID() ) ); ?>">

						<?php if(function_exists('immagine_carosello')) echo immagine_carosello(get_the_ID(), array(100, 240) );?>
							</a>
						</div>
                
                       
                        
                    
					<?php endwhile; ?>   
                    </div>
                </div>   
                
               
                
                <?php
				wp_reset_postdata();
				
			 endif;
				 
				 $post = $temp_post;
				
				 ?>
                
            </div>
            
            
            
            
            -->
            

    	
        <div id="img-prodotto" class="zoom">
   			<?php if(function_exists('immagine_carosello')) echo immagine_carosello($post_id, array(379, 450) );?>
		</div>
        
  
        	
            <div id="dati-prodotto">
            	<h1><?php the_title(); ?></h1>
                
                <div id="desc-prodotto">
                	<h5><?php echo __('Description', 'at-os'); ?></h5>
                	<p><?php the_content(); ?></p>
                    
                   <!-- <?php if ($atos_versione['slug'] == 'automatica') { ?><span class="label label-warning"><?php echo __('Automatic', 'at-os'); ?></span> <?php } ?> -->
                </div>
                
                <div id="misure-small">
                	<?php
					
					
					$axl_atos_peso 					= get_post_meta( $post_id, 'axl_atos_peso', 			true );
					$axl_atos_larghezza 			= get_post_meta( $post_id, 'axl_atos_larghezza', 		true );
					$axl_atos_profondità 			= get_post_meta( $post_id, 'axl_atos_profondità', 		true );
					$axl_atos_altezza 				= get_post_meta( $post_id, 'axl_atos_altezza', 			true );
					$axl_atos_acessori				= get_post_meta( $post_id, 'axl_atos_pages', 			false );
					?>
                	<h5><?php echo __('Technical features', 'at-os'); ?></h5>
                      <table class="product-info table">
						<?php if( isset($axl_atos_peso) && $axl_atos_peso !== ' ') {?><tr>
						<th scope="row"><?php echo __('Weight', 'at-os'); ?></th>
						<td>kg</td>
						<td><?php  echo $axl_atos_peso; ?></td>
						</tr>
						<tr>
                        <?php } ?>
						<th scope="row"><?php echo __('Width', 'at-os'); ?></th>
						<td>mm</td>
						<td><?php  echo $axl_atos_larghezza; ?></td>
						</tr>
						<tr>
						<th scope="row"><?php echo __('Dept', 'at-os'); ?></th>
						<td>mm</td>
						<td><?php  echo $axl_atos_profondità; ?></td>
						</tr>
						<tr>
						<th scope="row"><?php echo __('Height', 'at-os'); ?></th>
						<td>mm</td>
						<td><?php  echo $axl_atos_altezza; ?></td>
						</tr>
                    </table>
                </div>
               
				
                <div class="brochure-download">
                <?php 
					$axl_at_os_brochure_args = array(
													'post_type' => 'documentazione',
													'tax_query' => array(
														array(
															'taxonomy' => 'linea',
															'field' => 'slug',
															'terms' =>  $atos_linea['slug'],
														)
													)
													
												);
					$axl_at_os_brochure_query = new WP_Query( $axl_at_os_brochure_args );
					
					   
				?>	
					
				  <?php while ( $axl_at_os_brochure_query->have_posts() ) : $axl_at_os_brochure_query->the_post(); ?>
                  
                  
                   
                   <?php
				 	 $files = rwmb_meta( 'axl_atos_brochure', 'type=file' );
					    
						foreach ( $files as $info )
						{
							
						if( rwmb_meta( 'axl_atos_inpage', 'type=checkbox' )){
							?> <div class="item-download">
                            <h5><?php the_title(); ?></h5><?php
							echo "<a href='{$info['url']}' title='{$info['title']}' target='_blank'>" . get_the_post_thumbnail( get_the_id() , array(200, 200)) ."</a>";
						?>   </div><?php
						}
						
						}
					?>
                   
                  
                  
				  <?php endwhile; ?>
                  
                </div>
                </div>
                
                
                
          
        
        <!--<ul id="nav-prodotto" class="clearfix">
        	
            <li><a rel="popup" href="<?php $image =  wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full');  echo $image[0]?>" ><i class="fa fa-arrows-alt"></i> <?php echo __('Fullscreen', 'at-os'); ?></a></li>
            <li><a href=""></a></li>
        </ul>
        -->
        
        <div id="scheda-accessori">
			<h5><?php _e('Accessories', 'at-os'); ?></h5>
        	<?php
			
			
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
					
					echo '<div class="owl-carousel accessori_list owl-theme">';
					while ( $query->have_posts() ) {
						$query->the_post();
						
				
						
						echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
						
						
						
					}
				echo '</div>'; ?>
				
				<?php }
				
				wp_reset_postdata();
                    ?>
                    
        
        </div>
              
            </div>
            
        </div>
		<?php 
		atos_get_tutti_i_dati ($post_id); 
		
		atos_get_caratterisitche ($post_id);
		
		atos_get_download ($post_id);
		?>
    
    </div>
    
    
		
</div>
	
<?php get_footer(); ?>