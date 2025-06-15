<?php
class ContactForm_Shortcode_IC {
    function __construct() {
        add_shortcode('contact', [$this, 'render']);
    }

    function render($atts, $content = null) {
        $attributes = shortcode_atts(
            [
                'style' => '1',
            ],
            $atts
        );

        ob_start();
        ?>
        <p>
        <form action="#" method="post" style="max-width: 400px; margin: 40px auto; padding: 24px; background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); font-family: sans-serif;">
            <h2 style="text-align: center; margin-bottom: 20px; color: #333;"><?php _e('Contact Us', 'shortcode-ic'); ?></h2>

            <label for="name" style="display: block; margin-bottom: 6px; font-weight: 600; color: #333;">Name</label>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

            <label for="email" style="display: block; margin-bottom: 6px; font-weight: 600; color: #333;">Email</label>
            <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

            <label for="message" style="display: block; margin-bottom: 6px; font-weight: 600; color: #333;">Message</label>
            <textarea id="message" name="message" rows="4" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;"></textarea>

            <button type="submit" style="width: 100%; padding: 12px; background-color: #3498db; color: #fff; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;">
                Send Message
            </button>
        </form>
        </p>
        <?php
        $form_data = ob_get_clean();
        return $form_data;
    }
}