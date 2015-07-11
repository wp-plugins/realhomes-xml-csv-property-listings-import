<?php

/*
Plugin Name: WP All Import - Real Homes Add-On
Plugin URI: http://www.wpallimport.com/
Description: Supporting imports into the Real Homes theme.
Version: 1.0.1
Author: Soflyy
*/


include "rapid-addon.php";

$realhomes_addon = new RapidAddon( 'RealHomes Add-On', 'realhomes_addon' );

$realhomes_addon->disable_default_images();

$realhomes_addon->import_images( 'gallery_images', 'Gallery Images' );

function gallery_images( $post_id, $attachment_id, $image_filepath, $import_options ) {
    
    add_post_meta( $post_id, 'REAL_HOMES_property_images', $attachment_id ) || update_post_meta( $post_id, 'REAL_HOMES_property_images', $attachment_id );
    
}

$realhomes_addon->import_files( 'property_attachments', 'Property Attachments' );

function property_attachments( $post_id, $attachment_id, $image_filepath, $import_options ) {
    
    add_post_meta( $post_id, 'REAL_HOMES_attachments', $attachment_id ) || update_post_meta( $post_id, 'REAL_HOMES_attachments', $attachment_id );
    
}

$realhomes_addon->add_field( 'REAL_HOMES_property_price', 'Sale or Rent Price', 'text', null, 'Only digits, example: 435000' );

$realhomes_addon->add_field( 'REAL_HOMES_property_price_postfix', 'Price Postfix', 'text', null, 'Example: Per Month' );

$realhomes_addon->add_field( 'REAL_HOMES_property_size', 'Area Size', 'text', null, 'Only digits, example: 2500' );

$realhomes_addon->add_field( 'REAL_HOMES_property_size_postfix', 'Area Size Postfix', 'text', null, 'Example: Sq Ft' );

$realhomes_addon->add_field( 'REAL_HOMES_property_bedrooms', 'Bedrooms', 'text', null, 'Only digits, example: 4' );

$realhomes_addon->add_field( 'REAL_HOMES_property_bathrooms', 'Bathrooms', 'text', null, 'Only digits, example: 2' );

$realhomes_addon->add_field( 'REAL_HOMES_property_garage', 'Garages', 'text', null, 'Only digits, example: 1' );

$realhomes_addon->add_field( 'REAL_HOMES_agents', 'Agent', 'text' );

$realhomes_addon->add_field( 'REAL_HOMES_add_in_slider', 'Add this property to Homepage Slider?', 'radio', array(
    'no' => 'No',
    'yes' =>'Yes',
) );

$realhomes_addon->add_field( 'REAL_HOMES_slider_image', 'Slider Image', 'image', null, 'Recommended image size is 2000px by 700px. May use bigger or smaller image but keep the same height to width ratio and use the exact same size for all images in slider.' );

$realhomes_addon->add_field( 'REAL_HOMES_gallery_slider_type', 'Gallery Type', 'radio', array(
    'thumb-on-right' => 'Thumbnails on right',
    'thumb-on-bottom' => 'Thumbnails on bottom' 
) );

$realhomes_addon->add_field( 'REAL_HOMES_page_banner_image', 'Top Banner Image', 'image', null, 'Optional: If left unset default banner image uploaded to theme options will be used. Image must have minimum width of 2000px and minimum height of 230px.' );

$realhomes_addon->add_field( 'REAL_HOMES_tour_video_url', 'Virtual Tour Video URL', 'text', null, 'Provide virtual tour video URL. YouTube, Vimeo, SWF File and MOV File are supported.' );

$realhomes_addon->add_field( 'REAL_HOMES_tour_video_image', 'Virtual Video Tour Image', 'image', null, 'Will be displayed as a place holder. Required for the video to be displayed. Minimum width of 818px and minimum height 417px. Larger sizes will be cropped.' );

