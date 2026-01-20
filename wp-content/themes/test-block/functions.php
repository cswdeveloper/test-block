<?php



// Bootstrap 5
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'bootstrap-5',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
		[],
		'5.3.3'
	);
});


add_action('wp_enqueue_scripts', function () {

	wp_enqueue_style(
		'manrope-font',
		'https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap',
		[],
		null
	);

});


add_action('wp_enqueue_scripts', function () {

	// Main theme stylesheet
	wp_enqueue_style(
		'theme-style',
		get_stylesheet_uri(), // style.css
		[],
		wp_get_theme()->get('Version')
	);

});



add_action('wp_enqueue_scripts', function () {

  wp_enqueue_script(
    'properties-js',
    get_template_directory_uri() . '/assets/js/properties.js',
    [],
    null,
    true
  );

  wp_localize_script('properties-js', 'propertiesAjax', [
    'ajaxUrl' => admin_url('admin-ajax.php'),
  ]);
});


// Theme support
add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('editor-styles');
	add_editor_style('style.css');
});



add_action('after_setup_theme', function () {
  add_image_size('card-right', 430, 324, true);
  add_image_size('card-bottom', 642, 224, true);
});


/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
	add_theme_support('editor-styles');
	add_theme_support('wp-block-styles');
});



add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/acf-blocks/section-cards' );
}




if (function_exists('acf_add_local_field_group')):

	acf_add_local_field_group([
		'key' => 'group_section_cards',
		'title' => 'Section Cards',
		'fields' => [
			[
				'key' => 'field_cards',
				'label' => 'Cards',
				'name' => 'cards',
				'type' => 'repeater',
				'min' => 3,
				'max' => 12,
				'layout' => 'block',
				'sub_fields' => [

					[
						'key' => 'field_card_type',
						'label' => 'Card type',
						'name' => 'card_type',
						'type' => 'button_group',
						'choices' => [
							'text' => 'Text only',
							'image_right' => 'Text + image (right)',
							'image_bottom' => 'Text + image (bottom)',
						],
						'default_value' => 'text'
					],

					[
						'key' => 'field_card_col',
						'label' => 'Card width',
						'name' => 'card_col',
						'type' => 'button_group',
						'choices' => [
							'4' => '4 / 12',
							'6' => '6 / 12',
							'8' => '8 / 12',
						],
						'default_value' => '4'
					],

					[
						'key' => 'field_card_bg',
						'label' => 'Background',
						'name' => 'card_bg',
						'type' => 'button_group',
						'choices' => [
							'light' => 'Light',
							'beige' => 'Beige',
							'dark' => 'Dark',
						],
						'default_value' => 'light'
					],

					[
						'key' => 'field_card_title',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text'
					],

					[
						'key' => 'field_card_text',
						'label' => 'Text',
						'name' => 'text',
						'type' => 'textarea'
					],

					[
						'key' => 'field_card_image',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'id',
						'conditional_logic' => [
							[
								[
									'field' => 'field_card_type',
									'operator' => '!=',
									'value' => 'text'
								]
							]
						]
					],

					[
						'key' => 'field_card_button',
						'label' => 'Button',
						'name' => 'button',
						'type' => 'link'
					]

				]
			]
		],
		'location' => [
			[
				[
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/section-cards',
				],
			],
		],
	]);

endif;



require_once get_template_directory() . '/inc/ajax-properties.php';
