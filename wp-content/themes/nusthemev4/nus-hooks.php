<?php



function nus_init_theme(){
	remove_action( 'astra_masthead_content', 'astra_site_branding_markup', 8 );
	remove_action( 'astra_masthead_content', 'astra_primary_navigation_markup', 10 );

	register_nav_menu( 'nus-top-nav', esc_html__( 'Top Menu', 'nus-astra' ) );
}
add_action( 'after_setup_theme', 'nus_init_theme', 15 );


/** Markup to insert NUS Header logo and top nav **/
if ( ! function_exists( 'nus_site_branding_markup' ) ) {
	/**
	 * Site Title / Logo
	 *
	 * @since 1.0.0
	 */
	function nus_site_branding_markup() {
		?>

		<div class="site-branding">
			<div class="nus-site-logo-link">
				<a class="nus-site-img-link" href="http://www.nus.edu.sg" title="National University of Singapore">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri().'/assets/images/nus-logo.png'); ?>" alt="NUS Logo" />
				</a>
			</div>
			<div class="nus-faculty-border nus-dcnm"></div>
			<div class="nus-faculty-logo hidden-sm hidden-xs" itemscope="itemscope" itemtype="https://schema.org/Organization">
				<?php astra_logo(); ?>
			</div>
		</div><!-- .site-branding -->

		<div class="nus-quicklinks-container">
			<!-- QUICKLINKS -->
			<div class="nus-quicklinks d-none d-sm-none d-md-none d-lg-block d-xl-block">
				<?php
				if( has_nav_menu('nus-top-nav') ){
					wp_nav_menu(array(
						'theme_location' => 'nus-top-nav',
						'items_wrap' => '<ul id="%1$s" class="box nav nav-pills %2$s">%3$s</ul>',
						'container' => false
					));
				}
				?>
			</div>
			<!-- //QUICKLINKS -->
		</div>
		<?php
	}
	add_action( 'astra_masthead_content', 'nus_site_branding_markup', 8 );
}


if ( ! function_exists( 'nus_main_menu_markup' ) ) {
	/**
	 * Main Menu
	 *
	 * @since 1.0.0
	 */
	function nus_main_menu_markup() {
	?>
		<div class="nus-main-menu-container">
			<div class="ast-container">
				<?php astra_primary_navigation_markup(); ?>
				<!-- SEARCH BUTTON ICON - START -->
		        <div class="search-btn-box d-none d-sm-none d-md-none d-lg-block d-xl-block">
		            <a class="fa fa-search collapsed" data-toggle="collapse" data-target="#search-collapse" href="#">&nbsp;</a>
		        </div>
		        <!-- SEARCH BUTTON ICON - END -->
						<div class="nus-quicklinks d-lg-none d-xl-none">
							<?php
							if( has_nav_menu('nus-top-nav') ){
								wp_nav_menu(array(
									'theme_location' => 'nus-top-nav',
									'items_wrap' => '<ul id="%1$s" class="box nav nav-pills %2$s">%3$s</ul>',
									'container' => false
								));
							}
							?>
						</div>
			</div>

		</div>
	<?php
	}
	add_action( 'astra_main_header_bar_bottom', 'nus_main_menu_markup', 10 );
}

if ( ! function_exists( 'nus_top_search_form_markup' ) ) {

	/**
	 * Top Search Form
	 *
	 * @since 1.0.0
	 */
	function nus_top_search_form_markup() {
	?>
	<!-- NUS SEARCH - START  (Must be Toggled from SEARCH BUTTON ICON)-->
	<div id="search-collapse" class="nus-search-box collapse">
		<div class="ast-container">
			<div class="search">
				<form action="<?php echo esc_url( home_url() ); ?>" method="get" class="form-inline form-search" title="<?php echo esc_attr_x( 'Type and press Enter to search.', 'Search form mouse hover title.', 'nus-astra' ); ?>" role="search">
					<div class="icon faicon fa fa-search fl-search-input"> </div>
					<input name="s" id="mod-search-searchword" class="form-control input-lg" type="text" placeholder="Search..." value="<?php echo esc_attr_x( 'Search', 'Search form field placeholder text.', 'nus-astra' ); ?>" onfocus="if (this.value == '<?php echo esc_attr_x( 'Search', 'Search form field placeholder text.', 'nus-astra' ); ?>') { this.value = ''; }" onblur="if (this.value == '') this.value='<?php echo esc_attr_x( 'Search', 'Search form field placeholder text.', 'nus-astra' ); ?>';">
					<input type="hidden" name="domains" value="<?php echo esc_url( home_url() ); ?>" />
					<input type="hidden" name="sitesearch" value="<?php echo esc_url( home_url() ); ?>" />
				</form>
			</div>
		</div>
	</div>
	<!-- NUS SEARCH - ENDS -->
	<?php
	}
	add_action( 'astra_masthead_bottom', 'nus_top_search_form_markup', 8 );
}


