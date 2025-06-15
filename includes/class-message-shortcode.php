<?php
class Message_Shortcode_IC {
    function __construct() {
        add_shortcode('message', [$this, 'render']);
    }

    function render($atts, $content = null) {
        $attributes = shortcode_atts(
            [
                'type' => 'info'
            ],
            $atts
        );
        $template = '<div style="padding: 12px; border-left: 4px solid #3498db; background-color: #ecf6fc; color: #2c3e50; margin-bottom: 10px;">
                    ℹ️ #message
                    </div>';
        if ('warning' == $attributes['type']) {
            $template = '<div style="padding: 12px; border-left: 4px solid #f39c12; background-color: #fff8e6; color: #664d03; margin-bottom: 10px;">
                        ⚠️ #message
                        </div>';
        } else if ('error' == $attributes['type']) {
            $template = '<div style="padding: 12px; border-left: 4px solid #e74c3c; background-color: #fdecea; color: #7b241c; margin-bottom: 10px;">
                        ❌ #message
                        </div>';
        } else if ('success' == $attributes['type']) {
            $template = '<div style="padding: 12px; border-left: 4px solid #2ecc71; background-color: #eafaf1; color: #1e4620; margin-bottom: 10px;">
                        ✅ #message
                        </div>';
        }

        $_content = do_shortcode($content);
        $output = str_replace('#message', $_content, $template);
        return $output;
    }
}