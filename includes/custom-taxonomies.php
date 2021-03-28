<?php
/**
 * Core Public Functions
 *
 * @package    Core_Functionality
 * @since      0.1.1
 * @license    GPL-2.0+
 */
namespace Core_Functionality\Custom_Taxonomies;

/**
 * Register Custom Taxonomy
 *
 * @return void
 */
function register_project_type() {

	$labels = array(
		'name'              => _x( 'Project Types', 'taxonomy general name', 'core-functionality' ),
		'singular_name'     => _x( 'Project Type', 'taxonomy singular name', 'core-functionality' ),
		'search_items'      => __( 'Search Project Types', 'core-functionality' ),
		'all_items'         => __( 'All Project Types', 'core-functionality' ),
		'parent_item'       => __( 'Parent Project Type', 'core-functionality' ),
		'parent_item_colon' => __( 'Parent Project Type:', 'core-functionality' ),
		'edit_item'         => __( 'Edit Project Type', 'core-functionality' ),
		'update_item'       => __( 'Update Project Type', 'core-functionality' ),
		'add_new_item'      => __( 'Add New Project Type', 'core-functionality' ),
		'new_item_name'     => __( 'New Project Type Name', 'core-functionality' ),
		'menu_name'         => __( 'Project Type', 'core-functionality' ),
	);
	$args = array(
		'labels' 				=> $labels,
		'description' 			=> __( '', 'core-functionality' ),
		'hierarchical' 			=> false,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'show_in_menu' 			=> true,
		'show_in_nav_menus' 	=> true,
		'show_tagcloud' 		=> true,
		'show_in_quick_edit' 	=> true,
		'show_admin_column' 	=> true,
		'show_in_rest' 			=> true,
		'rest_base' 			=> 'projects',
		'show_in_graphql'		=> true,
		'graphql_single_name' 	=> 'projectType',
		'graphql_plural_name'	=> 'projectTypes'
	);
	register_taxonomy( 'project_type', array( 'project' ), $args );

}
add_action( 'init', __NAMESPACE__ . '\register_project_type' );

/**
 * Register Portfolio Taxonomy to GraphQL
 * 
 * @param array $args
 * @param string $taxonomy
 * @return array $args maybe modified
 */
function register_taxonomy_args( $args, $taxonomy ) {
	if ( 'jetpack-portfolio-type' === $taxonomy ) {
		$args['show_in_graphql'] = true;
		$args['graphql_single_name'] = 'portfolioType';
		$args['graphql_plural_name'] = 'portfolioTypes';
	}
	
	if ( 'jetpack-portfolio-tag' === $taxonomy ) {
		$args['show_in_graphql'] = true;
		$args['graphql_single_name'] = 'portfolioTag';
		$args['graphql_plural_name'] = 'portfolioTags';
	}

	return $args;
}
\add_filter( 'register_taxonomy_args', __NAMESPACE__ . '\register_taxonomy_args', 10, 2 );
