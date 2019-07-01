<?php

require_once 'masters/Cltvo_Galeria.php';

class Cltvo_Galeria_Project extends Cltvo_Galeria {
    
    protected $post_type = 'cltvo_project';

    public static function metaboxDisplayRule(){
    	return true;
    }
 }