$realhomes_addon->add_field(
	'location_settings',
	'Property Map Location',
	'radio', 
	array(
		'search_by_address' => array(
			'Search by Address',
			$realhomes_addon->add_options( 
				$realhomes_addon->add_field(
					'REAL_HOMES_property_address',
					'Property Address',
					'text'
				),
				'Google Geocode API Settings', 
				array(
					$realhomes_addon->add_field(
						'address_geocode',
						'Request Method',
						'radio',
						array(
							'address_no_key' => array(
								'No API Key',
								'Limited number of requests.'
							),
							'address_google_developers' => array(
								'Google Developers API Key - <a href="https://developers.google.com/maps/documentation/geocoding/#api_key">Get free API key</a>',
								$realhomes_addon->add_field(
									'address_google_developers_api_key', 
									'API Key', 
									'text'
								),
								'Up to 2500 requests per day and 5 requests per second.'
							),
							'address_google_for_work' => array(
								'Google for Work Client ID & Digital Signature - <a href="https://developers.google.com/maps/documentation/business">Sign up for Google for Work</a>',
								$realhomes_addon->add_field(
									'address_google_for_work_client_id', 
									'Google for Work Client ID', 
									'text'
								), 
								$realhomes_addon->add_field(
									'address_google_for_work_digital_signature', 
									'Google for Work Digital Signature', 
									'text'
								),
								'Up to 100,000 requests per day and 10 requests per second'
							)
						) // end Request Method options array
					) // end Request Method nested radio field 
				) // end Google Geocode API Settings fields
			) // end Google Gecode API Settings options panel
		), // end Search by Address radio field
		'search_by_coordinates' => array(
			'Search by Coordinates',
			$realhomes_addon->add_field(
				'property_latitude', 
				'Latitude', 
				'text', 
				null, 
				'Example: 34.0194543'
			),
			$realhomes_addon->add_options( 
				$realhomes_addon->add_field(
					'property_longitude', 
					'Longitude', 
					'text', 
					null, 
					'Example: -118.4911912'
				), 
				'Google Geocode API Settings', 
				array(
					$realhomes_addon->add_field(
						'coord_geocode',
						'Request Method',
						'radio',
						array(
							'coord_no_key' => array(
								'No API Key',
								'Limited number of requests.'
							),
							'coord_google_developers' => array(
								'Google Developers API Key - <a href="https://developers.google.com/maps/documentation/geocoding/#api_key">Get free API key</a>',
								$realhomes_addon->add_field(
									'coord_google_developers_api_key', 
									'API Key', 
									'text'
								),
								'Up to 2500 requests per day and 5 requests per second.'
							),
							'coord_google_for_work' => array(
								'Google for Work Client ID & Digital Signature - <a href="https://developers.google.com/maps/documentation/business">Sign up for Google for Work</a>',
								$realhomes_addon->add_field(
									'coord_google_for_work_client_id', 
									'Google for Work Client ID', 
									'text'
								), 
								$realhomes_addon->add_field(
									'coord_google_for_work_digital_signature', 
									'Google for Work Digital Signature', 
									'text'
								),
								'Up to 100,000 requests per day and 10 requests per second'
							)
						) // end Geocode API options array
					) // end Geocode nested radio field 
				) // end Geocode settings
			) // end coordinates Option panel
		) // end Search by Coordinates radio field
	) // end Property Location radio field
);

$realhomes_addon->add_options( null, 'Advanced Settings', array(

    $realhomes_addon->add_field( 'REAL_HOMES_property_id', 'Property ID', 'text', null, 'To help search directly for a property' ),

    $realhomes_addon->add_field( 'details_titles', 'Additional Details - Titles', 'text', null, 'Comma delimited list of Additional Details Titles' ),

    $realhomes_addon->add_field( 'details_values', 'Additional Details - Values', 'text', null, 'Comma delimited list of Additional Details Values' ),

    $realhomes_addon->add_field( 'REAL_HOMES_property_private_note', 'Private Note', 'text', null, 'Only visible in the admin area.' ),

    $realhomes_addon->add_field( 'REAL_HOMES_featured', 'Featured Property?', 'radio', array(
        '0' => 'No',
        '1' => 'Yes'
    ) ),

    $realhomes_addon->add_field( 'REAL_HOMES_agent_display_option', 'What to display in agent information box?', 'radio', array(
        'agent_info' => 'Agent Information',
        'my_profile_info' => 'Author Information',
        'none' => 'Hide Information Box' 
    ) )
) );

$realhomes_addon->set_import_function( 'realhomes_addon_import' );

$realhomes_addon->admin_notice();

$realhomes_addon->run( array(
		"themes" => array( "RealHomes Theme" ),
		"post_types" => array( "property" ) 
) );

