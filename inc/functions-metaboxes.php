<?php
/**
 * Hompage meta boxes
 */

function home_meta_boxes() {

	$descUrl = 'Enter the URL from the page you want to link to. This will automatically pull in the title and image (press preview to view).';
	$descExpire = 'Date format dd/mm/yyyy. If set the content will expire at midnight on day specified and fallback content will be displayed.';
	$descFallback = '‘Latest news/blog’ will display the most recently published content. ‘What’s On’ is a static card.';
	// $descCardTitle = 'Only enter substitute text here when you need to override the automated title.';
	// $descCardImage = 'If you need to override the automated image, paste the image URL here after uploading it to the image library. Image size 768px x 576px.';
	$descBannerImage = 'Add or paste image URL from media library. Image size 1240px x 630px (~1.91:1 aspect ratio).';

	$home_meta_boxes = array(
		array(
			'id' => 'home_banner',
			'title' => 'Homepage hero banner',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Banner',
					'desc' => '',
					'id' => 'home_banner_status',
					'type' => 'select',
					'options' => array('Disable', 'Enable')
				),
				array(
					'name' => 'URL',
					'desc' => '',
					'id' => 'home_banner_url',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Title',
					'desc' => '',
					'id' => 'home_banner_title',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Excerpt',
					'desc' => '',
					'id' => 'home_banner_excerpt',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'name' => 'Image',
					'desc' => $descBannerImage,
					'id' => 'home_banner_img',
					'type' => 'media',
					'std' => ''
				),
				array(
					'name' => 'Button text',
					'desc' => 'Call to action button',
					'id' => 'home_banner_btn',
					'type' => 'select',
					'options' => array('Find out more', 'Read more', 'Book now')
				),
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_banner_expire',
					'type' => 'date',
					'std' => ''
				)
			)
		),
		array(
			'id' => 'home_card_1',
			'title' => 'Homepage card 1 - top left position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_1',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_1',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_1',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_1',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_1',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_1',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_2',
			'title' => 'Homepage card 2 - top middle position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_2',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_2',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_2',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_2',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_2',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_2',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_3',
			'title' => 'Homepage card 3 - top right position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_3',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_3',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_3',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_3',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_3',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_3',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_4',
			'title' => 'Homepage card 4 - bottom left position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_4',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_4',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_4',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_4',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_4',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_4',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_5',
			'title' => 'Homepage card 5 - bottom middle position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_5',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_5',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_5',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_5',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_5',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_5',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		),
		array(
			'id' => 'home_card_6',
			'title' => 'Homepage card 6 - bottom right position',
			'pages' => 'page',
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => 'Content URL*',
					'desc' => $descUrl,
					'id' => 'home_card_url_6',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override excerpt',
					'desc' => '',
					'id' => 'home_card_excerpt_6',
					'type' => 'text',
					'std' => ''
				),
				/*array(
					'name' => 'Override title',
					'desc' => $descCardTitle,
					'id' => 'home_card_title_6',
					'type' => 'text',
					'std' => ''
				),
				array(
					'name' => 'Override image',
					'desc' => $descCardImage,
					'id' => 'home_card_img_6',
					'type' => 'media',
					'std' => ''
				),*/
				array(
					'name' => 'Expire date',
					'desc' => $descExpire,
					'id' => 'home_card_expire_6',
					'type' => 'date',
					'std' => ''
				),
				array(
					'name' => 'Fallback',
					'desc' => $descFallback,
					'id' => 'home_card_fallback_6',
					'type' => 'select',
					'options' => array('Select fallback content', 'Latest news', 'Latest blog post', 'What’s on')
				)
			)
		)
	);

	if( is_homepage_template() ) {
		foreach ( $home_meta_boxes as $meta_box ) {
			$home_box = new CreateMetaBox( $meta_box );
		}
	}
}
