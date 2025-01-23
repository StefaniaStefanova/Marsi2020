<?php

namespace Gutenkit\Admin\Onboard;

use Gutenkit\Admin\Onboard\Onboard;
use Gutenkit\Traits\Singleton;

defined('ABSPATH') || exit;

class PluginDataSender {
    use Singleton;

    /**
     * @var array
     */
    private $installedPlugins = [];
    /**
     * @var array
     */
    private $themes = [];
    /**
     * @var array
     */
    private $activatedPlugins = [];

    public function __construct() {
        $this->set_activated_plugins();
        $this->set_installed_plugins();
        $this->setThemes();
    }

    private function set_activated_plugins() {
        foreach (apply_filters('active_plugins', get_option('active_plugins')) as $plugin) {
            array_push($this->activatedPlugins, $plugin);
        }
    }

    private function set_installed_plugins() {
        if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        foreach (get_plugins() as $key => $plugin) {
            $status = false;
            if (in_array($key, $this->activatedPlugins)) {
                $status = true;
            }
            array_push($this->installedPlugins, [
                'name'      => $plugin['Name'],
                'version'   => $plugin['Version'],
                'is_active' => $status,
            ]);
        }
    }

    private function setThemes() {
        $activeTheme = wp_get_theme()->get('Name');
        foreach (wp_get_themes() as $key => $theme) {
            array_push($this->themes, [
                "name"      => $theme->Name,
                "version"   => $theme->Version,
                'is_active' => $activeTheme == $theme->Name,
            ]);
        }
    }

    /**
     * @param $route
     */
    private function getUrl() {
        return 'https://account.wpmet.com/?fluentcrm=1&route=contact&hash=4bc3e671-eb91-457f-8ab1-f69740d0cf81';
    }

    /**
     * @param $route
     */
    public function send() {

        return wp_remote_post(
            $this->getUrl(),
            [
                'method'      => 'POST',
                'data_format' => 'body',
                'headers'     => [
                    'Content-Type' => 'application/json',
                ],
                'body'        => wp_json_encode($this->get_data()),
            ]
        );
    }

    /**
     * @param $route
     * @param $data
     */
    public function sendAutomizyData($route, $data) {
        return wp_remote_post(
            $this->getUrl(),
            [
                'method'      => 'POST',
                'data_format' => 'body',
                'headers'     => [
                    'Content-Type' => 'application/json',
                ],
                'body'        => wp_json_encode($data),
            ]
        );
    }

    public function get_data() {
        return [
            'email'              => get_option(Onboard::EMAIL_ID),
            'environment_id'     => Onboard::ENVIRONMENT_ID,
            "domain"             => get_site_url(),
            "total_user"         => count_users()['total_users'],
            "themes"             => $this->themes,
            "plugins"            => $this->installedPlugins,
            "php_version"        => phpversion(),
            "db_version"         => get_option("db_version"),
            "server_name"        => !empty($_SERVER['SERVER_SOFTWARE']) ? explode(' ', sanitize_text_field(wp_unslash($_SERVER['SERVER_SOFTWARE'])))[0] : '',
            "max_execution_time" => ini_get('max_execution_time'),
            "php_memory_size"    => ini_get('memory_limit'),
            "language"           => get_locale(),
        ];
    }
}
