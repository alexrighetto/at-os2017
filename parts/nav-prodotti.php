<?php
if(function_exists('atos_get_cat') && !isset($atos_linea) ){

		$post_id =  translated_id( get_the_ID());
		if ( $post_id == ''){
		$post_id = absint($_REQUEST['post_id']);
	}
	$atos_linea = atos_get_cat($post_id, 'linea');
}

?>
<div class="sub_menu_products">
<ul class='menu-orizontal'>
   	<li><a href="#caratteristiche"><?php _e('Features', 'at-os'); ?></a></li>
    <li><a href="<?php echo add_query_arg( 'l', $atos_linea['id'], get_permalink( translated_id (  947 ) ) ); ?>"><?php _e('Download', 'at-os'); ?></a></li>
	</ul>
</div>