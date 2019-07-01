<?php 

$page_projects = new Cltvo_Page_Projects;

// Buscamos el featured project.
$project = $page_projects->featuredProject();

// Si no existe buscamos el primer proyecto.
if (is_null($project)) {

	$projects = get_posts(array(
		'posts_per_page' => 1,
		'post_type' => 'cltvo_project',
	));

	$project = new Cltvo_Project($projects[0]);

}

header("Location:" . $project->permalink );
die();