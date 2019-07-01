<?php

class Cltvo_Page_Showroom extends Cltvo_Page
{
    public $gallery;

    function __construct(){
        parent::__construct(get_post( $GLOBALS['special_pages_ids']['showroom']));
    }

    public function setMetas()
    {
        $this->gallery = array_map(function($image) {
        	return new Cltvo_Img($image['imagen']);
        }, Cltvo_Galeria_Showroom::getMetaValue($this->post));
    }

}
