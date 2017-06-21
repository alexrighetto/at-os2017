<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AT_OS_Products' ) ) {

	class AT_OS_Products {
		
		public function __construct() {
			add_filter( 'template_include', array( $this, 'product_page_template' ), 99 );
			add_shortcode( 	'button', array( $this,'atos_button_shortcode' ));
		}
		
		public function product_page_template( $template ) {
			
			if ( is_singular( 'prodotto' )  ) {
				

				if(function_exists('atos_get_cat')){

					$atos_categoria 	=  atos_get_cat(get_the_id());
					$lavastrumenti_ID 	=  translated_id(37, 'categoria');
					$lavapadelle_ID 	=  translated_id(36, 'categoria');
					$arredo_ID 			=  translated_id(45, 'categoria');
					$armadi_ID 			=  translated_id(44, 'categoria');

					switch( $atos_categoria[ 'id' ]) {

						case $lavastrumenti_ID:
						$product_category = 'lavastrumenti';
						break;										
						case $lavapadelle_ID:
						$product_category = 'lavapadelle';
						break;										
						case $arredo_ID:
						$product_category = 'arredo';
						break;					
						case $armadi_ID: 
						$product_category = 'armadi';
						break;

					}

					$new_template = locate_template( array( $product_category . '-page-template.php' ) );

					/*
					* se restituisce una stringa vuota
					*/
					
					if ( '' != $new_template ) {
							return $new_template ;
					}else{
						wp_die('errore');
					}
				}	
			}

			return $template;
		}
		
		
		function atos_get_cat($post_id, $taxonomy = 'categoria', $second_tax = 'categoria'){
	 
			$post_id = translated_id( $post_id, $taxonomy);

			$terms = get_the_terms( $post_id, $taxonomy ); 
			if(!empty($terms )){
			  if(!is_wp_error( $terms )){

				foreach ( $terms as $term ) {
					$atos_cat['name'] = $term->name;
					$atos_cat['id'] = $term->term_id;
					$atos_cat['slug'] = $term->slug;

				}
				return $atos_cat;
			  }
			}else{
			$terms = get_the_terms( $post_id, $second_tax ); 

			}

		 }
	}
	
	function atos_button_shortcode( $atts, $content = null ) {
	
	// Extract shortcode attributes
	extract( shortcode_atts( array(
		'href'    => '',
		'title'  => '',
		'target' => '',
		'text'   => '',
		'color'  => 'green',
	), $atts ) );
	// Use text value for items without content
	$content = $text ? $text : $content;
	// Return button with link
	if ( $href ) {
		$link_attr = array(
			'href'   => esc_url( $href ),
			'title'  => esc_attr( $title ),
			'target' => ( 'blank' == $target ) ? '_blank' : '',
			'class'  => 'button color-' . esc_attr( $color ),
		);
		$link_attrs_str = '';
		foreach ( $link_attr as $key => $val ) {
			if ( $val ) {
				$link_attrs_str .= ' '. $key .'="'. $val .'"';
			}
		}
		return '<a'. $link_attrs_str .'><span>'. do_shortcode( $content ) .'</span></a>';
	}
	// No link defined so return button as a span
	else {
		return '<span class="button"><span>'. do_shortcode( $content ) .'</span></span>';
	}
}

}

return new AT_OS_Products();	