function nus_mobile_change_header_breakpoint() {
 return 991;
};

add_filter( 'astra_header_break_point', 'nus_mobile_change_header_breakpoint' );

/**
 * Filter the Global Settings Options.
 * Media breakpoints and form title have been changed.
 */
function wb_builder_register_settings_form_short( $form, $id ) {
	if ( 'global' == $id ) {
    // Modify the form title and media breakpoints.
	$form['title'] = 'Beaverton Global Settings';
	$form['tabs']['general']['sections']['rows']['fields']['row_width']['default'] = '1180';
	$form['tabs']['general']['sections']['rows']['fields']['row_padding']['default'] = '0';
	$form['tabs']['general']['sections']['responsive']['fields']['responsive_breakpoint']['default'] = '767';
	$form['tabs']['general']['sections']['responsive']['fields']['medium_breakpoint']['default'] = '991';
   }
   return $form;
}
add_filter( 'fl_builder_register_settings_form', 'wb_builder_register_settings_form_short', 10, 2 );

function your_prefix_post_title() {
    $post_types = array('page');
    // bail early if the current post type if not the one we want to customize.
	if ( ! in_array( get_post_type(), $post_types ) ) { return; } // Disable Post featured image.
		add_filter( 'astra_the_title_enabled', '__return_false' );
}
add_action( 'wp', 'your_prefix_post_title' );



function top_breadcrumbs() {
	$output = "";
	// Settings
			 $separator          = '&gt;';
			 $separator          = null;
			 $breadcrums_id      = 'breadcrumbs';
			 $breadcrums_class   = 'breadcrumbs';
			 $home_title         = '';
			 // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
			 $custom_taxonomy    = 'product_cat';
			 // Get the query & post information
			 global $post,$wp_query;

			 $output = '<div class="custom-breadcrumbs">';
			 // Do not display on the homepage
			 if ( !is_front_page() ) {

					 // Build the breadcrums

					 $output .=  '<ul>';

					 // Home page
					 $output .=  '<li class="item-home"><span class="fas fa-home"></span><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
					 //$output .=  '<li class="separator separator-home"> ' . $separator . ' </li>';

					 if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

							 $output .=  '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

					 } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

							 // If post is a custom post type
							 $post_type = get_post_type();

							 // If it is a custom post type display name and link
							 if($post_type != 'post') {

									 $post_type_object = get_post_type_object($post_type);
									 $post_type_archive = get_post_type_archive_link($post_type);

									 $output .=  '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
									 $output .=  '<li class="separator"> ' . $separator . ' </li>';

							 }

							 $custom_tax_name = get_queried_object()->name;
							 $output .=  '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

					 } else if ( is_single() ) {

							 // If post is a custom post type
							 $post_type = get_post_type();

							 // If it is a custom post type display name and link
							 if($post_type != 'post') {

									 $post_type_object = get_post_type_object($post_type);
									 $post_type_archive = get_home_url()."/".$post_type_object->rewrite['slug'];

									 $output .=  '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
									 //$output .=  '<li class="separator"> ' . $separator . ' </li>';

							 }

							 // Get post category info
							 $category = get_the_category();

							 if(!empty($category)) {

									 // Get last category post is in
									 $last_category = end(array_values($category));

									 // Get parent any categories and create array
									 $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
									 $cat_parents = explode(',',$get_cat_parents);

									 // Loop through parent categories and store in variable $cat_display
									 $cat_display = '';
									 foreach($cat_parents as $parents) {
											 $cat_display .= '<li class="item-cat">'.$parents.'</li>';
											 //$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
									 }

							 }

							 // If it's a custom post type within a custom taxonomy
							 $taxonomy_exists = taxonomy_exists($custom_taxonomy);
							 if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

									 $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
									 $cat_id         = $taxonomy_terms[0]->term_id;
									 $cat_nicename   = $taxonomy_terms[0]->slug;
									 $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
									 $cat_name       = $taxonomy_terms[0]->name;

							 }

							 // Check if the post is in a category
							 if(!empty($last_category)) {
									 $output .=  $cat_display;
									 $output .=  '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

							 // Else if post is in a custom taxonomy
							 } else if(!empty($cat_id)) {

									 $output .=  '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
									 $output .=  '<li class="separator"> ' . $separator . ' </li>';
									 $output .=  '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

							 } else {

									 $output .=  '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

							 }

					 } else if ( is_category() ) {

							 // Category page
							 $output .=  '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

					 } else if ( is_page() ) {

							 // Standard page
							 if( $post->post_parent ){

									 // If child page, get parents
									 $anc = get_post_ancestors( $post->ID );

									 // Get parents in the right order
									 $anc = array_reverse($anc);

									 // Parent page loop
									 $parents = "";
									 foreach ( $anc as $ancestor ) {
											 $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
											 //$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
									 }

									 // Display parent pages
									 $output .=  $parents;

									 // Current page
									 $output .=  '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

							 } else {

									 // Just display current page if not parents
									 $output .=  '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

							 }

					 } else if ( is_tag() ) {

							 // Tag page

							 // Get tag information
							 $term_id        = get_query_var('tag_id');
							 $taxonomy       = 'post_tag';
							 $args           = 'include=' . $term_id;
							 $terms          = get_terms( $taxonomy, $args );
							 $get_term_id    = $terms[0]->term_id;
							 $get_term_slug  = $terms[0]->slug;
							 $get_term_name  = $terms[0]->name;

							 // Display the tag name
							 $output .=  '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

					 } elseif ( is_day() ) {

							 // Day archive

							 // Year link
							 $output .=  '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
							 $output .=  '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

							 // Month link
							 $output .=  '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
							 $output .=  '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

							 // Day display
							 $output .=  '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

					 } else if ( is_month() ) {

							 // Month Archive

							 // Year link
							 $output .=  '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
							 $output .=  '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

							 // Month display
							 $output .=  '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

					 } else if ( is_year() ) {

							 // Display year archive
							 $output .=  '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

					 } else if ( is_author() ) {

							 // Auhor archive

							 // Get the author information
							 global $author;
							 $userdata = get_userdata( $author );

							 // Display author name
							 $output .=  '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

					 } else if ( get_query_var('paged') ) {

							 // Paginated archives
							 $output .=  '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

					 } else if ( is_search() ) {

							 // Search results page
							 $output .=  '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

					 } elseif ( is_404() ) {

							 // 404 page
							 $output .=  '<li>' . 'Error 404' . '</li>';
					 }

					 $output .=  '</ul>';


			 } else {
						$output .=  '<ul>';
					 $output .=  '<li class="item-home"><span class="icon faicon fa-map-marker"></span><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
					 $output .=  '</ul>';
			 }
			 $output .= '</div>';
	return $output;
}
add_shortcode('breadcrumbs', 'top_breadcrumbs');


