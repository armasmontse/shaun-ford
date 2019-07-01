<?php

class Cltvo_Page_Services extends Cltvo_Page
{
    public $services;

    function __construct(){
        parent::__construct(get_post( $GLOBALS['special_pages_ids']['services']));
    }

    public function setMetas()
    {
        $this->services = Cltvo_Services::getMetaValue($this->post);
    }

}
