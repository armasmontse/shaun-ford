<?php

class Cltvo_Page_Contact extends Cltvo_Page
{
    public $social_net;

    public $instagram_photos;

    function __construct()
    {
        parent::__construct(
            get_post( $GLOBALS['special_pages_ids']['contact'])
        );

        $this->instagram_photos = getInstagramPhotos();
    }


    public function setMetas()
    {
        $this->social_net = Cltvo_SocialNet::getMetaValue($this->post);
    }

}
