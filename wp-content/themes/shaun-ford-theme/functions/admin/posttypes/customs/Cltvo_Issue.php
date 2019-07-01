<?php

class Cltvo_Issue extends Cltvo_PostTypeCustom_Master
{
    const nombre_plural = 'Issues';
    const nombre_singular = 'issue';
    const slug = 'journal/issues';

    public $is_current = false;

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
	protected static $supports = array( 'title', 'editor', 'thumbnail');

    public function setMetas()
    {
    	$current_issue = Cltvo_Current_Issue::getMetaValue(get_post( $GLOBALS['special_pages_ids']['journal']));

    	if ($this->post->ID == $current_issue) {
    		$this->is_current = true;
    		$this->permalink = specialPagePermalink('journal');
    	}
    }

    public function image()
    {
    	$gallery = array_map(function($image) {
    		return new Cltvo_Img($image['imagen']);
    	}, Cltvo_Galeria_Issue::getMetaValue($this->post));

    	if (!empty($gallery)) {
    		return $gallery[0];
    	}
    }

    public function posts()
    {
        $query = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_query' => array(
				array(
					'key' => 'Cltvo_Issue_Metabox',
					'value' => $this->post->ID,
					'compare' => '=',
				)
			)
        ));

        return array_map(function($post){
            return new Cltvo_Post($post);
        }, $query->posts);
    }

	public function __get($key)
	{
		if (! $key) {
	        return;
	    }
	    if (method_exists(self::class, $key)) {
	        return $this->$key();
	    }
	    if (property_exists(self::class, $key)) {
	    	return $this->$key;
	    }
	    return;
	}

	public function __isset($key)
	{
		if(null === $this->__get($key)){
			return false;
		}
		return true;
	}
}
