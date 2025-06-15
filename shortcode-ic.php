<?php
/**
 * Plugin Name: Shortcode IC
 * Description: Shortcode Demo
 * Author: WPPD Team
 * Plugin UIR: https://google.com
 */

require_once __DIR__ . "/includes/class-message-shortcode.php";
require_once __DIR__ . "/includes/class-gmap-shortcode.php";
require_once __DIR__ . "/includes/class-contact-form-shortcode.php";
class Shortcode_IC {
    function __construct() {
        add_action('init', [$this, 'init']);
    }

    function init() {
        load_plugin_textdomain('shortcode-ic', false, dirname(plugin_basename(__FILE__)) . '/languages');
        add_shortcode('hello-world', [$this, 'hello_world']);
        new Message_Shortcode_IC();
        new GMAP_Shortcode_IC();
        new ContactForm_Shortcode_IC();
    }

    function hello_world($atts, $content = null) {
        //[hello-world/]
        //[hello-world name='John Doe']
        $attributes = shortcode_atts([
            'name' => 'World!',
            'color' => '#222000'
        ], $atts);
        // return "<p>Hello <span style='color: {$attributes['color']}'>{$attributes['name']}</span> From Shortcode</p>";
//         $data = <<<EOD
//         <p>
//             Hello <span style='color: {$attributes['color']}'>{$attributes['name']}</span> 
//             From Shortcode
//         </p>
// EOD;
        ob_start();
        ?>
        <p>
            Hello <span style='color: <?= esc_attr($attributes['color']); ?>;'>
                <?= esc_html($attributes['name']); ?>
            </span> From Shortcode.
            <?php echo do_shortcode(wp_kses_post($content)); ?>
        </p>
        <?php
        $data = ob_get_clean();
        return $data;
    }
}

new Shortcode_IC();