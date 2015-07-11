#Real Homes Add-On

##Custom fields used by theme: 

* **REAL_HOMES_property_images**: Takes the attachment_id of an image. No arrays, just use add_post_meta.

* **REAL_HOMES_attachments**: Takes the attachment_id of a file attachment. No arrays, just use add_post_meta.

* **REAL_HOMES_slider_image**: Takes the attachment_id of one image.

* **REAL_HOMES_page_banner_image**: Takes the attachment_id of one image.

* **REAL_HOMES_property_price**: Regular text field - only digits. Example Value: 435000

* **REAL_HOMES_property_price_postfix**: Regular text field.

* **REAL_HOMES_property_size**: Regular text field - only digits. Example Value: 2500

* **REAL_HOMES_property_size_postfix**: Regular text field.

* **REAL_HOMES_property_bedrooms**: Regular text field - only digits. Example Value: 4

* **REAL_HOMES_property_bathrooms**: Regular text field - only digits. Example Value: 2

* **REAL_HOMES_property_garage**: Regular text field - only digits. Example Value: 1

* **REAL_HOMES_property_id**: Regular text field - only digits. Does this default to post ID?

* **REAL_HOMES_property_address**: Properly formatted address. Get from Google? Example: 1302 Delaware Avenue, Santa Cruz, CA 95060, USA

* **REAL_HOMES_property_location**: House coordinates. Example: 36.9569061,-122.03983189999997

* **REAL_HOMES_gallery_slider_type**: Radio selector. 
	
	* 'thumb-on-right' => 'Gallery with thumbnails on right'
	* 'thumb-on-bottom' => 'Gallery with thumbnails on bottom'

* **REAL_HOMES_tour_video_url**: Text field. Provide virtual tour video URL. YouTube, Vimeo, SWF File and MOV File are supported. 

* **REAL_HOMES_tour_video_image**: Takes the attachment_id of one image.

* **REAL_HOMES_agent_display_option**: Radio selector - What to display in agent information box?.

	* 'my_profile_info' => 'Author information.'
	* 'agent_info' => 'Agent Information. ( Select the agent below )'
	* 'none' => 'None. ( Hide information box )'

* **REAL_HOMES_agents**: Takes the post ID of the agent.

* **REAL_HOMES_featured**: Radio selector - Mark this property as featured?

	* '1' => 'Yes'
	* '0' => 'No'

* **REAL_HOMES_property_private_note**: Regular text field.

* **REAL_HOMES_add_in_slider**: Radio selector - Do you want to add this property in Homepage Slider?

	* 'yes' => 'Yes'
		* add image
	* 'no' => 'No'

* **REAL_HOMES_additional_details**: Serialized array of details.

	* 'Additional Detail 1' => 'Additional Value 1'


## To Do

* Geo is totally broken

## Add-On Issues

* Remove $import_options

* Radio default selection

* Add to existing puts all images into Gallery Images. Need to debug.

* In logs: not a valid image and cannot be set as featured one

	Looks like WPAI is trying to add all images as featured image

* Front end testing? Visual composer?