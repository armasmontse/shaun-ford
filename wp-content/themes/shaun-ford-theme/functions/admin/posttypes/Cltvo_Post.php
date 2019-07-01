<?php

class Cltvo_Post extends Cltvo_PostType_Master
{
	public $post_content = "";

    public function setMetas()
    {
    	$this->content = Cltvo_Wpeditor::getMetaValue($this->post);
    }

    public function gallery()
    {
    	return array_map(function($image) {
    		return new Cltvo_Img($image['imagen']);
    	}, Cltvo_Galeria_Post::getMetaValue($this->post));
    }




    public function issue()
    {
    	$issue = Cltvo_Issue_Metabox::getMetaValue($this->post);

    	if (!empty($issue)) {

		    $query = new WP_Query(array(
		        'post_type' => 'cltvo_issue',
		        'post_status' => 'publish',
		        'posts_per_page' => -1,
		        'p' => $issue,
		    ));

		    if (!empty($query->posts[0])) {
		    	return new Cltvo_Issue($query->posts[0]);
		    }
    	}
    }

    public function __get($key)
    {
    	if (! $key) {
            return;
        }
        if (method_exists(self::class, $key)) {
            return $this->$key();
        }
        if (property_exists(self::class, $key)) {
        	return $this->$key;
        }
        return;
    }

    public function __isset($key)
    {
    	if(null === $this->__get($key)){
			return false;
		}
		return true;
    }
}
