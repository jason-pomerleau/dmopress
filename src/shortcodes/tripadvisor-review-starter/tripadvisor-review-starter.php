
<?php 

//[tripadvisor-reviews-button post_id=""]
function tourismpress_tripadvisor_review_starter($atts, $content = null){
	global $google_maps_api_key;

	$atts = shortcode_atts(array(
		'place_id' => '',
        'is_wide' => 'false',
	), $atts);


	//Resolve Place ID
	if(esc_attr($atts['place_id']) != ''){
		$post_id = esc_attr($atts['place_id']);
	} else {
		$post_id = get_the_ID();
	}

    //Resolve TripAdvisorLocationID
    $location_id = get_post_meta( $post_id, 'tripadvisor_location_id', true );
    if($location_id != ''){

        ob_start();
?>

<div id="TA_cdswritereviewlg979" class="TA_cdswritereviewlg">
    <ul id="U3694tnY" class="TA_links sONEpli1a">
        <li id="nRQkId" class="IaVhWu4Pao">
            <a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/medium-logo-12097-2.png" alt="TripAdvisor"/></a>
        </li>
    </ul>
</div>
<script src="https://www.jscache.com/wejs?wtype=cdswritereviewlg&amp;uniq=979&amp;locationId=<?php echo $location_id; ?>&amp;lang=en_US&amp;lang=en_US&amp;display_version=2"></script>


<?php

        return ob_get_clean();
    } else {
        echo "Error: Invalid TripAdvisor Location ID: ".$location_id;
    }
}
add_shortcode( 'tripadvisor-review-starter', 'tourismpress_tripadvisor_review_starter' );