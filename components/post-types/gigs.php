<?php

// Namespace declaration
namespace NickPorsche\PostType;

use NickPorsche\PostTypes;

// Exit if accessed directly 
defined('ABSPATH') or die;

class Gig {

    private static $instance;

    public static function instance() {
        return self::$instance ?: (self::$instance = new self());
    }

    private function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {
        PostTypes::instance()->register_post_type('gig', 'dashicons-star-filled', [
            'name' => 'Gigs',
            'singular_name' => 'Gig',
            'menu_name' => 'Gig',
            'all_items' => 'All Gigs',
            'add_new' => 'Add Gig',
            'add_new_item' => 'New Gig',
            'edit_item' => 'Edit Gig',
            'new_item' => 'New Gig',
            'view_item' => 'Show Gig',
            'search_items' => 'Search Gig',
            'not_found' => 'Gig has not been found.',
            'not_found_in_trash' => 'Gig not found in the trash'
        ], [
            'en' => 'gig'
        ], false, false,
        ['title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes']);

        if(!function_exists("register_field_group"))
            return;
    }
}

Gig::instance();