function realhomes_addon_import( $post_id, $data, $import_options ) {
    
    global $realhomes_addon;
    
    // all fields except for slider and image fields
    $fields = array(
        'REAL_HOMES_property_price',
        'REAL_HOMES_property_price_postfix',
        'REAL_HOMES_property_size',
        'REAL_HOMES_property_size_postfix',
        'REAL_HOMES_property_bedrooms',
        'REAL_HOMES_property_bathrooms',
        'REAL_HOMES_property_garage',
        'REAL_HOMES_tour_video_url',
        'REAL_HOMES_property_id',
        'REAL_HOMES_property_private_note',
        'REAL_HOMES_featured',
        'REAL_HOMES_add_in_slider',
        'REAL_HOMES_agent_display_option',
        'REAL_HOMES_gallery_slider_type' 
    );
    
    // image fields
    $image_fields = array(
        'REAL_HOMES_slider_image',
        'REAL_HOMES_page_banner_image',
        'REAL_HOMES_tour_video_image' 
    );
    
    $fields = array_merge( $fields, $image_fields );
    
    // update everything in fields arrays
    foreach ( $fields as $field ) {

        if ( $realhomes_addon->can_update_meta( $field, $import_options ) ) {

            if ( in_array( $field, $image_fields ) ) {

                if ( $realhomes_addon->can_update_image( $import_options ) ) {

                    $id = $data[$field]['attachment_id'];

                    update_post_meta( $post_id, $field, $id );

                }

            } else {

                update_post_meta( $post_id, $field, $data[$field] );

            }
        }
    }

    // clear image fields to override import settings
    $fields = array(
    	'REAL_HOMES_attachments',
    	'REAL_HOMES_property_images'
    );

    if ( $realhomes_addon->can_update_image( $import_options ) ) {

    	foreach ($fields as $field) {

	    	delete_post_meta($post_id, $field);

	    }

    }

	// update agent, create a new one if not found
	$field = 'REAL_HOMES_agents';
	$post_type = 'agent';

	if ( $realhomes_addon->can_update_meta( $field, $import_options ) ) {

		$post = get_page_by_title( $data[$field], 'OBJECT', $post_type );

		if ( !empty( $post ) ) {

			update_post_meta( $post_id, $field, $post->ID );

		} else {

			// insert title and attach to property
			$postarr = array(
			  'post_content'   => '',
			  'post_name'      => $data[$field],
			  'post_title'     => $data[$field],
			  'post_type'      => $post_type,
			  'post_status'    => 'publish',
			  'post_excerpt'   => ''
			);

			wp_insert_post( $postarr );

			$post = get_page_by_title( $data[$field], 'OBJECT', $post_type );

			update_post_meta( $post_id, $field, $post->ID );

		}
	}
    
    // update property details
    $field = 'REAL_HOMES_additional_details';
    
    if ( $realhomes_addon->can_update_meta( $field, $import_options ) ) {
        $keys    = explode( ',', $data['details_titles'] );
        $values  = explode( ',', $data['details_values'] );
        $details = array_combine( $keys, $values );
        
        update_post_meta( $post_id, $field, $details );
    }

    // update property location
    $field   = 'REAL_HOMES_property_address';

    $address = $data[$field];

    $lat  = $data['property_latitude'];

    $long = $data['property_longitude'];
    
    //  build search query
    if ( $data['location_settings'] == 'search_by_address' ) {

    	$search = ( !empty( $address ) ? 'address=' . rawurlencode( $address ) : null );

    } else {

    	$search = ( !empty( $lat ) && !empty( $long ) ? 'latlng=' . rawurlencode( $lat . ',' . $long ) : null );

    }

    // build api key
    if ( $data['location_settings'] == 'search_by_address' ) {
    
    	if ( $data['address_geocode'] == 'address_google_developers' && !empty( $data['address_google_developers_api_key'] ) ) {
        
	        $api_key = '&key=' . $data['address_google_developers_api_key'];
	    
	    } elseif ( $data['address_geocode'] == 'address_google_for_work' && !empty( $data['address_google_for_work_client_id'] ) && !empty( $data['address_google_for_work_signature'] ) ) {
	        
	        $api_key = '&client=' . $data['address_google_for_work_client_id'] . '&signature=' . $data['address_google_for_work_signature'];

	    }

    } else {

    	if ( $data['coord_geocode'] == 'coord_google_developers' && !empty( $data['coord_google_developers_api_key'] ) ) {
        
	        $api_key = '&key=' . $data['coord_google_developers_api_key'];
	    
	    } elseif ( $data['coord_geocode'] == 'coord_google_for_work' && !empty( $data['coord_google_for_work_client_id'] ) && !empty( $data['coord_google_for_work_signature'] ) ) {
	        
	        $api_key = '&client=' . $data['coord_google_for_work_client_id'] . '&signature=' . $data['coord_google_for_work_signature'];

	    }

    }

    // if all fields are updateable and $search has a value
    if ( $realhomes_addon->can_update_meta( $field, $import_options ) && $realhomes_addon->can_update_meta( 'REAL_HOMES_property_location', $import_options ) && !empty ( $search ) ) {
        
        // build $request_url for api call
        $request_url = 'https://maps.googleapis.com/maps/api/geocode/json?' . $search . $api_key;
        $curl        = curl_init();

        curl_setopt( $curl, CURLOPT_URL, $request_url );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );

        $realhomes_addon->log( '- Getting location data from Geocoding API: '.$request_url );

        $json = curl_exec( $curl );
        curl_close( $curl );
        
        // parse api response
        if ( !empty( $json ) ) {

            $details = json_decode( $json, true );

            if ( $data['location_settings'] == 'search_by_address' ) {

	            $lat  = $details[results][0][geometry][location][lat];

	            $long = $details[results][0][geometry][location][lng];

	        } else {

	        	$address = $details[results][0][formatted_address];

	        }

        }
        
    }
    
    // update location fields
    $fields = array(
        'REAL_HOMES_property_address' => $address,
        'REAL_HOMES_property_location' => $lat . ',' . $long 
    );

    $realhomes_addon->log( '- Updating location data' );
    
    foreach ( $fields as $key => $value ) {
        
        if ( $realhomes_addon->can_update_meta( $key, $import_options ) ) {
            
            update_post_meta( $post_id, $key, $value );
        
        }
    }
}






