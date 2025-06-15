<?php
class GMAP_Shortcode_IC {
    function __construct() {
        add_shortcode('gmap', [$this, 'render']);
    }

    function render($atts, $content = null) {
        $attributes = shortcode_atts(
            [
                'lat' => '23.8103',
                'lon' => '90.4125',
                'z' => 14
            ],
            $atts
        );

        ob_start();
        ?>
        <p><iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=<?= esc_attr($attributes['lat']) ?>,<?= esc_attr($attributes['lon']) ?>&hl=es;z=<?= esc_attr($attributes['z']) ?>&output=embed">
            </iframe></p>
        <?php
        $map_data = ob_get_clean();
        return $map_data;
    }
}