<?php

//--------------------- start home widget ----------------------------//

function shortcode_eventshomewidget() {

	$posts = get_posts(array(
	'posts_per_page'	=> 3,
	'post_type' => 'events',
	'post_status' => 'publish',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC',
	'meta_query'	=> array(
		'relation'		=> 'AND',
		array(
			'key'		=> 'start_date',
			'value'		=> current_time('Ymd'),
			'compare'	=> '>='
		)
	)
	));

  $output = "No records.";
  	if ($posts) {
  		$output = "<div class='row home-upcoming-event row-eq-height'>";
  		foreach ($posts as $post){
  			setup_postdata($post);
  			$term = get_the_terms($post->ID,"event-category");
  			//get all the information
  			$date = date("d", strtotime(str_replace('/', '-',get_field('start_date',$post->ID))));
  			$month = date("M", strtotime(str_replace('/', '-',get_field('start_date',$post->ID))));

  			$output .= "<div class='col-lg-4 col-md-6 col-sm-12 col-xs-12 row-eq-height'>";
  				$output .= "<div class='event-block'>";
  					$output .= "<div class='event-date'>";
  						$output .= "<span><h4>".$date."</h6></span>";
  						$output .= "<span><h6>".$month."</h6></span>";
  					$output .= "</div>";
  					$output .= "<div class='event-desc'>";
  						$output .= "<div class='event-cat'>".$term[0]->name."</div>";
  						$output .= "<a href='".get_permalink($post->ID)."'>";
  						$output .= "<div class='event-title'>";
  							//$output .= "<h5>". mb_strimwidth( $post->post_title , 0, 100, '...') ."</h5>";
							$output .= "<h5>".$post->post_title."</h5>";
  						$output .= "</div>";
  						$output .= "<div class='event-info'>";
  							$output .= "<div class='event-venue'>";
							$output .= get_field('venue',$post->ID);
  							$output .= "</div>";
							$output .= "<div class='event-time'>";
  							$output .= get_field('time',$post->ID);
							$output .= "</div>";
  						$output .= "</div>";
  						$output .= "</a>";
  					$output .= "</div>";
				$output .= "</div>";
			$output .= "</div>";
		}
	}
	return $output;
}
add_shortcode('event_homewidget', 'shortcode_eventshomewidget');



function shortcode_calendar() {

	if (isset($_POST['eventyear'])){
		$month = sprintf('%02d', $_POST['eventmonth']);
		$getYearStart =	array('key' => 'start_date','value' => $_POST['eventyear'].$month.'01' ,'compare' => '>=') ;
		$getYearEnd =	array('key' => 'start_date','value' => $_POST['eventyear'].$month.'31' ,'compare' => '<=') ;
	} else {
		$getYearStart =	array('key' => 'start_date','value' => date('Y').date('m').'01' ,'compare' => '>=') ;
		$getYearEnd =	array('key' => 'start_date','value' => date('Y').date('m').'31' ,'compare' => '<=') ;
	}

	$posts = get_posts(array(
	'posts_per_page'	=> -1,
	'post_type' => 'events',
	'post_status' => 'publish',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC',
	'meta_query' => array(
			'relation' => 'AND',
			$getYearStart,
			$getYearEnd
		)
	));


	$arrDates = array();
	if ($posts) {
		foreach ($posts as $post){
			$arrDates[] = substr(get_field('start_date',$post->ID), -2);
		}
	}

	$calendar = new Calendar();

	return $calendar->show($arrDates);
}
add_shortcode('event_calendar', 'shortcode_calendar');



