<?php
if ( !defined( 'WPINC' ) ) {
    die;
}
?>

<?php if ( is_active_sidebar( 'above-content' ) ): ?>
    <ul class="above-content-widgets">
        <?php dynamic_sidebar( 'above-content' ); ?>
    </ul>
<?php elseif ( user_can( get_current_user_id(), 'edit_theme_options' ) ): ?>
    <ul class="above-content-widgets">
        <li class="panel widget above-content-widget warning">
            <?php esc_html_e( 'Sorry, but no widgets were found in this area.', 'minimalistflex' ); ?>
            <?php esc_html_e( 'This message is displayed to administrators only.', 'minimalistflex' ); ?>
        </li>
    </ul>
<?php endif; ?>