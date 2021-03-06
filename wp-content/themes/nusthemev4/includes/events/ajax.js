jQuery( document ).ready( function(){

  var events_filter_form    = jQuery( '#form-event-filter' );

  var events_submit_btn     = events_filter_form.find('input[type="submit"]');
  var events_month_select     = events_filter_form.find('#eventmonth');
  var events_year_select     = events_filter_form.find('#eventyear');
  var events_nonce     = events_filter_form.find('#events_nonce');

  var events_result_cont     = jQuery('#event-listing-widget');
  var events_cal_result    = jQuery( '#events-module-cal' );

  events_submit_btn.on('click', function(evt){
    evt.preventDefault();

    var ajaxurl     = event_var.ajaxurl;
    var nonce_val   = events_nonce.val();

    var month_val     = events_month_select.val();
    var year_val     = events_year_select.val();
    console.log('fire');

    jQuery.ajax({
        type : "post",
        dataType : "html",
        url : ajaxurl,
        data : {
            action : "event_list_ajax",
            eventmonth : month_val,
            eventyear : year_val,
            nonce : nonce_val
        },
        success:function(response) {
          events_result_cont.replaceWith(response);
        }
    });

    jQuery.ajax({
        type : "post",
        dataType : "html",
        url : ajaxurl,
        data : {
            action : "event_cal_ajax",
            eventmonth : month_val,
            eventyear : year_val,
            nonce : nonce_val
        },
        success:function(response) {
          events_cal_result.replaceWith(response);
        }
    });

    events_result_cont     = jQuery('#event-listing-widget');
    events_cal_result    = jQuery( '#events-module-cal' );
  });
});
