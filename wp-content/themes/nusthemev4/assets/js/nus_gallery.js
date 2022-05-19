jQuery( document ).ready(function() {
    jQuery.fn.updateGalleryImgTxt();
}); 

jQuery( ".fl-slideshow-nav-next" ).click(function() {
    jQuery.fn.updateGalleryImgTxt();
});

jQuery( ".fl-slideshow-nav-prev" ).click(function() {
    jQuery.fn.updateGalleryImgTxt();
});

jQuery( ".fl-slideshow-thumbs-page" ).click(function() {
    jQuery.fn.updateGalleryImgTxt();
})

jQuery('.fl-slideshow-frame').on('DOMSubtreeModified',  function(){
	jQuery.fn.updateGalleryImgTxt();
});

jQuery.fn.updateGalleryImgTxt = function(){
	var title = jQuery( ".hidden-text .fl-heading-text" ).text();
    var date = jQuery( ".hidden-text p" ).text();
    jQuery( ".fl-slideshow-caption-content" ).html('<strong>' + title + '</strong>' + '<br>' + date);
}