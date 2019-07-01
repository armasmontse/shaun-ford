<?php

class Cltvo_Slider extends Cltvo_PostType_Master
{
	public $position;
	public $subtitle;
	public $link;

    public function setMetas()
    {
        $this->position = Cltvo_Content_Position::getMetaValue($this->post);
        $this->subtitle = Cltvo_Subtitle::getMetaValue($this->post);
        $this->link = Cltvo_Link::getMetaValue($this->post);
    }

}
