<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Our Research
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php if( have_rows('research_articles') ): ?>
			<div>
			<?php while ( have_rows('research_articles') ) : the_row(); ?>
				<?php if (str_contains(get_sub_field('research_areas_category'), get_query_var('researchCategory'))): ?>
					<div>
						<?php if( get_sub_field('title') ): ?>
							<h2><?php the_sub_field('title'); ?></h2>
						<?php endif ?>
						<?php if( get_sub_field('body') ): ?>
							<p><?php the_sub_field('body'); ?></p>
						<?php endif ?>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
    
	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
