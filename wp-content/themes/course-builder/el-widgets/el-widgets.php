<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'THIM_EL_PATH', get_template_directory() . '/el-widgets/' );
define( 'THIM_EL_ADDONS_PATH', THIM_EL_PATH . '/elements/' );
define( 'THIM_EL_URL', trailingslashit( get_template_directory_uri() . '/el-widgets/elements/' ) );


require_once THIM_EL_PATH . 'inc/el-class.php';

function thim_add_new_elements() {
    require_once THIM_EL_PATH . 'inc/helper.php';

    //Load elements

    require THIM_EL_ADDONS_PATH . 'addon-text/addon-text.php';
    require THIM_EL_ADDONS_PATH . 'course-search/course-search.php';
    require THIM_EL_ADDONS_PATH . 'login-form/login-form.php';

}

add_action( 'elementor/widgets/widgets_registered', 'thim_add_new_elements' );

function thim_course_search_callback() {
    $keyword = $_REQUEST['keyword'];
    $newdata = array();
    if ( $keyword ) {
        $keyword   = strtoupper( $keyword );
        $arr_query = array(
            'post_type'           => 'lp_course',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            's'                   => $keyword
        );
        $search    = new WP_Query( $arr_query );
        foreach ( $search->posts as $post ) {
            $newdata[] = array(
                'id'    => $post->ID,
                'title' => $post->post_title,
                'guid'  => get_permalink( $post->ID ),
            );
        }

        if ( ! count( $search->posts ) ) {
            $newdata[] = array(
                'id'    => '',
                'title' => esc_attr__( 'No course found', 'course-builder' ),
                'guid'  => '#',
            );
        }
    }
    wp_send_json_success( $newdata );
    wp_die();
}

add_action( 'wp_ajax_nopriv_thim_course_search', 'thim_course_search_callback' );
add_action( 'wp_ajax_thim_course_search', 'thim_course_search_callback' );
