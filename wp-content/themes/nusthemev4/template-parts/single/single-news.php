<?php
/**
 * Template for Single post
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2018, Astra
 * @link        http://wpastra.com/
 * @since       Astra 1.0.0
 */

?>

<div <?php astra_blog_layout_class( 'single-layout-1' ); ?>>


	<div class="entry-content clear" itemprop="text">
		<?php astra_entry_content_before(); ?>

		<div class='fl-row-fixed-width news-single-content-div'>

			<div class='fl-col col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12'>
				<h2 class="news-title heading-orange-border-btm"><span><?php echo get_the_title(); ?></span></h2>
				<!--<h4 class="news-date"></h4>-->
				<?php astra_content_loop(); ?>
			</div>
		</div>

		<?php astra_entry_content_after(); ?>

	</div><!-- .entry-content .clear -->
</div>