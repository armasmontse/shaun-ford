<?php

class Cltvo_Parent_Slider extends Cltvo_PostType_Master
{
	public $childs;

	function __construct($post_obj = false) 
	{
		parent::__construct($post_obj);

		$this->setChilds();
	}

	protected function setChilds()
	{
		$args = array(
			'post_parent' => $this->post->ID,
			'order' => 'ASC'
		);
		
		$this->childs = array_map(function($item) {
			return new Cltvo_Slider($item);
		}, get_children($args));
	}

	public function setMetas(){}

}
