<?php

class Cltvo_Product_Taxonomy extends Cltvo_Taxonomy_Master
{

    const nombre_plural = 'Product categories';
    const nombre_singular = 'Product category';
    const slug = 'products';

// args
    //const hierarchical = true; // padres eh hijos
    //const show_ui = true; // muestra para administracion
    //const query_var = true;
    //const show_admin_column = true; // columna en el administrador del port
    protected static $postypes = array('cltvo_product');

// terms iniciales
    protected static $initialTerms = array(
        "featured" => "Featured"
    );

}
