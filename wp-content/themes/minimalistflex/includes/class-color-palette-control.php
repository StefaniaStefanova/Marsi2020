<?php

if (!class_exists('WP_Customize_Image_Control')) {
    return null;
}

class MinimalistFlex_Color_Palette_Custom_Control extends WP_Customize_Control
{

    public $label;
    public $description;
    public $suggest_label;
    public $suggest_description;
    public $suggest_images;

    public function enqueue()
    {
        wp_enqueue_style('color-palette-style', get_template_directory_uri().'/css/color-palette.css');
        wp_enqueue_script('color-palette-script', get_template_directory_uri().'/js/color-palette.js', array( 'jquery' ), null, true);
    }

    public function render_content()
    {
        $theme_uri = get_template_directory_uri();
        ?>
        <span class='customize-control-title'>
            <?php echo esc_html( $this->label ) ?>
        </span>
        <span class='description customize-control-description'>
            <?php echo esc_html( $this->description ) ?>
        </span>

        <div>
            <ul class='palettes'>
            <li class="palette palette-clear"><button id="minimalistflex-palette-minimal"><?php echo esc_html_x( 'Minimal', 'color palette', 'minimalistflex' ) ?></li>
                <li class="palette" style="background-image: url('<?php echo esc_url( $theme_uri . '/defaults/palette.png' ) ?>')"><button id="minimalistflex-palette-light"><?php echo esc_html_x( 'Light', 'color palette', 'minimalistflex' ) ?></li>
                <li class="palette" style="background-image: url('<?php echo esc_url( $theme_uri . '/defaults/palette2.png' ) ?>')"><button id="minimalistflex-palette-dark"><?php echo esc_html_x( 'Dark', 'color palette', 'minimalistflex' ) ?></li>
                <li class="palette" style="background-image: url('<?php echo esc_url( $theme_uri . '/defaults/palette3.png' ) ?>')"><button id="minimalistflex-palette-galatic"><?php echo esc_html_x( 'Galatic', 'color palette', 'minimalistflex' ) ?></li>
                <li class="palette" style="background-image: url('<?php echo esc_url( $theme_uri . '/defaults/palette4.png' ) ?>')"><button id="minimalistflex-palette-spring"><?php echo esc_html_x( 'Spring', 'color palette', 'minimalistflex' ) ?></li>
            </ul>
        </div>
      <?php
    }
}
?>