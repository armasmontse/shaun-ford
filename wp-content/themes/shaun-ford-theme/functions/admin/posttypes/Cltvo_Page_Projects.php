<?php

class Cltvo_Page_Projects extends Cltvo_Page
{
    public $featured_project_id;

    function __construct()
    {
    	// Special page de proyectos.
        parent::__construct(get_post( $GLOBALS['special_pages_ids']['projects']));
    }

    public function setMetas()
    {
    	// Obtenemos el id del featured proyectos.
        $this->featured_project_id = Cltvo_Featured_Project::getMetaValue($this->post);
    }

    public function featuredProject()
    {
    	if (!empty($this->featured_project_id)) {
    		return new Cltvo_Project(get_post($this->featured_project_id));
    	}
    }
}
