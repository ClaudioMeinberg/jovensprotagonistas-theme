<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tema_Jovens_Protagonistas
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

	</header><!-- .entry-header -->

	<?php tema_jovensprotagonistas_post_thumbnail(); ?>

	<?php if ( ! $args['compact'] ) : ?>
	<div class="entry-meta"><?php echo get_the_date(); ?></div>
	<?php endif; ?>

	<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

	<?php if ( $args['compact'] ) : ?>
	<div class="entry-meta"><?php echo get_the_date(); ?></div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		if ( ! $args['compact'] ) :
			the_excerpt(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tema-jovensprotagonistas' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
		endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<a href="<?php esc_url( get_permalink() ) ?>" rel="bookmark">Ler artigo</a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
