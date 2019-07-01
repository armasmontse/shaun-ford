<?php

class Cltvo_Project_Taxonomy extends Cltvo_Taxonomy_Master
{

    const nombre_plural = 'Project categories';
    const nombre_singular = 'Project category';
    const slug = 'projects';

// args
    //const hierarchical = true; // padres eh hijos
    //const show_ui = true; // muestra para administracion
    //const query_var = true;
    //const show_admin_column = true; // columna en el administrador del port
    protected static $postypes = array('cltvo_project');

// terms iniciales
    protected static $initialTerms = array(
        "featured" => "Featured"
    );

}
