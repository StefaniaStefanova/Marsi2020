<?php

namespace Gutenkit\Config;

defined("ABSPATH") || exit;

class PostMetaList
{

    use \Gutenkit\Traits\Singleton;

    private static $full_list   = array();

    /**
     * Get the list
     * 
     * @since 1.0.0
     * @return array 
     */
    public static function get_list()
    {
        // Ensure the list is populated
        if (empty(self::$full_list)) {
            self::set_list();
        }

        // Return the populated list
        return apply_filters("gutenkit/post-meta/list", self::$full_list);
    }

    /**
     * Generate properties for a device
     * 
     * @return array
     */
    private static function generate_device_properties()
    {
        return [
            "type" => "object",
            "properties" => [
                "top" => [
                    "type" => "string",
                ],
                "bottom" => [
                    "type" => "string",
                ],
                "left" => [
                    "type" => "string",
                ],
                "right" => [
                    "type" => "string",
                ]
            ]
        ];
    }

    /**
     * Populate the list
     * 
     * @since 1.0.0
     * @return array
     */
    public static function set_list()
    {
		$device_properties = self::generate_device_properties();

        $lists = [
            "postBodyMargin" => [ //post meta key
                "post_type" => "", //post type name put empty for all
                "args" => [ //pass arguments or an empty array
                    "type"         => "object",
                    "show_in_rest" => [ //show in rest api
                        "schema" => [ //schema
                            "type" => "object",
                            "properties" => [
                                "Desktop" => $device_properties,
                                "Tablet" => $device_properties,
                                "Mobile" => $device_properties,
                                "TabletLandscape" => $device_properties,
                                "MobileLandscape" => $device_properties,
                                "Laptop" => $device_properties,
                                "WideScreen" => $device_properties
                            ]
                        ]
                    ],
                    "single" => true,
                ]
            ],
            "postBodyPadding" => [ //post meta key
                "post_type" => "", //post type name put empty for all
                "args" => [ //pass arguments or an empty array
                    "type"         => "object",
                    "show_in_rest" => [ //show in rest api
                        "schema" => [ //schema
                            "type" => "object",
                            "properties" => [
                                "Desktop" => $device_properties,
                                "Tablet" => $device_properties,
                                "Mobile" => $device_properties,
                                "TabletLandscape" => $device_properties,
                                "MobileLandscape" => $device_properties,
                                "Laptop" => $device_properties,
                                "WideScreen" => $device_properties
                            ]
                        ]
                    ],
                    "single" => true,
                ]
            ],
            "postBodyBackground" => [
                "post_type" => "",
                "args" => [
                    "type"         => "object",
                    "show_in_rest" => [
                        "schema" => [
                            "type" => "object",
                            'additionalProperties' => array(
                                'type' => 'object',
                            ),
                            "properties" => [
                                "backgroundType" => [
                                    "type" => "string",
                                    "enum" => [
                                        "classic",
                                        "gradient",
                                        "image",
                                    ],
                                ],
                                "gradient" => [
                                    "type" => "string"
                                ],
                                "backgroundColor" => [
                                    "type" => "string"
                                ],
                                "backgroundImageSize" => [
                                    "type" => "object",
                                    "properties" => [
                                        "Desktop" => [
                                            "type" => "string"
                                        ],
                                        "Tablet" => [
                                            "type" => "string"
                                        ],
                                        "Mobile" => [
                                            "type" => "string"
                                        ],
                                        "TabletLandscape" => [
                                            "type" => "string"
                                        ],
                                        "MobileLandscape" => [
                                            "type" => "string"
                                        ],
                                        "Laptop" => [
                                            "type" => "string"
                                        ],
                                        "WideScreen" => [
                                            "type" => "string"
                                        ],
                                    ]
                                ],
                                "backgroundVideo" => [
                                    "type" => "string"
                                ],
                                "backgroundPosition" => [
                                    "type" => "object",
                                    "properties" => [
                                        "Desktop" => [
                                            "type" => "string"
                                        ],
                                        "Tablet" => [
                                            "type" => "string"
                                        ],
                                        "Mobile" => [
                                            "type" => "string"
                                        ],
                                        "TabletLandscape" => [
                                            "type" => "string"
                                        ],
                                        "MobileLandscape" => [
                                            "type" => "string"
                                        ],
                                        "Laptop" => [
                                            "type" => "string"
                                        ],
                                        "WideScreen" => [
                                            "type" => "string"
                                        ],
                                    ]
                                ],
                                "backgroundAttachment" => [
                                    "type" => "string"
                                ],
                                "backgroundRepeat" => [
                                    "type" => "string"
                                ],
                                "backgroundSize" => [
                                    "type" => "string"
                                ],
                                "customSize" => [
                                    "type" => "object",
                                    "properties" => [
                                        "Desktop" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "Tablet" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "Mobile" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "TabletLandscape" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "MobileLandscape" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "Laptop" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "WideScreen" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                    ]
                                ],
                                "customPositionX" => [
                                    "type" => "object",
                                    "properties" => [
                                        "Desktop" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "Tablet" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "Mobile" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "TabletLandscape" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "MobileLandscape" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "Laptop" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "WideScreen" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                    ]
                                ],
                                "customPositionY" => [
                                    "type" => "object",
                                    "properties" => [
                                        "Desktop" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "Tablet" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "Mobile" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "TabletLandscape" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "MobileLandscape" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "Laptop" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                        "WideScreen" => [
                                            "type" => "object",
                                            "properties" => [
                                                "size" => [
                                                    "type" => "number"
                                                ],
                                                "unit" => [
                                                    "type" => "string"
                                                ]
                                            ]
                                        ],
                                    ]
                                ],
                            ]
                        ]
                    ],
                    "single" => true,
                    "default" => [
                        "backgroundType" => "classic",
                        "gradient" => "",
                    ]
                ]
            ],
        ];

        // Assign the array to the static property
        self::$full_list = $lists;
    }
}
