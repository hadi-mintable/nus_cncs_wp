<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Landing
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

    <div class="page-bottom-spacer">

        <?php if( have_rows('hero_banner_items') ): ?>
        <section class="hero-banner hero-banner__slick">
            <?php while ( have_rows('hero_banner_items') ) : the_row(); ?>
            <?php if( get_sub_field('background_image') ):
                        $img = get_sub_field('background_image'); ?>
            <div class="hero-banner__container" style="background-image: url(<?php echo $img['url'] ?>)">
                <div class="fl-row fl-row-fixed-width fl-row-bg-none">
                    <?php if( get_sub_field('title') ): ?>
                    <h2><?php the_sub_field('title') ?></h2>
                    <?php endif ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endwhile; ?>
        </section>
        <?php endif; ?>

        <?php if( have_rows('essential_link_items') ): ?>
        <section class="broad-categories">
            <ul class="fl-row fl-row-fixed-width fl-row-bg-none broad-categories__container">
                <?php while ( have_rows('essential_link_items') ) : the_row(); ?>
                <li>
                    <a href="<?php the_sub_field('url') ?>">
                        <?php if( get_sub_field('background_image') ):
                        $img = get_sub_field('background_image'); ?>
                        <img src="<?php echo $img['url'] ?>">
                        <?php endif ?>
                        <?php if( get_sub_field('title') ): ?>
                        <h3><?php the_sub_field('title') ?></h3>
                        <?php endif ?>
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </li>
                <?php endwhile; ?>
            </ul>
        </section>
        <?php endif; ?>

        <?php if( have_rows('explore_our_research_link_items') ): ?>
        <section class="explore-our-research">
            <div class="fl-row fl-row-fixed-width fl-row-bg-none explore-our-research__container">
                <h2 class="explore-our-research__title">Explore our Research</h2>
                <ul class="explore-our-research__categories">
                    <?php while ( have_rows('explore_our_research_link_items') ) : the_row(); ?>
                    <li class="explore-our-research__category">
                        <a href="/research/our-research?category=<?php the_sub_field('data_string') ?>">
                            <?php if( get_sub_field('background_image') ):
                        $img = get_sub_field('background_image'); ?>
                            <img src="<?php echo $img['url'] ?>" />
                            <?php endif ?>
                            <div class="explore-our-research__content">
                                <?php if( get_sub_field('title') ): ?>
                                <h4><?php the_sub_field('title') ?></h4>
                                <?php endif ?>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>

            </div>
        </section>
        <?php endif; ?>


    </div>

</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>