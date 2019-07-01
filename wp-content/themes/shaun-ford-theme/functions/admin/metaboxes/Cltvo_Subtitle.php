<?php

class Cltvo_Subtitle extends Cltvo_Metabox_Master
{

    /**
     * sobre escribiendo los args del master
     */
    protected $description_metabox = "Subtitle";
	protected $post_type = array("page"); // postypes
	// protected $position = "normal"; // posicion
	// protected $prioridad = "default"; //prioridad
	// protected $ags = null; //args


    /**
    * define el metodo dónde se mostrara el meta
    * @return boolean si es verdadero el meta sera desplegado en el admin en caso constrario no
    */
    public static function metaboxDisplayRule()
    {
        if (isset($_GET['post'])) {
            $post = get_post($_GET['post']);
            return isSpecialPage('home') || isSpecialPage('careers') || $post->post_parent == specialPage('home-vertical') || $post->post_parent == specialPage('home-horizontal');
        }
    }


    /**
     * define el metodo que inicializa el valor del meta
     */
    // public static function setMetaValue($meta){
    //     return $meta;
    // }


	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){ ?>

        <input type="text" name="<?php echo $this->meta_key ?>" value="<?php echo $this->meta_value ?>" style="width: 100%;">

	<?php }



}
