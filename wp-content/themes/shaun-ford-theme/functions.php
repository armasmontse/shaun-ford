<?php
/** ==============================================================================================================
 *                                       Constantes y variables Globales
 *  ==============================================================================================================
 */
define( 'THEMEPATH', get_template_directory_uri() );
define( 'JSPATH', THEMEPATH . '/js/' );
define( 'CSSPATH', THEMEPATH . '/css/' ); // css para el adimin
define( 'BLOGURL', get_home_url('/') );
define( 'THEMEURL', get_bloginfo('template_url').'/' );

// $theme_info = wp_get_theme(); // inicializacion de la traduccion
// define( 'TRANSDOMAIN', $theme_info->template );


 // ---------------- paginas especiales
 // Hook que crea las paginas especificas o especiales de manera automatica

 include_once('functions/special_pages.php');

/** ==============================================================================================================
 *                                       Inluye los archivos generarles
 *  ==============================================================================================================
 */
// ---------------- scripts
// Contiene la llamada de los archivos functions.js y admin/functions.js asi como inclucion de valiables java

include_once('functions/general/scripts_js.php');

// ---------------- funciones cltvo
// Contiene las funciones generales del cultivo que son independeites de cada proyecto

include_once('functions/general/functions_cltvo.php');

// ---------------- flitros cltvo
// Contiene los filtros generales del cultivo que son independeites de cada proyecto

include_once('functions/general/filters_cltvo.php');




/** ==============================================================================================================
 *                                       Inluye los archivos de admin
 *  ==============================================================================================================
 */

// ---------------- personaizacion del menu
// Contiene las funciones para personalizar el menu del admin

include_once('functions/admin/menu.php');

// ---------------- imagenes de tamaños y opcciones personalizadas
// Contiene la funciones para personalizar los tamaños de la imagenes

include_once('functions/admin/images.php');

// ---------------- post type y taxonimias
// Contiene el registro de tipos de post persializados y configuracion del editor de los mismos

include_once('functions/admin/post_type.php');

// Contiene el registro de taxonomias personalizadas

include_once('functions/admin/taxonomies.php');

// ---------------- meta boxes y save post
// Contiene la inclucion de las metaboxes asi como las funciones del save post

include_once('functions/admin/metabox.php');

// ---------------- ajax del admin
// Contiene los funciones ajax  del admin

include_once('functions/admin/ajax.php');

/** ==============================================================================================================
 *                                         Inluye los archivos del tema
 *  ==============================================================================================================
 */

// ---------------- funciones del menu
// Contiene el menú del sitio y sus funciones

include_once('functions/theme/menu.php');

// ---------------- filtros del tema
// Contiene los filtros específicos del tema

include_once('functions/theme/filters.php');

// ---------------- funciones del tema
// Contiene los funciones específicas del tema

include_once('functions/theme/functions.php');

// ---------------- ajax del tema
// Contiene los funciones ajax especificas del tema

include_once('functions/theme/ajax.php');


/**
 * Tell WordPress how to interpret our project URL structure
 *
 * @param array $rules Existing rewrite rules
 * @return array
 */

function cltvo_rewrite_rules() {
	add_rewrite_rule('products/([^/]+)/([^/]+)/?$', 'index.php?Cltvo_Product_Taxonomy=$matches[1]&cltvo_product=$matches[2]', 'top');
	add_rewrite_rule('products/([^/]+)/?$', 'index.php?Cltvo_Product_Taxonomy=$matches[1]', 'top');
	
	add_rewrite_rule('journal/archive/([^/]+)/?$', 'index.php?post_type=post&category_name=$matches[1]', 'top');
	add_rewrite_rule('journal/archive/([^/]+)/([^/]+)/?$', 'index.php?post_type=post&category_name=$matches[1]&name=$matches[2]', 'top');
}
add_action('init', 'cltvo_rewrite_rules');

/**
 * Handle the '%project_category%' URL placeholder
 *
 * @param str $link The link to the post
 * @param WP_Post object $post The post object
 * @return str
 */
function cltvo_filter_post_type_link( $link, $post ) {
	if ( $post->post_type == 'cltvo_product' ) {
		if ( $cats = get_the_terms( $post->ID, 'Cltvo_Product_Taxonomy' ) ) {
			$replace = '';
			if (empty($term = get_query_var('Cltvo_Product_Taxonomy'))) {
				$replace = $cats[0]->slug;
			}else {
				$replace = $term;
			}
			$link = str_replace( '%product_category%', $replace, $link );
		}
	}
	return $link;
}
add_filter('post_type_link', 'cltvo_filter_post_type_link', 10, 2 );

function cltvo_filter_post_link( $link, $post ) {
	
	$post->terms = wp_get_post_terms($post->ID, 'category');

	if (!empty($post->terms)) {
		return home_url( 'journal/archive/' . $post->terms[0]->slug . '/' . $post->post_name );
	}
}
add_filter('post_link', 'cltvo_filter_post_link', 10, 2 );

function term_link_filter( $link, $term, $taxonomy) {
    if ($taxonomy == 'category') {
    	return home_url('journal/archive/' . $term->slug);
    }
    return $link;
}
add_filter('term_link', 'term_link_filter', 10, 3);


?>
