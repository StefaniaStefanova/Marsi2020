<?php

namespace Gutenkit\Routes;

defined('ABSPATH') || exit;

class GlobalSettings
{
    use \Gutenkit\Traits\Singleton;

    public function __construct()
    {
        add_action('rest_api_init', array($this, 'register_global_options_settings'));
    }

    public function register_global_options_settings()
    {
        register_setting("gutenkit-global-settings", "enable_smooth_scroll", [
            "show_in_rest"      => true,
            'type'              => 'boolean',
            'default'           => false,
        ]);

        register_setting("gutenkit-global-settings", "smooth_scroll_duration", [
            "show_in_rest"      => true,
            'type'              => 'number',
            'default'           => 1.2,
        ]);

        register_setting("gutenkit-global-settings", "smooth_scroll_lerp", [
            "show_in_rest"      => true,
            'type'              => 'number',
            'default'           => 0.1,
        ]);

        register_setting("gutenkit-global-settings", "smooth_scroll_prevent_type", [
            "show_in_rest"      => true,
            'type'              => 'string',
            'default'           => 'exclude',
        ]);

        register_setting('gutenkit-global-settings', 'smooth_scroll_exclude', [
            'show_in_rest' => [
                'schema' => [
                    'type'  => 'array',
                    'items' => [
                        'type'       => 'object',
                        'properties' => [
                            'label' => [
                                'type' => 'string',
                            ],
                            'value' => [
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ],
            ],
            'type' => 'array',
        ]);

        register_setting('gutenkit-global-settings', 'smooth_scroll_include', [
            'show_in_rest' => [
                'schema' => [
                    'type'  => 'array',
                    'items' => [
                        'type'       => 'object',
                        'properties' => [
                            'label' => [
                                'type' => 'string',
                            ],
                            'value' => [
                                'type' => 'integer',
                            ],
                        ],
                    ],
                ],
            ],
            'type' => 'array',
        ]);

        require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
        require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
        $breakpointsPath = GUTENKIT_PLUGIN_DIR . '/assets/data/default-breakpoints.json';
        $filesystem = new \WP_Filesystem_Direct( true );
        $brekpoints = $filesystem->get_contents($breakpointsPath);
        register_setting("gutenkit-global-settings", "gutenkitBreakpoints", [
            "show_in_rest" => true,
            'default'      => $brekpoints
        ]);
    }
}