function shortcode_eventsFilterYear() {
	$oldestYear = 2013;
	$output = "<form action='".home_url()."/events/' method='post' id='form-event-filter'>";
	$output .= "<div class='row'>";
		$output .= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 event-filter'>";
			$output .= "<div class='label'>Filter by: </div>";
				$output .= "<select name='eventmonth' id='eventmonth' class='form-control' oninput='javascript:submitEventForm();'>";
				for ($i = 1; $i <= 12; $i++ ) {
					$dateObj   = DateTime::createFromFormat('!m', $i);
					$monthName = $dateObj->format('F'); // March
					if (isset($_POST['eventmonth']) && $_POST['eventmonth'] == $i && is_numeric($_POST['eventmonth']))
						$output .= "<option value='".$i."' selected>". $monthName ."</option>";
					else if ($i == date('m') && !isset($_POST['eventmonth']))
						$output .= "<option value='".$i."' selected>". $monthName ."</option>";
					else
						$output .= "<option value='".$i."'>". $monthName ."</option>";
					}
				$output .= "</select>";


			if ($oldestYear > 0){
				$output .= "<select name='eventyear' id='eventyear' class='form-control' oninput='javascript:submitEventForm();' >";
				for ($i = date("Y")+1; $i >= $oldestYear; $i-- ) {
					if (isset($_POST['eventyear']) && $_POST['eventyear'] == $i && is_numeric($_POST['eventyear']))
						$output .= "<option value='".$i."' selected>". $i ."</option>";
					else if ($i == date('Y') && !isset($_POST['eventyear']))
						$output .= "<option value='".$i."' selected>". $i ."</option>";
					else
						$output .= "<option value='".$i."'>". $i ."</option>";
					}
				$output .= "</select>";
			}
		$output .= "</div>";
	$output .= "</div>";
	$output .= '<input type="submit" style="display: none;"/>';
	$output .= '<input type="hidden" value="'. wp_create_nonce("events_nonce") .'" name="events_nonce" id="events_nonce" />';
	$output .= '<input type="hidden" value="event_filter_ajax" name="events_ajax_action" id="events_ajax_action" />';
	$output .= "</form>";
	$output .= do_shortcode("[event_calendar]");
	return $output;
}

add_shortcode('event_filterYear', 'shortcode_eventsFilterYear');


//--------------------- Event listing widget ----------------------------//

function shortcode_eventslistingwidget() {

	$month = "";
	$year = "";

	if (isset($_POST['eventyear']) || isset($_POST['eventmonth'])){
		$month = sprintf('%02d', $_POST['eventmonth']);
		$year = $_POST['eventyear'];
		$getYearStart =	array('key' => 'start_date','value' => $_POST['eventyear'].$month.'01' ,'compare' => '>=') ;
		$getYearEnd =	array('key' => 'start_date','value' => $_POST['eventyear'].$month.'31' ,'compare' => '<=') ;
	} else {
		$month = date('m');
		$year = date('Y');
		$getYearStart =	array('key' => 'start_date','value' => date('Y').date('m').'01' ,'compare' => '>=') ;
		$getYearEnd =	array('key' => 'start_date','value' => date('Y').date('m').'31' ,'compare' => '<=') ;
	}

	$posts = get_posts(array(
	'posts_per_page'	=> -1,
	'post_type' => 'events',
	'post_status' => 'publish',
	'orderby'			=> 'meta_value',
	'order'				=> 'ASC',
	'meta_query' => array(
			'relation' => 'AND',
			$getYearStart,
			$getYearEnd
		)
	));

	$dateObj   = DateTime::createFromFormat('m', $month);
	$monthName = $dateObj->format('F'); // March

	$output = "<div id='event-listing-widget'>";
	$output .= "<div class='row row-eq-height'>";
	$output .= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 row-eq-height'>";
	$output .= "<h3><strong>".$monthName." ".$year."</strong></h3>";
	$output .= "</div></div>";


  	if ($posts) {
  		$output .= "<div class='row event-page row-eq-height'>";
  		foreach ($posts as $post){
  			setup_postdata($post);
  			$term = get_the_terms($post->ID,"event-category");
  			//get all the information
  			$date = date("d", strtotime(str_replace('/', '-',get_field('start_date',$post->ID))));
  			$month = date("M", strtotime(str_replace('/', '-',get_field('start_date',$post->ID))));

  			$output .= "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 row-eq-height'>";
  				$output .= "<div class='event-block'>";
  					$output .= "<div class='event-date'>";
  						$output .= "<span><h4>".$date."</h6></span>";
  						$output .= "<span><h6>".$month."</h6></span>";
  					$output .= "</div>";
  					$output .= "<div class='event-desc'>";
  						$output .= "<div class='event-cat'>".$term[0]->name."</div>";
  						$output .= "<a href='".get_permalink($post->ID)."'>";
  						$output .= "<div class='event-title'>";
  							//$output .= "<h5>". mb_strimwidth( $post->post_title , 0, 100, '...') ."</h5>";
							$output .= "<h5>".$post->post_title."</h5>";
  						$output .= "</div>";
  						$output .= "<div class='event-info'>";
  							$output .= "<div class='event-venue'>";
							$output .= get_field('venue',$post->ID);
  							$output .= "</div>";
							$output .= "<div class='event-time'>";
  							$output .= get_field('time',$post->ID);
							$output .= "</div>";
							$output .= "<div class='event-link'>View Details ></div>";
  						$output .= "</div>";
  						$output .= "</a>";
  					$output .= "</div>";
				$output .= "</div>";
			$output .= "</div>";
		}
	} else {
		$output .= "No records.";
	}
	$output .= "</div>";
	return $output;
}
add_shortcode('event_listing', 'shortcode_eventslistingwidget');

