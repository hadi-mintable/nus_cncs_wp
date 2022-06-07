<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Vision and Mission
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

    <section class="mission-vision">
        <div class="fl-row fl-row-fixed-width fl-row-bg-none">
            <h1><?php the_field('mission_and_vision_page_header'); ?></h1>
            <article class="mission-vision__rte">
                <p><?php the_field('mission_and_vision_page_subtitle'); ?></p>
            </article>
        </div>
        <?php 
		$image = get_field('vision_hero_banner_background_image');
		if( !empty( $image ) ): ?>
        <section class="hero-banner hero-banner__short">
            <div class="hero-banner__container" style="background-image: url(<?php echo esc_url($image['url']); ?>)">
                <div class="fl-row fl-row-fixed-width fl-row-bg-none">
                    <h2 class="is-capitalized">Our Vision</h2>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <div class="fl-row fl-row-fixed-width fl-row-bg-none">
            <article class="mission-vision__rte">
                <p><?php the_field('our_vision_text_content'); ?></p>
            </article>
        </div>
        <?php 
		$image = get_field('our_mission_banner_background_image');
		if( !empty( $image ) ): ?>
        <section class="hero-banner hero-banner__short">
            <div class="hero-banner__container" style="background-image: url(<?php echo esc_url($image['url']); ?>)">
                <div class="fl-row fl-row-fixed-width fl-row-bg-none">
                    <h2 class="is-capitalized">Our Mission</h2>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <div class="fl-row fl-row-fixed-width fl-row-bg-none">
            <article class="mission-vision__rte">
                <?php the_field('our_mission_text_content'); ?>
            </article>
        </div>
    </section>

    <!-- <h2><?php the_field('mission_and_vision_page_header'); ?></h2>
		<p><?php the_field('mission_and_vision_page_subtitle'); ?></p>
		<?php 
		$image = get_field('vision_hero_banner_background_image');
		if( !empty( $image ) ): ?>
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?> -->

    <!-- <p><?php the_field('our_vision_text_content'); ?></p> -->

    <!-- <?php 
		$image = get_field('our_mission_banner_background_image');
		if( !empty( $image ) ): ?>
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?> -->

    <!-- <p><?php the_field('our_mission_text_content'); ?></p> -->
</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>