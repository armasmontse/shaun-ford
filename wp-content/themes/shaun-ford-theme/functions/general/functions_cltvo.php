<?php

/**
 * En este archivo se incluyen las Funciones de El Cultivo
 *
 * No agregar funciones del tema
 */

/** ==============================================================================================================
 *                                       Funciones de El Cultivo
 *  ==============================================================================================================
 */


/**
 * Clase para las imagenes del post que contiene el id de la imagen, la src, el tamaño y el alt
 *
 */

	include 'Classes/Cltvo_Img.php';

/**
 * regresa todas las imagenes del post con sus caracteristicas en un array
 *
 * Parametros:
 *
 * @param int $parentId id del post
 * @param boolean|array $exclude imagenes a ser excluidas (por defecto false)
 *
 * @return array con las imagenes y sus caracteristicas
 */

 function cltvo_todasImgsDelPost($parentId, $exclude= false){
	 $query_images_args = array(
	     'post_parent' => $parentId,
	     'post_type' => 'attachment',
	     'post_mime_type' =>'image',
	     'post_status' => 'inherit',
	     'posts_per_page' => -1
	 );

	 if( !empty($exclude) ){
	     $query_images_args['post__not_in'] = $exclude;
	 }

	 $query_images = get_posts( $query_images_args );
	 $images = array();
	 foreach ( $query_images as $image) {
	     $images[] = new Cltvo_Img($image->ID);
	 }
	 return $images;
 }

// ???
function cltvo_wpURL_2_path( $url ){
	$path = get_theme_root();
	$path = str_replace('wp-content/themes', '', $path);
	$path = str_replace(home_url('/'), $path, $url);
	return $path;
}

// modificacion de la funcion print_r
if( !function_exists('cltvo_print_r') ){
	function cltvo_print_r($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
		die;
	}
}

//convierte int a string con signo de pesos, con punto decimal y dos ceros al final
if( !function_exists('cltvo_dinero') ){
	function cltvo_dinero( $numero ){
		return '$ ' . number_format($numero, 2);
	}
}

/**
 * trae el permalink de una pagina especial
 * @param  string $slug slug de la pagina especial
 * @return string       url de la pagina
 */
function specialPagePermalink($slug) {
	return get_permalink( specialPage($slug) );
}

/**
 * verifica si la pagina especial existe
 * @param  string $slug slug de la pagina especial
 * @return boolean       generera una esepcion en caso de  que la pagia especial no exista
 */
function specialPageExists($slug){

	if (!isset( $GLOBALS['special_pages_ids'][$slug] ) ) {

		throw new Exception("Special page -- $slug -- not found");
	}

	return true;
}

/**
 * Trae las paginas especiales
 * @param  string  $slug   Slug de la página especial
 * @param  boolean $object Si se desea traer el un objeto o sólo el id
 * @return objeto o string
 */
function specialPage( $slug, $object = false )
{
	specialPageExists($slug);

	if ($object){
		return get_post($GLOBALS['special_pages_ids'][$slug]);
	}
	return $GLOBALS['special_pages_ids'][$slug];
}

/**
 * funcion auxuliar para las paginas especiales, verifica si la pagina a editar es una pagina especial
 * @param  string  $slug slug de la pagina a verificar
 * @return boolean      si se edita la pagina especual mencionada
 */
function isSpecialPage($slug)
{
	specialPageExists($slug);
	return isset($_GET['post']) && $_GET['post'] == specialPage($slug);
}

function is_active($slug)
{
	return strpos($_SERVER['REQUEST_URI'], $slug) !== false;
}

function return404()
{
	global $wp_query;
	$wp_query->set_404();
	status_header(404);
	get_template_part(404);
	exit();
}

function formatDate($date, $format = "Y/m/d H:i:s")
{
	return date_format(date_create($date), $format);
}

function includeWithVariables($filePath, $variables = array(), $print = true)
{
	$output = NULL;

	$filePath = get_stylesheet_directory() . $filePath;

	if(file_exists($filePath)){
	    // Extract the variables to a local namespace
	    extract($variables);

	    // Start output buffering
	    ob_start();

	    // Include the template file
	    include $filePath;

	    // End buffering and return its contents
	    $output = ob_get_clean();
	}
	if ($print) {
	    print $output;
	}
	return $output;
}

function inc($path)
{ 
	include get_stylesheet_directory() . '/inc/' . $path;
}