function ajax_eventlistingwidget() {
        echo shortcode_eventslistingwidget();
   die();
}
add_action( 'wp_ajax_event_list_ajax', 'ajax_eventlistingwidget' );
add_action( 'wp_ajax_nopriv_event_list_ajax', 'ajax_eventlistingwidget' );

function ajax_eventcalwidget() {
        echo shortcode_calendar();
   die();
}
add_action( 'wp_ajax_event_cal_ajax', 'ajax_eventcalwidget' );
add_action( 'wp_ajax_nopriv_event_cal_ajax', 'ajax_eventcalwidget' );


function shortcode_eventsinfowidget() {
	if (get_field('name_speaker') != '')
		$output .= "<p>".get_field('name_speaker')."</p>";
	if (get_field('name_moderator') != '')
		$output .= "<p>".get_field('name_moderator')."</p>";
	if (get_field('start_time') != '')
		$output .= "<p>".get_field('start_time').(get_field('end_time') != ''?' to '.get_field('end_time'):'')."</p>";
	if (get_field('venue') != '')
		$output .= "<p>".get_field('venue')."</p>";
	if (get_field('type_of_participation') != '')
		if (count(get_field('type_of_participation')) > 0){
			$output .= "<p>";
		foreach (get_field('type_of_participation') as $key => $participation)
			$output .= $participation.", ";
		$output = rtrim($output,', ');
		$count .= "</p>";
	}
	return $output;
}
add_shortcode('event_info', 'shortcode_eventsinfowidget');

function addToGoogleCalendar() {

	if (get_field('start_date') !== ''){
		$startdateObj   = DateTime::createFromFormat('Ymd', get_field('start_date'));
 		$startdate = $startdateObj->format('n/j/Y');
	}
	if (get_field('end_date') != ''){
		$enddateObj   = DateTime::createFromFormat('Ymd', get_field('end_date'));
 		$enddate = $enddateObj->format('n/j/Y');
	}

	$output = '<div title="Add to Calendar" class="addeventatc">'.
						'Add to Calendar';
	$output .='<span class="start">'.$startdate." ".get_field('start_time').'</span>'.
						'<span class="end">'.$enddate." ".get_field('end_time').'</span>'.
						'<span class="timezone">Asia/Singapore</span>'.
						'<span class="title">Summary of the event</span>'.
						'<span class="description"></span>'.
						'<span class="location">Location of the event</span>'.
						'</div>';
  return $output;
}

add_shortcode('event_addtocal', 'addToGoogleCalendar');

function shortcode_sidemenu() {
	$output = '<div class="sidemenu">'.
	$output .='<ul>';
	if (get_field('side_menu') != ''){
		$sidemenu = get_field('side_menu');
		foreach ($sidemenu as $menuitem)
			$output .= "<li><a href='".$menuitem['url']."'>".$menuitem['label']."</a></li>";
	}
	$output .='</ul>';
	$output .= '</div>';
  return $output;
}

add_shortcode('event_sidemenu', 'shortcode_sidemenu');


function shortcode_eventDescription() {
	$output = '<div class="event-description">'.
		$output .= "<div class='description'><h3>Description</h3>".get_field('description')."</div>";

		if (get_field('fees_applicable')!='')
			$output .= "<div class='fees'><h3>Fees Applicable</h3>".get_field('fees_applicable')."</div>";

		if (get_field('registration')!='')
			$output .= "<div class='registration'><h3>Registration</h3>".get_field('registration')."</div>";

		if (get_field('cpd_checkbox') == true){
			$output .= "<div class='cpd'>";
				$output .= "<h3>CPD Points</h3>";
				$output .= get_field('public_cpd_points');
				$output .= get_field('practice_area');
				$output .= get_field('training_level');
			$output .= '</div>';
		}

		if (get_field('contact_information')!='')
			$output .= "<div class='contact'><h3>Contact Information</h3>".get_field('contact_information')."</div>";

		if (get_field('organised_by')!='')
		$output .= "<div class='organised'><h3>Organised By</h3>".get_field('organised_by')."</div>";

		$output .= "</div>";
  return $output;
}

add_shortcode('event_description', 'shortcode_eventDescription');
