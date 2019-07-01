<?php

require_once 'masters/Cltvo_Galeria.php';

class Cltvo_Galeria_Product extends Cltvo_Galeria {
    
    protected $post_type = 'cltvo_product';

    public static function metaboxDisplayRule(){
    	return true;
    }
 }
