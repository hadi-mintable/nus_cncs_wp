jQuery(document).ready(function($) {
	var site_nav = jQuery('#site-navigation');
	site_nav.append('<a href="#" id="nav-closer"></a>');

	jQuery(document).on('click', '#nav-closer', function () {
        jQuery("button.toggled .menu-toggle-icon").trigger("click");
        return false;
    });


});
