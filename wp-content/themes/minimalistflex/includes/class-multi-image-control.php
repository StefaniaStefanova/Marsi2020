<?php

if (!class_exists('WP_Customize_Image_Control')) {
    return null;
}

class MinimalistFlex_Multi_Image_Custom_Control extends WP_Customize_Control
{

    public $label;
    public $description;
    public $suggest_label;
    public $suggest_description;
    public $suggest_images;

    public function enqueue()
    {
        wp_enqueue_media();
        wp_enqueue_style('multi-image-style', get_template_directory_uri().'/css/multi-image.css');
        wp_enqueue_script('multi-image-script', get_template_directory_uri().'/js/multi-image.js', array( 'jquery' ), null, true);
    }

    public function render_content()
    { ?>
        <span class='customize-control-title'>
            <?php echo esc_html( $this->label ) ?>
        </span>
        <span class='description customize-control-description'>
            <?php echo esc_html( $this->description ) ?>
        </span>

        <div>
            <ul class='images'></ul>
            <div class="placeholder"><?php esc_html_e( 'No image set', 'minimalistflex' ) ?></div>
        </div>
        <div class='actions'>
            <a class="button-secondary upload">
                <?php esc_html_e( 'Add Image', 'minimalistflex' ) ?>
            </a>
        </div>

        <input class="wp-editor-area" id="images-input" type="hidden" <?php $this->link(); ?>>

        <span class='customize-control-title'>
            <?php echo esc_html( $this->suggest_label ) ?>
        </span>
        <span class='customize-control-description'>
            <?php echo esc_html( $this->suggest_description ) ?>
        </span>

        <div>
            <ul class='suggested-images'>
                <?php foreach ( $this->suggest_images as $suggest_image ): ?>
                    <li class="suggested-image-item"><img src="<?php echo esc_url( get_template_directory_uri() . $suggest_image ) ?>"></li>
                <?php endforeach; ?>
            </ul>
        </div>
      <?php
    }
}
?>