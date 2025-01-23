<?php

namespace Gutenkit\Config;

defined( 'ABSPATH' ) || exit;

class SettingsList extends \Gutenkit\Core\ConfigList {

	protected $type = 'settings';

	protected function set_required_list() {
		$this->required_list = array();
	}

	protected function set_optional_list() {
		$this->optional_list = apply_filters(
			'gutenkit/settings/list',
			array(
				'google_map'   => array(
					'slug'    => 'google_map',
					'title'   => 'Google Map',
					'description'   => "Integrate Google Maps services to enable location-based features into your website. Use the Google Map API.",
					'package' => 'pro',
					'token_link' => 'https://developers.google.com/maps/documentation/javascript/get-api-key',
					'fields'   => array(
						'api_key' => array('label' => 'API key', 'value' => ''),
					),
					'status'          => 'active',
					'clear_cache' => true,
					'category' => 'api-integration',
				),
				'mailchimp' => array(
					'slug'           => 'mailchimp',
					'title'          => 'Mailchimp',
					'description'    => 'Use MailChimp API key to securely integrate your MailChimp account with our services.',
					'package'        => 'free',
					'fields'            => array(
						'api_key' => array('label' => 'API Key', 'value' => '')
					),
					'status'          => 'active',
					'category' => 'api-integration',
				),
				'facebook_feed'   => array(
					'slug'    => 'facebook_feed',
					'title'   => 'Facebook Page Feed',
					'description'   => "To show Facebook page feed on your website, enter your unique Page ID and Page Access Token to connect your page.",
					'package' => 'pro',
					'fields'   => array(
						'page_id' => array('label' => 'Page ID', 'value' => ''),
						'aceess_token' => array('label' => 'Page Access Token', 'value' => '')
					),
					'clear_cache' => true,
					'access_token_generator' => true,
					'status'          => 'inactive',
					'category' => 'api-integration',
					'token_link' => 'https://token.wpmet.com/social_token.php?provider=facebook&_for=page&app=2577123062406162&sec=a4656a1cae5e33ff0c18ee38efaa47ac&scope=pages_show_list,pages_read_engagement,pages_manage_engagement,pages_read_user_content'
				),
				'facebook_review'   => array(
					'slug'    => 'facebook_review',
					'title'   => 'Facebook Page Review',
					'description'   => "To showcase reviews from your Facebook page, enter your unique Page ID and Page Access Token to connect your page.",
					'package' => 'pro',
					'fields'   => array(
						'page_id' => array('label' => 'Page ID', 'value' => ''),
						'aceess_token' => array('label' => 'Page Access Token', 'value' => '')
					),
					'clear_cache' => true,
					'access_token_generator' => true,
					'status'          => 'inactive',
					'category' => 'api-integration',
					'token_link' => 'https://token.wpmet.com/social_token.php?provider=facebook&_for=page'
				),
				'yelp'   => array(
					'slug'    => 'yelp',
					'title'   => 'Yelp',
					'description'   => "Use your Yelp Business Page ID to manage your online reputation such as reviews, ratings, and business details.",
					'package' => 'pro',
					'fields'   => array(
						'page' => array('label' => 'Yelp Page', 'value' => '')
					),
					'status'          => 'inactive',
					'category' => 'api-integration',
				),
				'dribble'   => array(
					'slug'    => 'dribble',
					'title'   => 'Dribble User Data',
					'description'   => "Enter Access Token to enable Dribbble services like viewing and interacting with your design work.",
					'package' => 'pro',
					'fields'   => array(
						'token' => array('label' => 'Access Token', 'value' => '')
					),
					'clear_cache' => true,
					'access_token_generator' => true,
					'status'          => 'inactive',
					'category' => 'api-integration',
					'token_link' => 'https://token.wpmet.com/social_token.php?provider=dribbble'
				),
				'twitter'   => array(
					'slug'    => 'twitter',
					'title'   => 'Twitter',
					'description'   => "Connect your Twitter handle and show your tweets on your website. Use your Twitter username and Access Token.",
					'package' => 'pro',
					'fields'   => array(
						'username' => array('label' => 'Username', 'value' => ''),
						'token' => array('label' => 'Access Token', 'value' => '')
					),
					'clear_cache' => true,
					'access_token_generator' => true,
					'status'          => 'inactive',
					'category' => 'api-integration',
					'token_link' => 'https://token.wpmet.com/index.php?provider=twitter'
				),
				'instagram'   => array(
					'slug'    => 'instagram',
					'title'   => 'Instagram',
					'description'   => "To Showcase Instagram Feed on your website, enter User ID, Access Token, Expiry Date, & Generation Date of the access token.",
					'package' => 'pro',
					'fields'   => array(
						'user_id' => array('label' => 'User ID', 'value' => ''),
						'token' => array('label' => 'Access Token', 'value' => ''),
						'token_expiry_time' => array('label' => 'Token Expiry Time', 'value' => ''),
						'token_generation_date' => array('label' => 'Token generation date', 'value' => ''),
					),
					'clear_cache' => true,
					'access_token_generator' => true,
					'status'          => 'inactive',
					'category' => 'api-integration',
					'token_link' => 'https://token.wpmet.com/social_token.php?provider=instagram'
				),
				'zoom'   => array(
					'slug'    => 'zoom',
					'title'   => 'Zoom',
					'description'   => "Use your Zoom API Key and Secret Key to facilitate scheduling, managing, and hosting Zoom meetings.",
					'package' => 'pro',
					'fields'   => array(
						'api_key' => array('label' => 'Api key', 'value' => ''),
						'secret_key' => array('label' => 'Secret Key', 'value' => ''),
					),
					'access_token_generator' => true,
					'status'          => 'inactive',
					'category' => 'api-integration',
					'token_link' => 'https://token.wpmet.com/index.php?provider=zoom'
				),
				'asset_generation' => array(
					'slug'    => 'asset_generation',
					'title'   => 'Asset Generation',
					'package' => 'free',
					'status'  => 'active',
					'category' => 'asset-generation',
				),
				'unfiltered_upload' => array(
					'slug'    => 'unfiltered_upload',
					'title'   => 'Unfiltered Upload',
					'package' => 'free',
					'status'  => 'active',
					'category' => 'advanced',
				),
				'remote_image' => array(
					'slug'    => 'remote_image',
					'title'   => 'Remote Image',
					'package' => 'free',
					'status'  => 'active',
					'category' => 'advanced',
				),
				'use_only_global_styles_fonts' => array(
					'slug'    => 'use_only_global_styles_fonts',
					'title'   => 'Use Only Global Styles Fonts',
					'package' => 'free',
					'status'  => 'inactive',
					'category' => 'advanced',
				),
				'gutenkit_user_consent' => array(
					'slug'    => 'gutenkit_user_consent',
					'title'   => 'User Consent',
					'package' => 'free',
					'status'  => 'inactive',
					'category' => 'advanced',
				),
				'version_control' => array(
					'slug'    => 'version_control',
					'title'   => 'Version Control',
					'package' => 'free',
					'value'   => '1.0.0',
					'status'  => 'active',
					'category' => 'version-control',
				),
				'transition' => array(
					'slug'    => 'transition',
					'title'   => 'Transition',
					'package' => 'free',
					'value'   => array(
						'transition_duration' => '0.4s',
						'transition_timing_function' => 'ease',
					),
					'status'  => 'inactive',
					'category' => 'global-custom-properties',
				),
				'image_lazy_loading' => array(
					'slug'    => 'image_lazy_loading',
					'title'   => 'Image Lazy Loading',
					'package' => 'free',
					'status'  => 'active',
					'category' => 'performance',
				),
			)
		);
	}
}
