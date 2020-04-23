<?php

// Namespace declaration
namespace NickPorsche\PostType;

use NickPorsche\PostTypes;

// Exit if accessed directly 
defined('ABSPATH') or die;

class Release {

    private static $instance;

    public static function instance() {
        return self::$instance ?: (self::$instance = new self());
    }

    private function __construct() {
        add_action('init', [$this, 'register']);
    }

    public function register() {
        PostTypes::instance()->register_post_type('release', 'dashicons-star-filled', [
            'name' => 'Releases',
            'singular_name' => 'Release',
            'menu_name' => 'Release',
            'all_items' => 'All Releases',
            'add_new' => 'Add Release',
            'add_new_item' => 'New Release',
            'edit_item' => 'Edit Release',
            'new_item' => 'New Release',
            'view_item' => 'Show Release',
            'search_items' => 'Search Release',
            'not_found' => 'Release has not been found.',
            'not_found_in_trash' => 'Release not found in the trash'
        ], [
            'en' => 'release'
        ], false, false,
        ['title', 'excerpt', 'thumbnail', 'revisions', 'page-attributes']);

        if(!function_exists("register_field_group"))
            return;
    }
}

Release::instance();