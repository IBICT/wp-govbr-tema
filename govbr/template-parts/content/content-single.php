<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gov_BR
 * @since 0.1.0 0.1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_breadcrumb(); ?>

	<header class="entry-header container-lg">
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
		<?php gov_br_entry_meta_header(); ?>

		<?php gov_br_post_thumbnail(); ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Página', 'govbr' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Página %', 'govbr' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php gov_br_entry_meta_footer(); ?>

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
