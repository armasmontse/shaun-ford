<?php

class Cltvo_Content_Position extends Cltvo_Metabox_Master
{

    /**
     * sobre escribiendo los args del master
     */
    protected $description_metabox = "Content position";
	protected $post_type = array('page'); // postypes
	protected $position = 'side'; // posicion
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
    // public static function setMetaValue($meta){
    //     return $meta;
    // }


	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){ ?>

        <select name="<?php echo $this->meta_key ?>" style="width: 100%;">
            <option value="left" <?php if ($this->meta_value == 'left'): ?>selected="selected"<?php endif ?>>Left</option>
            <option value="right" <?php if ($this->meta_value == 'right'): ?>selected="selected"<?php endif ?>>Right</option>
            <option value="center" <?php if ($this->meta_value == 'center'): ?>selected="selected"<?php endif ?>>Center</option>
        </select>

	<?php }



}
