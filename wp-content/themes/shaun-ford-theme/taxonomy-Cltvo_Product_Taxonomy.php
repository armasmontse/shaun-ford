<?php

if (!empty($wp_query->posts)) {
	
	header("Location:" . get_post_permalink($wp_query->posts[0]->ID) );
	die();

}else {

	return404();

}

