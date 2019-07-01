<?php

require_once 'masters/Cltvo_Galeria.php';

class Cltvo_Galeria_Showroom extends Cltvo_Galeria {
    
    protected $post_type = 'page';

    public static function metaboxDisplayRule(){
    	return isSpecialPage('showroom');
    }
 }
