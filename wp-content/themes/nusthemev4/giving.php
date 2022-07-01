<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Giving
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
        <section class="giving">
            <div class="fl-row fl-row-fixed-width fl-row-bg-none">
                <h1 class="section-title giving__title">Giving</h1>
            </div>
            <section class="hero-banner hero-banner__short">
                <div class="hero-banner__container"
                    style="background-image: url(https://www.nus.edu.sg/cncs/wp-content/uploads/2020/09/Vision-and-Mission-banner-1024x768.jpg)">
                </div>
            </section>
            <div class="fl-row fl-row-fixed-width fl-row-bg-none">
                <div class="giving__introduction">
                    <h1 class="section-title giving__subtitle">Why Give</h1>
                    <section>
                        <div class="giving__img">
                            <?php 
							$img = get_field('why_give_image');
							 ?><img src="<?php echo $img['url']; ?>" alt="Giving"></div>
                        <div class="giving__body"><?php the_field('why_give_description'); ?></div>
                    </section>
                </div>
                <div class="giving__support">
                    <h1 class="section-title giving__subtitle">What can you support?</h1>
                    <ul>
                        <?php while ( have_rows('ways_to_support') ) : the_row(); ?>
                        <li>
                            <?php 
							$img = get_sub_field('icon');
							 ?>
                            <img src="<?php echo $img['url']; ?>" alt="<?php the_sub_field('text'); ?>" />
                            <span><?php the_sub_field('text'); ?></span>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <div class="giving__notice">
                    <p>
                        To discuss giving opportunities,<br>please contact <a
                            href="mailto:<?php the_field('contact_email'); ?>"><?php the_field('contact_email'); ?></a>
                    </p>
                </div>
            </div>
        </section>
    </div>


</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>