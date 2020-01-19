<?php

if ( ! function_exists( 'thim_get_widget_template' ) ) {
    function thim_get_widget_template( $widget_base, $args = array(), $template_name = 'default' ) {
        if ( is_array( $args ) && isset( $args ) ) {
            extract( $args );
        }

        if ( false === strpos( $template_name, '.php' ) ) {
            $template_name .= '.php';
        }

        $parent_path = THIM_EL_ADDONS_PATH . '' . $widget_base . '/tpl/' . $template_name;
        $child_path  = THIM_EL_ADDONS_PATH . '' . $widget_base . '/' . $template_name;

        if ( file_exists( $child_path ) ) {
            $template_path = $child_path;
        } elseif ( file_exists( $parent_path ) ) {
            $template_path = $parent_path;
        } else {
            _doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_name ), '1.0.0' );

            return;
        }

        require $template_path;
    }
}

add_action( 'wp_ajax_nopriv_thim_course_search', 'course_search_callback' );
add_action( 'wp_ajax_thim_course_search', 'course_search_callback' );

