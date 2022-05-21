<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Our Projects
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
		<?php if( have_rows('our_projects') ): ?>
			<ul>
			<?php while ( have_rows('our_projects') ) : the_row(); ?>
                <li class="project-card">
                    <?php if( get_sub_field('image') ): ?>
                        <div class="project-card__img"><?php echo wp_get_attachment_image( get_sub_field('image'), 'thumbnail' ); ?></div>
                    <?php endif ?>
                    <div class="project-card__main">
                        <div class="project-card__logo">
                            <img src="https://www.nus.edu.sg/cncs/wp-content/themes/nusthemev4/assets/images/nus-logo.png" alt="NUS-Temasek Blue Carbon Project">
                        </div>
                        <?php if( get_sub_field('title') ): ?>
                            <h2 class="project-card__title"><?php the_sub_field('title'); ?></h2>
                        <?php endif ?>
                        <?php if( get_sub_field('body') ): ?>
                            <p class="project-card__body"><?php the_sub_field('body'); ?></p>
                        <?php endif ?>
                        <?php if( get_sub_field('url') ): ?>
                            <a class="project-card__link" href="<?php the_sub_field('url'); ?>">Read more here</a>
                        <?php endif ?>
                    </div>
                </li>
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>

		
	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
