<?php

require_once 'masters/Cltvo_Galeria.php';

class Cltvo_Galeria_Issue extends Cltvo_Galeria
{    
    protected $post_type = 'cltvo_issue';

    public static function metaboxDisplayRule()
    {
    	return true;
    }
}
