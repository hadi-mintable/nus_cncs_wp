<?php
/**
 * Footer Layout 1
 *
 * @package Astra Addon
 * @since   Astra 1.0.12
 */

/**
 * Hide advanced footer markup if:
 *
 * - User is not logged in. [AND]
 * - All widgets are not active.
 */
if ( ! is_user_logged_in() ) {
	if (
		! is_active_sidebar( 'advanced-footer-widget-1' ) &&
		! is_active_sidebar( 'advanced-footer-widget-2' ) &&
		! is_active_sidebar( 'advanced-footer-widget-3' ) &&
		! is_active_sidebar( 'advanced-footer-widget-4' )
	) {
		return;
	}
}

$classes[] = 'footer-adv';
$classes[] = 'footer-adv-layout-1';
$classes   = implode( ' ', $classes );
?>

<?php if ( !is_front_page() ){ ?>
<!-- NUS BREADCRUMBS - START -->
<div class='fl-row fl-row-full-width'>
    <?php echo do_shortcode("[footer_breadcrumbs]"); ?>
</div>
<!-- NUS BREADCRUMBS - END -->
<?php } ?>

<div class="<?php echo esc_attr( $classes ); ?>">
    <div class="footer-adv-overlay">
        <div class="ast-container">
            <div class="ast-row">
                <div class="ast-col-lg-3 ast-col-md-3 ast-col-sm-12 ast-col-xs-12 footer-adv-widget footer-adv-widget-1"
                    <?php echo wp_kses_post( apply_filters( 'astra_sidebar_data_attrs', '', 'advanced-footer-widget-1' ) ); ?>>
                    <?php astra_get_footer_widget( 'advanced-footer-widget-1' ); ?>
                </div>
                <div class="ast-col-lg-3 ast-col-md-3 ast-col-sm-12 ast-col-xs-12 footer-adv-widget footer-adv-widget-2"
                    <?php echo wp_kses_post( apply_filters( 'astra_sidebar_data_attrs', '', 'advanced-footer-widget-2' ) ); ?>>
                    <?php astra_get_footer_widget( 'advanced-footer-widget-2' ); ?>
                </div>
                <div class="ast-col-lg-3 ast-col-md-3 ast-col-sm-12 ast-col-xs-12 footer-adv-widget footer-adv-widget-3"
                    <?php echo wp_kses_post( apply_filters( 'astra_sidebar_data_attrs', '', 'advanced-footer-widget-3' ) ); ?>>
                    <?php astra_get_footer_widget( 'advanced-footer-widget-3' ); ?>
                </div>
                <div class="ast-col-lg-3 ast-col-md-3 ast-col-sm-12 ast-col-xs-12 footer-adv-widget footer-adv-widget-4"
                    <?php echo wp_kses_post( apply_filters( 'astra_sidebar_data_attrs', '', 'advanced-footer-widget-4' ) ); ?>>
                    <?php astra_get_footer_widget( 'advanced-footer-widget-4' ); ?>
                </div>
            </div><!-- .ast-row -->
        </div><!-- .ast-container -->
    </div><!-- .footer-adv-overlay-->
</div><!-- .ast-theme-footer .footer-adv-layout-1 -->