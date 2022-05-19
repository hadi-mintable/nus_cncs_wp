<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		<?php astra_primary_content_top(); ?>

		<div <?php astra_blog_layout_class( 'single-layout-1' ); ?>>


			<div class="entry-content clear" itemprop="text">
				<?php astra_entry_content_before(); ?>

				<div class='fl-row-fixed-width single-content-div'>

					<div class='fl-col col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12'>
						<h2 class="post-title heading-orange-border-btm"><span><?php echo get_the_title(); ?></span></h2>
						<!--<h4 class="news-date"></h4>-->
						<?php astra_content_loop(); ?>
					</div>
				</div>

				<?php astra_entry_content_after(); ?>

			</div><!-- .entry-content .clear -->
		</div>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>