<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Our People
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

    <section class="our-people">
        <div class="fl-row fl-row-fixed-width fl-row-bg-none">
            <h1 class="section-title our-people__title">Our People</h1>

            <?php if( have_rows('executive_committee') ): ?>
            <div class="people">
                <h2 class="people__title">Executive Committee</h2>

                <ul>
                    <?php while ( have_rows('executive_committee') ) : the_row(); ?>
                    <li>
                        <div class="people__img">
                            <?php 
							$img = get_sub_field('image');
							 ?>
                            <img src="<?php echo $img['url']; ?>" alt="<?php the_sub_field('name'); ?>" />
                        </div>
                        <a href="<?php the_sub_field('url'); ?>" target="_blank">
                            <h3 class="people__name"><?php the_sub_field('title'); ?><br><?php the_sub_field('name'); ?>
                            </h3>
                        </a>
                        <span class="people__position"><?php the_sub_field('position'); ?></span>
                        <div class="people__socials">
                            <?php if (get_sub_field('email_address')): ?>
                            <span class="fl-icon">
                                <a href="mailto:<?php the_sub_field('email_address'); ?>">
                                    <i class="fi-mail"></i></a>
                            </span>
                            <?php endif ?>
                            <?php if (get_sub_field('linkedin')): ?>
                            <span class="fl-icon">
                                <a href="<?php the_sub_field('linkedin'); ?>" target="_blank">
                                    <i class="fi-social-linkedin"></i>
                                </a>
                            </span>
                            <?php endif ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php if( have_rows('principal_investigators') ): ?>
            <div class="people">
                <h2 class="people__title">Principal Investigators</h2>
                <ul>
                    <?php while ( have_rows('principal_investigators') ) : the_row(); ?>
                    <li>
                        <div class="people__img">
                            <?php 
							$img = get_sub_field('image');
							 ?>
                            <img src="<?php echo $img['url']; ?>" alt="<?php the_sub_field('name'); ?>" />
                        </div>
                        <a href="<?php the_sub_field('url'); ?>" target="_blank">
                            <h3 class="people__name"><?php the_sub_field('title'); ?><br><?php the_sub_field('name'); ?>
                            </h3>
                        </a>
                        <span class="people__position"><?php the_sub_field('position'); ?></span>
                        <div class="people__socials">
                            <?php if (get_sub_field('email_address')): ?>
                            <span class="fl-icon">
                                <a href="mailto:<?php the_sub_field('email_address'); ?>">
                                    <i class="fi-mail"></i></a>
                            </span>
                            <?php endif; ?>
                            <?php if (get_sub_field('linkedin')): ?>
                            <span class="fl-icon">
                                <a href="<?php the_sub_field('linkedin'); ?>" target="_blank">
                                    <i class="fi-social-linkedin"></i>
                                </a>
                            </span>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php if( have_rows('research_staff') ): ?>
            <div class="people">
                <h2 class="people__title">Research Staff</h2>
                <ul>
                    <?php while ( have_rows('research_staff') ) : the_row(); ?>
                    <li>
                        <div class="people__img">
                            <?php 
							$img = get_sub_field('image');
							 ?>
                            <img src="<?php echo $img['url']; ?>" alt="<?php the_sub_field('name'); ?>" />
                        </div>
                        <a href="<?php the_sub_field('url'); ?>" target="_blank">
                            <h3 class="people__name"><?php the_sub_field('title'); ?><br><?php the_sub_field('name'); ?>
                            </h3>
                        </a>
                        <span class="people__position"><?php the_sub_field('position'); ?></span>
                        <div class="people__socials">
                            <?php if (get_sub_field('email_address')): ?>
                            <span class="fl-icon">
                                <a href="mailto:<?php the_sub_field('email_address'); ?>">
                                    <i class="fi-mail"></i></a>
                            </span>
                            <?php endif; ?>
                            <?php if (get_sub_field('linkedin')): ?>
                            <span class="fl-icon">
                                <a href="<?php the_sub_field('linkedin'); ?>" target="_blank">
                                    <i class="fi-social-linkedin"></i>
                                </a>
                            </span>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </section>

</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>