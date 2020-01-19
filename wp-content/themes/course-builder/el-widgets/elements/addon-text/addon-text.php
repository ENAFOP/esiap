<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Addon_Text extends Widget_Base {

    public function get_name() {
        return 'thim-addon-text';
    }

    public function get_title() {
        return esc_html__( 'Addon Hello', 'vinpearl_elementor' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return [ 'thim-elements' ];
    }

    public function get_base() {
        return 'addon-text';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'addon_text_display',
            [
                'label' => __( 'Text ', 'addon_elementor' ),
            ]
        );
        $this->add_control(
            'custom_text',
            [
                'label' => __( 'Custom text', 'addon_elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => __( 'Enter your text', 'addon_elementor' ),
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        thim_get_widget_template( $this->get_base(), array( 'settings' => $settings ) );
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Addon_Text() );