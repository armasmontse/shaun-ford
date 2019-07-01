<?php

class Cltvo_SocialNet extends Cltvo_Metabox_Master
{

    /**
    * sobre escribiendo las opcciones del master
    */
    protected $description_metabox = "Contact information";
    protected $post_type = "page";


    /**
    * proiedades de esta clase
    */
    protected static $redesConUrl = [
        'facebook' => 'Facebook:',
        'instagram' => 'Instagram:',
        // 'twitter' => 'Twitter:',
        // 'pinterest' => 'Pinterest:',
        // 'google' => 'Google plus:',
        // 'tumblr' => 'Tumblr:'
    ];

    protected static $redesSinUrl = [ 
        'mail' => 'Email:',
        'phone' => 'Phone:',
        'address' => 'Address:'
    ];




  /**
	 * define el metodo donde se mostrara el meta
	 * @return boolean si es verdadero el meta sera desplegado en el admin en caso constrario no
	 */
	public static function metaboxDisplayRule(){
		return isSpecialPage("contact");
	}


    /**
     * define el metodo que inicializa el valor del meta
     */
    public static function setMetaValue($meta){

        $meta = is_array($meta) ? $meta : [] ;

        foreach (self::$redesSinUrl as $red => $imagen) {
			$meta[$red] = isset($meta[$red]) ? $meta[$red] :  "";
		}

		foreach (self::$redesConUrl as $red => $imagen) {
			$meta[$red] = isset($meta[$red]) ? $meta[$red] :  array('cuenta'=> '', 'link'=> '');
		}

        return $meta;
    }


	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){ ?>

        <style>
            .ancho_100 {
                width: 100%;
            }
        </style>

        <table class="ancho_100">
            <tr>
                <td valign="top"><label for="">Phone:</label></td>
                <td valign="top" style="padding-bottom: 15px;">
                    <input type="text" placeholder="+(52 55) 5555 5555 " name="<?php echo  $this->meta_key; ?>[phone]" id="<?php echo  $this->meta_key; ?>[phone]" value="<?php echo $this->meta_value['phone']; ?>" class="ancho_100" />
                </td>
            </tr>
            <tr>
                <td valign="top"><label for="">Email:</label></td>
                <td valign="top" style="padding-bottom: 15px;">
                    <input type="email" placeholder="example@example.com" name="<?php echo  $this->meta_key; ?>[mail]" id="<?php echo  $this->meta_key; ?>[mail]" value="<?php echo $this->meta_value['mail']; ?>" class="ancho_100" />
                </td>
            </tr>
            <tr>
                <td valign="top"><label for="">Address:</label></td>
                <td valign="top" style="padding-bottom: 15px;">
                    <textarea name="<?php echo  $this->meta_key; ?>[address]" class="ancho_100" id="" cols="30" rows="10"><?php echo $this->meta_value['address']; ?></textarea>
                </td>
            </tr>
            <?php foreach (self::$redesConUrl as $slug => $nombre): ?>
            <tr>
                <td valign="top">
                    <label for=""><?php echo $nombre; ?></label>
                </td>
                <td valign="top" style="padding-bottom: 15px;">
                    <?php $this->social_network_link($slug); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    <?php }



    /**
     * Imprime los input de las redes sociales
     *
     * Parametros:
     *
     * @param string $slug slug de la red social
     * @param array $meta array con los valores link y cuenta
     */

    private function social_network_link($slug) { ?>
            
            <label for="<?php echo $this->meta_key."_".$slug; ?>_cuenta" >Account:</label><br>
            <input type="text"
                  placeholder="<?= $slug ?>"
                  name="<?php echo $this->meta_key."[".$slug."][cuenta]"; ?>"
                  id="<?php echo $this->meta_key."_".$slug; ?>_cuenta"
                  value="<?php echo $this->meta_value[$slug]['cuenta']; ?>"
                  class="ancho_100" />
            <br>
			<label for="<?php echo $this->meta_key."_".$slug; ?>_link" >Link:</label><br>
			<input type="url"
                    placeholder="http://"
                    name="<?php echo $this->meta_key."[".$slug."][link]"; ?>"
                    id="<?php echo $this->meta_key."_".$slug; ?>_link"
                    value="<?php echo $this->meta_value[$slug]['link']; ?>"
                    class="ancho_100" />

    <?php }

}
