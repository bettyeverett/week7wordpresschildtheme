<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// add_filter ( 'the_title', 'filter_example' );

function filter_example($title) {
    return 'Hooked: '.$title;
}

add_action('init','create_custom_post_type_job'); // define event custom post type

function create_custom_post_type_job(){
    $labels = array(
        'name' => 'jobs',
        'singular_name' => 'job',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New job',
        'edit_item' => 'Edit job',
        'new_item' => 'New job',
        'view_item' => 'View job',
        'search_items' => 'Search jobs',
        'not_found' => 'No jobs found',
        'not_found_in_trash' => 'No jobs found in Trash',
        'parent_item_colon' => '',
    );
    
    $args = array(
        'label' => __('jobs'),
        'labels' => $labels, // from array above
        'public' => true,
        'can_export' => true,
        'show_ui' => true,
        '_builtin' => false,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-portfolio', // from this list
        'hierarchical' => false,
        'rewrite' => array( "slug" => "jobs" ), // defines URL base
        'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
        'show_in_nav_menus' => true,
        'taxonomies' => array( 'job_category', 'post_tag') // own categories
    );


    register_post_type('jobs', $args); // used as internal identifier
}

?>