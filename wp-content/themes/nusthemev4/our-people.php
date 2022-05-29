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
		
		<?php if( have_rows('executive_committee') ): ?>
			<ul>
			<?php while ( have_rows('executive_committee') ) : the_row(); ?>
				<li>
					<div class="people__img"><?php echo wp_get_attachment_image( get_sub_field('image'), 'full' ); ?></div><a href="<?php the_sub_field('url'); ?>" target="_blank">
					<h3 class="people__name"><?php the_sub_field('title'); ?><br><?php the_sub_field('name'); ?></h3></a><span class="people__position"><?php the_sub_field('position'); ?></span>
					<div class="people__socials"><span class="fl-icon"><a href="mailto:<?php the_sub_field('email_address'); ?>"><i class="fi-mail"></i></a></span><span class="fl-icon"><a href="<?php the_sub_field('linkedin'); ?>"><i class="fi-social-linkedin"></i></a></span>
					</div>
				</li>
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>

		<?php if( have_rows('principal_investigators') ): ?>
			<ul>
			<?php while ( have_rows('principal_investigators') ) : the_row(); ?>
				<li>
					<div class="people__img"><?php echo wp_get_attachment_image( get_sub_field('image'), 'full' ); ?></div><a href="<?php the_sub_field('url'); ?>" target="_blank">
					<h3 class="people__name"><?php the_sub_field('title'); ?><br><?php the_sub_field('name'); ?></h3></a><span class="people__position"><?php the_sub_field('position'); ?></span>
					<div class="people__socials"><span class="fl-icon"><a href="mailto:<?php the_sub_field('email_address'); ?>"><i class="fi-mail"></i></a></span><span class="fl-icon"><a href="<?php the_sub_field('linkedin'); ?>"><i class="fi-social-linkedin"></i></a></span>
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
