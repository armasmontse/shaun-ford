<?php

class Cltvo_Product extends Cltvo_PostTypeCustom_Master
{

    const nombre_plural = 'Products';
    const nombre_singular = 'Product';
    const slug = 'products/%product_category%';

    public $gallery_ids;

// args
	// const publico = true;
	// const publicly_queryable = true;
	// const show_ui = true;
	// const show_in_menu = true;
	// const query_var = true;
	// const capability_type = 'post';
	// const has_archive = true;
	// const hierarchical = false;
	// const menu_position = 6;
	// protected static $supports = array( 'title', 'editor');


    public function setMetas()
    {
    	$this->gallery_ids = Cltvo_Galeria_Product::getMetaValue($this->post);
    }

    public function gallery()
    {
    	return array_map(function($image) {
    		return new Cltvo_Img($image['imagen']);
    	}, $this->gallery_ids);
    }

}