function footer_breadcrumbs() {
	$output = "";
	// Settings
	$separator          = '&gt;';
	$separator          = null;
	$breadcrums_id      = 'breadcrumbs';
	$breadcrums_class   = 'breadcrumbs';
	$home_title         = 'Home';
	// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	$custom_taxonomy    = 'product_cat';
	// Get the query & post information
	global $post,$wp_query;

	$output = '<div class="nus-breadcrumbs"><div class="ast-container">';
	// Do not display on the homepage
	if ( !is_front_page() ) {

		 // Build the breadcrums

		 $output .=  '<ul>';

		 // Home page
		 $output .=  '<li class="item-home"><span class="fas fa-map-marker-alt"></span><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		 //$output .=  '<li class="separator separator-home"> ' . $separator . ' </li>';

		 if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

				 $output .=  '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

		 } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

				 // If post is a custom post type
				 $post_type = get_post_type();

				 // If it is a custom post type display name and link
				 if($post_type != 'post') {

						 $post_type_object = get_post_type_object($post_type);
						 $post_type_archive = get_post_type_archive_link($post_type);

						 $output .=  '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
						 $output .=  '<li class="separator"> ' . $separator . ' </li>';

				 }

				 $custom_tax_name = get_queried_object()->name;
				 $output .=  '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

		 } else if ( is_single() ) {

				 // If post is a custom post type
				 $post_type = get_post_type();

				 // If it is a custom post type display name and link
				 if($post_type != 'post') {

						 $post_type_object = get_post_type_object($post_type);
						 $post_type_archive = get_home_url()."/".$post_type_object->rewrite['slug'];

						 $output .=  '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
						 //$output .=  '<li class="separator"> ' . $separator . ' </li>';

				 }

				 // Get post category info
				 $category = get_the_category();

				 if(!empty($category)) {

						 // Get last category post is in
						 $last_category = end(array_values($category));

						 // Get parent any categories and create array
						 $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
						 $cat_parents = explode(',',$get_cat_parents);

						 // Loop through parent categories and store in variable $cat_display
						 $cat_display = '';
						 foreach($cat_parents as $parents) {
								 $cat_display .= '<li class="item-cat">'.$parents.'</li>';
								 //$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
						 }

				 }

				 // If it's a custom post type within a custom taxonomy
				 $taxonomy_exists = taxonomy_exists($custom_taxonomy);
				 if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

						 $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
						 $cat_id         = $taxonomy_terms[0]->term_id;
						 $cat_nicename   = $taxonomy_terms[0]->slug;
						 $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
						 $cat_name       = $taxonomy_terms[0]->name;

				 }

				 // Check if the post is in a category
				 if(!empty($last_category)) {
						 $output .=  $cat_display;
						 $output .=  '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

				 // Else if post is in a custom taxonomy
				 } else if(!empty($cat_id)) {

						 $output .=  '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
						 $output .=  '<li class="separator"> ' . $separator . ' </li>';
						 $output .=  '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

				 } else {

						 $output .=  '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

				 }

		 } else if ( is_category() ) {

				 // Category page
				 $output .=  '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

		 } else if ( is_page() ) {

				 // Standard page
				 if( $post->post_parent ){

						 // If child page, get parents
						 $anc = get_post_ancestors( $post->ID );

						 // Get parents in the right order
						 $anc = array_reverse($anc);

						 // Parent page loop
						 $parents = "";
						 foreach ( $anc as $ancestor ) {
								 $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
								 //$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
						 }

						 // Display parent pages
						 $output .=  $parents;

						 // Current page
						 $output .=  '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

				 } else {

						 // Just display current page if not parents
						 $output .=  '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

				 }

		 } else if ( is_tag() ) {

				 // Tag page

				 // Get tag information
				 $term_id        = get_query_var('tag_id');
				 $taxonomy       = 'post_tag';
				 $args           = 'include=' . $term_id;
				 $terms          = get_terms( $taxonomy, $args );
				 $get_term_id    = $terms[0]->term_id;
				 $get_term_slug  = $terms[0]->slug;
				 $get_term_name  = $terms[0]->name;

				 // Display the tag name
				 $output .=  '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

		 } elseif ( is_day() ) {

				 // Day archive

				 // Year link
				 $output .=  '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
				 $output .=  '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

				 // Month link
				 $output .=  '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
				 $output .=  '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

				 // Day display
				 $output .=  '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

		 } else if ( is_month() ) {

				 // Month Archive

				 // Year link
				 $output .=  '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
				 $output .=  '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

				 // Month display
				 $output .=  '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

		 } else if ( is_year() ) {

				 // Display year archive
				 $output .=  '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

		 } else if ( is_author() ) {

				 // Auhor archive

				 // Get the author information
				 global $author;
				 $userdata = get_userdata( $author );

				 // Display author name
				 $output .=  '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

		 } else if ( get_query_var('paged') ) {

				 // Paginated archives
				 $output .=  '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

		 } else if ( is_search() ) {

				 // Search results page
				 $output .=  '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

		 } elseif ( is_404() ) {

				 // 404 page
				 $output .=  '<li>' . 'Error 404' . '</li>';
		 }

		 $output .=  '</ul>';


	} else {
			$output .=  '<ul>';
		 $output .=  '<li class="item-home"><span class="fas fa-map-marker-alt"></span><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
	}
	$output .= '</div></div>';
	return $output;
}
add_shortcode('footer_breadcrumbs', 'footer_breadcrumbs');



