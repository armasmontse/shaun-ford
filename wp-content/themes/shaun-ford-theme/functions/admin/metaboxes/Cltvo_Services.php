<?php

class Cltvo_Services extends Cltvo_Metabox_Master
{

    /**
     * sobre escribiendo los args del master
     */
    protected $description_metabox = "Services";
	protected $post_type = array('page'); // postypes
	// protected $position = "normal"; // posicion
	// protected $prioridad = "default"; //prioridad
	// protected $ags = null; //args


    /**
    * define el metodo dónde se mostrara el meta
    * @return boolean si es verdadero el meta sera desplegado en el admin en caso constrario no
    */
    public static function metaboxDisplayRule()
    {
        return isSpecialPage('services');
    }


    /**
     * define el metodo que inicializa el valor del meta
     */
    public static function setMetaValue($meta)
    {
        for ($i=0; $i < 4; $i++) { 
            $meta[$i]['title'] = isset($meta[$i]['title']) ? $meta[$i]['title'] : '';
            $meta[$i]['description'] = isset($meta[$i]['description']) ? $meta[$i]['description'] : '';
        }

        return $meta;
    }


	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){ ?>

        <?php for ($i=0; $i < 4; $i++): ?>

            <label for="">Title <?php echo $i+1 ?>:</label>
            <input type="text" name="<?php echo $this->meta_key ?>[<?php echo $i ?>][title]" value="<?php echo $this->meta_value[$i]['title'] ?>" style="width: 100%;">

            <label for="">Description <?php echo $i+1 ?>:</label>
            <textarea name="<?php echo $this->meta_key ?>[<?php echo $i ?>][description]" id="" cols="30" rows="10" style="width: 100%;"><?php echo $this->meta_value[$i]['description'] ?></textarea>

            <br><br>
    
        <?php endfor; ?>

	<?php }



}
