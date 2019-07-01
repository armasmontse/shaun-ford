<?php 

$page_products = new Cltvo_Page_Products;

$featured = $page_products->featuredTerm();

if (!empty($featured)) {
	
	header("Location:" . $featured->permalink );
	die();

}else {

	return404();

}