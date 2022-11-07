<?php 
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}


/****************************************************************************
 * Custom Blocks  
 ***************************************************************************/


add_action('acf/init', 'my_acf_init');
function my_acf_init()
{

	// check function exists
	if (function_exists('acf_register_block')) {

		// Hero Banner
		acf_register_block(array(
			'name'				=> 'herrobanner',
			'title'				=> __('herobanner'),
			'description'		=> __('Herro Banner.'),
			'render_template'	=> 'template-parts/blocks/herobanner/herobanner.php',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array('herobanner', 'banner'),
		));
		// Heading 2
		acf_register_block(array(
			'name'				=> 'text_block_1',
			'title'				=> __('Text Block 1'),
			'description'		=> __('Text Block 1 with Heading and text'),
			'render_template'	=> 'template-parts/blocks/util/textblock.php',
			'category'			=> 'formatting',
			'icon'				=> 'dashicons-text',
			'keywords'			=> array('Custom Text Block'),
		));
		// Image Box
		acf_register_block(array(
			'name'				=> 'image_box',
			'title'				=> __('image Box'),
			'description'		=> __('This is a image box with image and text'),
			'render_template'	=> 'template-parts/blocks/util/imagebox.php',
			'category'			=> 'formatting',
			'icon'				=> 'dashicons-screenoptions',
			'keywords'			=> array('image Box'),
		));
		// newsletter Block
		acf_register_block(array(
			'name'				=> 'news_letter',
			'title'				=> __('news Letter'),
			'description'		=> __('This is a news letter postype block'),
			'render_template'	=> 'template-parts/blocks/util/newsletter.php',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array('image Box'),
		));
	}
}


// Register Custom Post Type News Letter
function create_newsletter_cpt() {

	$labels = array(
		'name' => _x( 'News Letter', 'News Letter', 'textdomain' ),
		'singular_name' => _x( 'News Letter', 'News Letter', 'textdomain' ),
		'menu_name' => _x( 'News Letter', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'News Letter', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'News Letter Archives', 'textdomain' ),
		'attributes' => __( 'News Letter Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent News Letter:', 'textdomain' ),
		'all_items' => __( 'All News Letter', 'textdomain' ),
		'add_new_item' => __( 'Add New News Letter', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New News Letter', 'textdomain' ),
		'edit_item' => __( 'Edit News Letter', 'textdomain' ),
		'update_item' => __( 'Update News Letter', 'textdomain' ),
		'view_item' => __( 'View News Letter', 'textdomain' ),
		'view_items' => __( 'View News Letter', 'textdomain' ),
		'search_items' => __( 'Search News Letter', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into News Letter', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this News Letter', 'textdomain' ),
		'items_list' => __( 'News Letter list', 'textdomain' ),
		'items_list_navigation' => __( 'News Letter list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter News Letter list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'News Letter', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-text',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'newsletter', $args );

}
add_action( 'init', 'create_newsletter_cpt', 0 );

// adding page options 

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'redirect'    => false,
        ));
    }
}