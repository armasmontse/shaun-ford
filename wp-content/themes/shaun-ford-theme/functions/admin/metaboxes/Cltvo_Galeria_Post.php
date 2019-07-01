<?php

require_once 'masters/Cltvo_Galeria.php';

class Cltvo_Galeria_Post extends Cltvo_Galeria
{    
    protected $post_type = 'post';

    public static function metaboxDisplayRule()
    {
    	return true;
    }
}
