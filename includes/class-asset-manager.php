<?php
class AssetManager_IC {
    private $assets = [];
    function __construct() {
        $this->assets = [
            'css' => [
                // 'sic-main' => [
                //     'src' => plugin_dir_url(__FILE__) . 'assets/css/main.css',
                //     'deps' => [],
                //     'ver' => '1.0.0',
                //     'media' => 'all'
                // ],
            ],
            'js' => [
                // 'sic-main' => [
                //     'src' => plugin_dir_url(__FILE__) . 'assets/js/main.js',
                //     'deps' => ['jquery'],
                //     'ver' => '1.0.0',
                //     'in_footer' => true
                // ]
            ]
        ];

        add_action('wp_enqueue_scripts', [$this, 'load_assets']);
    }

    function load_assets() {
        foreach ($this->assets['css'] as $handle => $data) {
            wp_enqueue_style($handle, $data['src'], $data['deps'], $data['ver'], $data['media']);
        }
        foreach ($this->assets['js'] as $handle => $data) {
            wp_enqueue_script($handle, $data['src'], $data['deps'], $data['ver'], $data['in_footer']);
        }
    }
}