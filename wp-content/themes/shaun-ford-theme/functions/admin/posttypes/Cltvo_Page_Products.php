<?php

class Cltvo_Page_Products extends Cltvo_Page
{
    public $featured_product_id;
    public $current_term_id;

    const TAXONOMY = 'Cltvo_Product_Taxonomy';

    function __construct()
    {
    	// Special page de productos.
        parent::__construct(get_post( $GLOBALS['special_pages_ids']['products']));
    }

    public function setMetas()
    {
    	$current_term = get_term_by('slug', get_query_var(self::TAXONOMY), self::TAXONOMY);

    	// Obtenemos el current term.
    	$this->current_term_id = !empty($current_term) ? $current_term->term_id : null;

    	// Obtenemos el id del featured product.
        $this->featured_product_id = Cltvo_Featured_Product::getMetaValue($this->post);
    }

    public function terms()
    {
    	// Obtenemos todos los terms que no sean featured.
    	$terms = array_filter(get_terms(self::TAXONOMY), function($term) {
    		return $term->slug != 'featured';
    	});

    	// Mapeamos el objeto term para obtener el id y saber si es current.
    	return array_map(function($term) {
    		return (object) [
    			'term' => $term,
    			'permalink' => get_term_link($term->term_taxonomy_id, self::TAXONOMY),
    			'current' => $this->current_term_id == $term->term_id
    		];
    	}, $terms);
    }

    public function featuredProduct()
    {
    	if (!empty($this->featured_product_id)) {
    		return new Cltvo_Product(get_post($this->featured_product_id));
    	}
    }

    public function featuredTerm()
    {
    	$term = get_term_by('slug', 'featured', self::TAXONOMY);
		

    	return (object) [
			'term' => $term,
			'permalink' => get_term_link($term->term_taxonomy_id, self::TAXONOMY),
			'current' => $this->current_term_id == $term->term_id
    	];
    }
}
