<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}



function c_shortcode_version(){
    $my_theme = wp_get_theme( 'nickporsche' );
    if ( $my_theme->exists() ){
        return $my_theme->get( 'Version' );
    }
    return 1.0;
}
add_shortcode( 'wp_version', 'c_shortcode_version' );



function c_register_maim_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'c_register_maim_menu' );

function c_remove_gutenberg() {
        remove_post_type_support( 'page', 'editor' );
        remove_post_type_support( 'post', 'editor' );
        remove_post_type_support( 'people', 'editor' );
}
add_action( 'init', 'c_remove_gutenberg' );

function writy_setup() {
    add_theme_support( 'align-wide' );
    add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'writy_setup' );


function cc_mime_types($mimes = [] ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types' );


/*
    Adds custom CSS to admin
*/
function my_custom_admin_css() {
    echo '<style>
    [data-name="site_container"] .acf-fc-layout-handle{
        color: white!important;
        background-color: #0073aa;
    }
    </style>';
}
add_action('admin_head', 'my_custom_admin_css');



/*
    Custom admin comlums for race PT
*/
function gigs_table_head( $defaults ) {
    
    $r_header = array();
    $r_header['cb'] = $defaults['cb'];
    $r_header['title'] = $defaults['title'];
    $r_header['gig_location']    = 'Location';
    $r_header['gig_date']  = 'Date';
    $r_header['date'] = $defaults['date'];

    return $r_header;
}
add_filter('manage_gig_posts_columns', 'gigs_table_head');


function gigs_table_content( $column_name, $post_id  ){
    if ($column_name == 'gig_location') {
        echo get_field('post_gig_elements_gig_location', $post_id);
    }        
    if ($column_name == 'gig_date') {
        echo get_field('post_gig_elements_gig_date', $post_id);
    }
}
add_action( 'manage_gig_posts_custom_column', 'gigs_table_content', 10, 2 );


function gigs_table_default_order( $query ){

    // Default sort
    if( $query->query_vars['post_type'] == 'gig' && $query->is_main_query() && empty($query->query['orderby'])){

        $query->set( 'orderby', 'meta_value' );
        $query->set( 'meta_key', 'post_gig_elements_gig_date' );
        $query->set( 'order', 'DESC');
    }
    
    return $query;        
}
add_action('pre_get_posts', 'gigs_table_default_order');


/**
 * Theme includes
 *
 * Includes all files from the library directory.
 */
$dir = plugin_dir_path(__FILE__) . 'components';
foreach(new DirectoryIterator($dir) as $fileinfo) {
  if(!$fileinfo->isDot() && !$fileinfo->isDir() && substr($fileinfo->getFilename(), 0, 1) != '.') {
    $file = basename(dirname($fileinfo->getRealPath())) . '/' . $fileinfo->getFilename();
    require_once $file;
  }
}
unset($dir, $fileinfo, $file);
