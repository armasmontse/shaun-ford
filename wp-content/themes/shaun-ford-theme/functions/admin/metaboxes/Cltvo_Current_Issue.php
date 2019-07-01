<?php

class Cltvo_Current_Issue extends Cltvo_Metabox_Master
{

    /**
     * sobre escribiendo los args del master
     */
    protected $description_metabox = "Current issue";
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

		$query = new WP_Query(array(
	        'post_type' => 'cltvo_issue',
	        'post_status' => 'publish',
	        'posts_per_page' => -1,
	    ));

        ?> 

        	<select name="<?php echo $this->meta_key ?>" style="min-width: 200px;">
        		<?php if (!empty($query->posts)): ?>
        			<option value="">Select...</option>
        			<?php foreach ($query->posts as $post): ?>
        				<option value="<?php echo $post->ID; ?>" <?php if ($this->meta_value == $post->ID): ?>selected<?php endif ?>><?php echo $post->post_title; ?></option>
        			<?php endforeach ?>
        		<?php else: ?>
        			<option value="">There are no issues.</option>
        		<?php endif ?>
        	</select>

        <?php 

        wp_reset_query();

	}



}
