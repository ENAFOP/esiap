<div class="thim-sc-login link-to-account">
	<?php
	$html = '';
	if ( is_user_logged_in() ) {
		$html .= '<a href="' . wp_logout_url() . '" title="' . esc_attr( $settings['text_logout'] ) . '">' . esc_html( $settings['text_logout'] ) . '</a>';
	} else {
		$login_url = thim_get_login_page_url();
		if ( isset($settings['login_url'] )) {
			$login_url = $settings['login_url'];
		}
		$html .= '<a class="register-link" href="' . esc_url( $login_url . '/?action=register' ) . '" title="' . esc_attr( $settings['text_register'] ) . '">' . esc_html( $settings['text_register'] ) . '</a>' . '/' .
		         '<a href = "' . esc_url( $login_url ) . '" title = "' . esc_attr( $settings['text_login'] ) . '" > ' . esc_html( $settings['text_login'] ) . ' </a > ';
	}

	echo ent2ncr( $html );
	?>
</div>