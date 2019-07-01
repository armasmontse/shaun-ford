<?php

class Cltvo_Open_Journal extends Cltvo_Metabox_Master
{

    /**
     * sobre escribiendo los args del master
     */
    protected $description_metabox = "Open journal";
	protected $post_type = array("page");
	protected $position = "side"; // posicion
	protected $prioridad = "high"; //prioridad
	// protected $ags = null; //args


    /**
    * define el metodo dónde se mostrara el meta
    * @return boolean si es verdadero el meta sera desplegado en el admin en caso constrario no
    */
    public static function metaboxDisplayRule()
    {
        return isSpecialPage('journal');
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
	public function CltvoDisplayMetabox( $object ){

		$options = array('true' => 'True', 'false' => 'False');

	    ?>

	    	<select name="<?php echo $this->meta_key ?>" style="min-width: 200px;">
				<?php foreach ($options as $key => $value): ?>
					<option value="<?php echo $key ?>" <?php if ($this->meta_value == $key): ?>selected<?php endif ?>><?php echo $value ?></option>
				<?php endforeach ?>
	    	</select>

	    <?php 

	}



}
