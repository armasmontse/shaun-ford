<?php

class Cltvo_Page_Journal_Archive extends Cltvo_Page
{
	public $posts = array();

	public $terms = array();

    function __construct()
    {
        parent::__construct(get_post( $GLOBALS['special_pages_ids']['archive']));
    }

    public function setMetas()
    {
    	$this->posts = $this->posts();

    	$this->post_terms = array_map(function($term) {
    		$term->permalink = get_term_link($term);
    		return $term;
    	}, get_terms(array(
    		'taxonomy' => 'category',
    		'hide_empty' => true,
    	)));
    }

    // The current issue.
    public function posts()
    {
    	$args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );

    	$category = get_query_var('category_name');

        if (!empty($category)) {
        	$args = array_merge($args, array('category_name' => $category));
        }

        $query = new WP_Query($args);

        return array_map(function($post) {
        	return new Cltvo_Post($post);
        }, $query->posts);
    }

}
