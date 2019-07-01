<?php

class Cltvo_Page_Home extends Cltvo_PostType_Master
{
	public $position;
	public $subtitle;
	public $link;
	public $horizontal;

	function __construct() 
	{
		parent::__construct(get_post( $GLOBALS['special_pages_ids']['home']));

		$this->setVertical();
		$this->setHorizontal();
	}

	protected function setVertical()
	{
		$this->horizontal = new Cltvo_Parent_Slider(get_post( $GLOBALS['special_pages_ids']['home-horizontal']));
	}

	protected function setHorizontal()
	{
		$this->vertical = new Cltvo_Parent_Slider(get_post( $GLOBALS['special_pages_ids']['home-vertical']));
	}

    public function setMetas()
    {
        $this->position = Cltvo_Content_Position::getMetaValue($this->post);
        $this->subtitle = Cltvo_Subtitle::getMetaValue($this->post);
        $this->link = Cltvo_Link::getMetaValue($this->post);
    }

}
