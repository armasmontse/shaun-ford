<?php

class Cltvo_Featured_Project extends Cltvo_Metabox_Master
{

    /**
     * sobre escribiendo los args del master
     */
    protected $description_metabox = "Featured project";
	protected $post_type = array("page"); // postypes
	protected $position = 'side'; // posicion
	// protected $prioridad = "default"; //prioridad
	// protected $ags = null; //args

    protected $projects = array();

    function __construct()
    {
        parent::__construct();

        $this->setProjects();
    }

    protected function setProjects()
    {
        $query = new WP_Query(array(
            'post_type' => 'cltvo_project',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        ));

        $this->projects = $query->posts;
    }


    /**
    * define el metodo dónde se mostrara el meta
    * @return boolean si es verdadero el meta sera desplegado en el admin en caso constrario no
    */
    public static function metaboxDisplayRule(){
        return isSpecialPage('projects');
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

        <select name="<?php echo $this->meta_key ?>" id="" style="width: 100%">
            <option value="">Select project</option>
            <?php foreach ($this->projects as $product): ?>
                <option value="<?php echo $product->ID ?>" <?php if ($this->meta_value == $product->ID): ?>selected="selected"<?php endif ?>>
                    <?php echo $product->post_title ?>
                </option>
            <?php endforeach ?>
        </select>

	<?php }



}
