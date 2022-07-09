<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Careers
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

    <section class="our-projects">
        <div class="fl-row fl-row-fixed-width fl-row-bg-none">
            <h1 class="section-title our-projects__title">Careers</h1>
            <?php if( have_rows('careers') ): ?>
            <div class="our-projects__list">
                <?php while ( have_rows('careers') ) : the_row(); ?>
                <li class="project-card">
                    <?php if( get_sub_field('image') ):
                        $img = get_sub_field('image'); ?>
                    <div class="project-card__img">
                        <img src="<?php echo $img['url'] ?>" />
                    </div>
                    <?php endif ?>
                    <div class="project-card__main">
                        <?php if( get_sub_field('logo') ):
                        $img = get_sub_field('logo'); ?>
                        <div class="project-card__logo">
                            <img src="<?php echo $img['url'] ?>" />
                        </div>
                        <?php endif; ?>
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
            </div>
            <?php endif; ?>
        </div>
    </section>


</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>