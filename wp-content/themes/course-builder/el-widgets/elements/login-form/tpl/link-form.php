<?php
#todo check with empty string
$default_instance = array(
	'text_register' => esc_attr__( 'Register', 'course-builder' ),
	'text_login'    => esc_attr__( 'Login', 'course-builder' ),
	'text_logout'   => esc_attr__( 'Logout', 'course-builder' ),
	'link'          => get_permalink( get_page_by_path( 'account' ) ),
	'shortcode'     => '[wordpress_social_login]',
	'captcha'       => false,
	'term'          => '',
    'popup'         => true,
);

$instance = array(
	'text_register' => $settings['text_register'],
	'text_login'    => $settings['text_login'],
	'text_logout'   => $settings['text_logout'],
	'link'          => $settings['link'],
	'shortcode'     => $settings['content'],
	'captcha'       => (bool) $settings['captcha'],
	'term'         => $settings['term'],
    'popup'         => (bool) $settings['popup'],
);

$instance = wp_parse_args( (array) $instance, $default_instance);

?>

<div class="thim-sc-login">
	<?php
	do_action( 'thim_login_widget_before' );

	the_widget( 'Thim_Login_Widget', $instance );

	do_action( 'thim_login_widget_after' );
	?>
</div>

