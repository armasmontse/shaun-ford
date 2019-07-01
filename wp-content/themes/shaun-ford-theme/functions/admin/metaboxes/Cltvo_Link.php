<?php

class Cltvo_Link extends Cltvo_Metabox_Master
{

    /**
     * sobre escribiendo los args del master
     */
    protected $description_metabox = "Link";
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
            return isSpecialPage('home') || $post->post_parent == specialPage('home-vertical') || $post->post_parent == specialPage('home-horizontal');
        }
    }


    /**
     * define el metodo que inicializa el valor del meta
     */
    public static function setMetaValue($meta){
        $meta['text'] = isset($meta['text']) ? $meta['text'] : '';
        $meta['target'] = isset($meta['target']) ? $meta['target'] : '';
        return $meta;
    }


	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){ ?>

        <label for="target">Target</label>
        <input type="text" id="target" name="<?php echo $this->meta_key ?>[target]" value="<?php echo $this->meta_value['target'] ?>" style="width: 100%;">

        <label for="text">Text</label>
        <input type="text" id="text" name="<?php echo $this->meta_key ?>[text]" value="<?php echo $this->meta_value['text'] ?>" style="width: 100%;">

	<?php }



}
