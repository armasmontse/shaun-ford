<?php

class Cltvo_Page_Journal extends Cltvo_Page
{
	public $open = false;

    function __construct()
    {
        parent::__construct(get_post( $GLOBALS['special_pages_ids']['journal']));
    }

    public function setMetas()
    {
    	$this->open = Cltvo_Open_Journal::getMetaValue($this->post) == 'true' ? true : false;
    }

    // The current issue.
    public function issue()
    {
    	$id = Cltvo_Current_Issue::getMetaValue($this->post);

    	$args = array(
            'post_type' => 'cltvo_issue',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );

    	if (!empty($id)) {
    		$args = array_merge($args, array('p' => $id));
    	}

        $query = new WP_Query($args);

        if (!empty($query->posts[0])) {
        	return new Cltvo_Issue($query->posts[0]);
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
