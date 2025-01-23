<?php

namespace Gutenkit\Config;

defined('ABSPATH') || exit;

class PostMeta {

    use \Gutenkit\Traits\Singleton;

    // class initilizer method
    public function __construct() {
        add_action('init', array($this, 'register_post_meta'));
    }

    // register post meta
    public function register_post_meta() {
        $post_meta_list = \Gutenkit\Config\PostMetaList::instance()->get_list();

        if (!empty($post_meta_list)) {
            foreach ($post_meta_list as $key => $post_meta) {
                register_post_meta($post_meta['post_type'], $key, $post_meta['args']);
            }
        }
    }
}