function printPages($total){
	$pages = ceil($total/12);
	$page = 1;
	if (isset($_POST['pagenumber']))
		$page = $_POST['pagenumber'];
	else
		$page = 1;

	$min = $page - 3;
	if($min <= 0){$min = 1;}

	$max = $min + 6;
	$output = "<div class='fl-row-fixed-width fl-row'>";
	$output .= "<div class='fl-col col-md-12 col-12'>";
	$output .= "<div class='page-buttons'>";
	$output .= "<ul class='pagination'>";
	if ($min > 1){
		$prev = $min - 1;
		$output .= "<li class='page-item'><a class='page-link' href='javascript:keepPages(".$prev.")'><<</a></li>";
	}
	for ($i = $min; $i <= $max; $i++){
		if($i <= $pages){
			if ($page == $i){
				$output .= "<li class='page-item current-pagination-item'><a class='page-link' href='javascript:keepPages(".$i.")''>".$i."</a></li>";
			}else{
				$output .= "<li class='page-item'><a class='page-link' href='javascript:keepPages(".$i.")'>".$i."</a></li>";
			}
		}
	}

	if ($max < $pages)
		$output .= "<li class='page-item'><a class='page-link' href='javascript:keepPages(".$i.")'>>></a></li>";

	$output .= "</ul>";
	$output .= "</div>";
	$output .= "</div>";
	$output .= "</div>";

	return $output;
}