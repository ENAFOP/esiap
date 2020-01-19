<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Thim_Course_Search extends Widget_Base {

    public function get_name() {
        return 'thim-course-search';
    }

    public function get_title() {
        return esc_html__( 'Thim: Search Courses', 'vinpearl_elementor' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return [ 'thim-elements' ];
    }

    public function get_base() {
        return 'course-search';
    }

    protected function _register_controls() {

        wp_enqueue_script( 'thim-thim-course-search', THIM_EL_URL . $this->get_base() . '/assets/js/course-search.js', array( 'jquery' ), '', true );

        $this->start_controls_section(
            'course_search_display',
            [
                'label' => __( 'Course Search ', 'addon_elementor' ),
            ]
        );

        $this->add_control(
            'placeholder',
            [
                'label'       => esc_html__( 'Search box placeholder', 'eduma' ),
                'type'        => Controls_Manager::TEXT,
                'default' => esc_html__( 'What do you want to learn today?', 'eduma' ),
                'label_block' => false
            ]
        );

        $this->add_control(
            'layout',
            [
                'label'   => esc_html__( 'Style', 'eduma' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    ''     => esc_html__( 'Default', 'eduma' ),
                    'popup' => esc_html__( 'Popup', 'eduma' ),
                ],
                'default' => ''
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        thim_get_widget_template( $this->get_base(), array(
            'settings' => $settings
        ) );

    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Thim_Course_Search() );