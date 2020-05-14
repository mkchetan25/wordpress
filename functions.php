<?php

add_theme_support('title-tag');
add_theme_support('post-thumbnails');

// Create Custom Global Settings
function custom_settings_page() { ?>
	<div class="wrap">
		<h1>Custom Settings</h1>
		<form method="post" action="options.php">
				<?php
						settings_fields( 'section' );
						do_settings_sections( 'theme-options' );
						submit_button();
				?>
		</form>
	</div>
<?php }

// Twitter
function setting_twitter() { ?>
	<input type="text" name="twitter" id="twitter" value="<?php echo get_option( 'twitter' ); ?>" />
<?php }

function setting_github() { ?>
	<input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
<?php }

function custom_settings_page_setup() {
	add_settings_section( 'section', 'All Settings', null, 'theme-options' );
	add_settings_field( 'twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section' );
    add_settings_field( 'github', 'GitHub URL', 'setting_github', 'theme-options', 'section' );

    register_setting('section', 'twitter');
    register_setting( 'section', 'github' );
}
add_action( 'admin_init', 'custom_settings_page_setup' );

function create_my_custom_post() {
    register_post_type( 'my-custom-type', 
        array(
            'labels' => array(
                    'name' => __('My Custom Type'),
                    'singular_name' => __('My Custom Type'),
                ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'custom-fields'
                )
        )
    );
}
add_action('init', 'create_my_custom_post');

function create_another_custom_post() {
    register_post_type( 'my-custom-post', 
        array(
            'labels' => array(
                'name' => __('My Custom Post'),
                'singular_name' => __('My Custom Post'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'custom-fields'
            ),
            'taxonomies' => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type( 'category', 'my-custom-post');
    register_taxonomy_for_object_type( 'post_tag', 'my-custom-post');
}
add_action('init', 'create_another_custom_post');

function custom_settings_add_menu() {
    add_menu_page('Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}
add_action('admin_menu', 'custom_settings_add_menu');

function startwordpress_styles() {
    wp_enqueue_style('blog', get_template_directory_uri() . '/css/blog.css', array(), "1.0", "all");
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', array(), '3.3.6');
}
add_action('wp_enqueue_scripts', 'startwordpress_styles');

function startwordpress_scripts() {
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true);
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array(), '1.11.3', true);
}
add_action('wp_enqueue_scripts', 'startwordpress_scripts');

// Add Google Fonts
function startwordpress_google_fonts() {
	wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
	wp_enqueue_style( 'OpenSans');
}

add_action('wp_print_styles', 'startwordpress_google_fonts');