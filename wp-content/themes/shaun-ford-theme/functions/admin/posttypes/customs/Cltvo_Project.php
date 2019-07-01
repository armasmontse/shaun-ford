<?php

class Cltvo_Project extends Cltvo_PostTypeCustom_Master
{

    const nombre_plural = 'Projects';
    const nombre_singular = 'project';
    const slug = 'projects';

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
	// protected static $supports = array( 'title', 'thumbnail');

    public function setMetas()
    {
    	$this->gallery_ids = Cltvo_Galeria_Project::getMetaValue($this->post);
    }

    public function gallery()
    {
    	return array_map(function($image) {
    		return new Cltvo_Img($image['imagen']);
    	}, $this->gallery_ids);
    }

}
