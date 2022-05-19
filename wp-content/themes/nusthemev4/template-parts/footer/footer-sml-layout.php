<?php
/**
 * Template for Small Footer Layout 1
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2019, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

$section_1 = astra_get_small_footer( 'footer-sml-section-1' );
$section_2 = astra_get_small_footer( 'footer-sml-section-2' );

?>

<div class="ast-small-footer footer-sml-layout-1">
	<div class="ast-footer-overlay">
		<div class="ast-container">
			<div class="ast-small-footer-wrap" >
				<?php //if ( $section_1 ) : ?>
					<div class="ast-small-footer-section ast-small-footer-section-1" >
						<?php //echo $section_2; // WPCS: XSS OK. ?>
						© <a href='https://nus.edu.sg' target='_blank'>National University of Singapore</a>. All Rights Reserved.
					</div>
				<?php //endif; ?>

				<?php //if ( $section_2 ) : ?>
					<div class="ast-small-footer-section ast-small-footer-section-2" >
						<div class="nus-footer-bar">
							<ul id="nus-footer-bar-menu">
								<li><a href="http://www.nus.edu.sg/legal-information-notices" target="_blank">Legal</a></li>
								<li><a href="http://www.nus.edu.sg/identity/" target="_blank">Branding Guidelines</a></li>
								<li><a href="http://www.nus.edu.sg/contact" target="_blank">Contact Us</a></li>
							</ul>
						</div>
						<?php //echo $section_2; // WPCS: XSS OK.	?>
					</div>
				<?php //endif; ?>

			</div><!-- .ast-row .ast-small-footer-wrap -->
		</div><!-- .ast-container -->
	</div><!-- .ast-footer-overlay -->
</div><!-- .ast-small-footer-->