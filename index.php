<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tema_Jovens_Protagonistas
 */

get_header();
?>
<div id="container">

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;


			if ( is_home() && is_front_page() ) :
				?>
			<h2 class="section-title">Mais Recente</h2>
				<?php
				the_post();

				get_template_part( 'template-parts/card', get_post_type() );

			else :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation();
			endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php get_sidebar(); ?>
</div>
<hr>
<div id="container_half">

	<?php if ( have_posts() ) :  the_post(); ?>
	<div class="first">
		<?php get_template_part( 'template-parts/card', get_post_type() );?>
	</div>
<?php endif; ?>
	<div class="second">
		<div id="container_half_sm">
			<div class="first">
				<?php if ( have_posts() ) :  the_post(); ?>
				<?php get_template_part( 'template-parts/card', get_post_type(), array('compact' => true) );?>
				<?php endif; ?>
				<?php if ( have_posts() ) :  the_post(); ?>
				<?php get_template_part( 'template-parts/card', get_post_type(), array('compact' => true) );?>
				<?php endif; ?>
			</div>
			<div class="second">
				<?php if ( have_posts() ) :  the_post(); ?>
				<?php get_template_part( 'template-parts/card', get_post_type(), array('compact' => true) );?>
				<?php endif; ?>
				<?php if ( have_posts() ) :  the_post(); ?>
				<?php get_template_part( 'template-parts/card', get_post_type(), array('compact' => true) );?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
