<?php

class Cltvo_Page_Careers extends Cltvo_Page
{
    public $careers;
    public $subtitle;
    public $mail;

    function __construct(){
        parent::__construct(get_post( $GLOBALS['special_pages_ids']['careers']));

        $this->setCareers();
    }

    protected function setCareers()
    {
        $query = new WP_Query(array(
                    'post_type' => 'cltvo_career',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                ));

        $this->careers = array_map(function($career){
            return new Cltvo_Career($career);
        }, $query->posts);
    }

    public function setMetas()
    {
        $this->subtitle = Cltvo_Subtitle::getMetaValue($this->post);
        $this->mail = Cltvo_Mail::getMetaValue($this->post);
    }

}
