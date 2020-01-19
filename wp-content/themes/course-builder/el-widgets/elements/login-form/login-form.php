<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Thim_Login_Form extends Widget_Base {

    public function get_name() {
        return 'thim-login-form';
    }

    public function get_title() {
        return esc_html__( 'Thim: Login', 'vinpearl_elementor' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return [ 'thim-elements' ];
    }

    public function get_base() {
        return 'login-form';
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'login_form_display',
            [
                'label' => __( 'Login Form ', 'addon_elementor' ),
            ]
        );

        $this->add_control(
            'display',
            [
                'label'   => esc_html__( 'Display', 'eduma' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'form'     => esc_html__( 'Login Form (Account page)', 'eduma' ),
                    'link-form' => esc_html__( 'Link to form popup', 'eduma' ),
                    'link' => esc_html__( 'Link to account page (OFF POPUP)', 'eduma' ),
                ],
                'default' => 'link-form',
            ]
        );

        $this->add_control(
            'text_register',
            [
                'label'       => esc_html__( 'Register Text', 'eduma' ),
                'type'        => Controls_Manager::TEXT,
                'default' => esc_html__( 'Register', 'eduma' ),
                'label_block' => false,
                'condition' => array(
                    'display' => [ 'link-form' ]
                )
            ]
        );

        $this->add_control(
            'text_login',
            [
                'label'       => esc_html__( 'Login Text', 'eduma' ),
                'type'        => Controls_Manager::TEXT,
                'default' => esc_html__( 'Login', 'eduma' ),
                'label_block' => false,
                'condition' => array(
                    'display' => [ 'link-form' ]
                )
            ]
        );

        $this->add_control(
            'text_logout',
            [
                'label'       => esc_html__( 'Logout Text', 'eduma' ),
                'type'        => Controls_Manager::TEXT,
                'default' => esc_html__( 'Logout', 'eduma' ),
                'label_block' => false,
                'condition' => array(
                    'display' => [ 'link-form' ]
                )
            ]
        );

        $this->add_control(
            'link',
            [
                'label'       => esc_html__( 'Account Page URL', 'eduma' ),
                'type'        => Controls_Manager::TEXT,
                'default' => get_permalink( get_page_by_path( 'account' ) ),
                'label_block' => false,
                'condition' => array(
                    'display' => [ 'link-form' ]
                )
            ]
        );

        $this->add_control(
            'content',
            [
                'label'       => esc_html__( 'Social Login Shortcode', 'eduma' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => false,
                'condition' => array(
                    'display' => [ 'link-form' ]
                )
            ]
        );

        $this->add_control(
            'popup',
            [
                'label'   => esc_html__( 'Login Popup', 'eduma' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => false,
                'condition' => array(
                    'display' => [ 'link-form' ]
                )
            ]
        );

        $this->add_control(
            'captcha',
            [
                'label'   => esc_html__( 'Show Captcha', 'eduma' ),
                'type'    => Controls_Manager::SWITCHER,
                'default' => false,
                'condition' => array(
                    'display' => [ 'link-form', 'form' ]
                )
            ]
        );

        $this->add_control(
            'term',
            [
                'label'       => esc_html__( 'Term link', 'eduma' ),
                'type'        => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => false,
                'condition' => array(
                    'display' => [ 'link-form' ]
                )
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        thim_get_widget_template( $this->get_base(), array(
            'settings' => $settings
        ), $settings['display'] );
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Thim_Login_Form() );