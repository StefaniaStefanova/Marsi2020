<?php
if ( !defined( 'WPINC' ) ) {
    die;
}
?>

<?php
if ( post_password_required() ) {
	return;
}
?>

<div class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				/* translators: %1$s: Number of comments. %2$s: Post title. */
				esc_html( _nx(
					'%1$s comment on "%2$s"',
					'%1$s comments on "%2$s"',
					get_comments_number(),
					'comments title',
					'minimalistflex'
				) ),
				esc_html( number_format_i18n( get_comments_number() ) ),
				'<span>' . esc_html( get_the_title() ) . '</span>'
			);
			?>
		</h2>

		<ul class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ul',
				'short_ping'  => true,
				'avatar_size' => 40,
			) );
			?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="nav-links navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'minimalistflex' ); ?></h1>
				<div class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'minimalistflex' ) ); ?></div>
				<div class="next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'minimalistflex' ) ); ?></div>
			</nav>
		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'minimalistflex' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php comment_form(); ?>

</div>
