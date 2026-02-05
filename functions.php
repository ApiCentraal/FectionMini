<?php
/**
 * FectionMini Theme Functions
 *
 * @package FectionMini
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load Bootstrap Nav Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Theme setup
 */
function fectionmini_setup() {
    // Add theme support for various features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'fectionmini' ),
        'footer'  => __( 'Footer Menu', 'fectionmini' ),
    ) );
}
add_action( 'after_setup_theme', 'fectionmini_setup' );

/**
 * Enqueue scripts and styles
 */
function fectionmini_enqueue_scripts() {
    // Bootstrap CSS from CDN (latest version 5.3.x)
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3' );
    
    // Theme stylesheet
    wp_enqueue_style( 'fectionmini-style', get_stylesheet_uri(), array( 'bootstrap' ), '1.0.0' );
    
    // Bootstrap Bundle JS from CDN (includes Popper)
    wp_enqueue_script( 'bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true );
    
    // Custom inline styles from customizer
    $custom_css = fectionmini_get_custom_css();
    wp_add_inline_style( 'fectionmini-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'fectionmini_enqueue_scripts' );

/**
 * Register widget areas
 */
function fectionmini_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'fectionmini' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'fectionmini' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Footer', 'fectionmini' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'fectionmini' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'fectionmini_widgets_init' );

/**
 * Generate custom CSS from customizer settings
 */
function fectionmini_get_custom_css() {
    $css = ':root {';
    
    // Header settings
    $header_bg = get_theme_mod( 'fectionmini_header_bg_color', '#ffffff' );
    $header_text = get_theme_mod( 'fectionmini_header_text_color', '#000000' );
    $header_padding = get_theme_mod( 'fectionmini_header_padding', '20' );
    
    $css .= '--fectionmini-header-bg-color: ' . esc_attr( $header_bg ) . ';';
    $css .= '--fectionmini-header-text-color: ' . esc_attr( $header_text ) . ';';
    $css .= '--fectionmini-header-padding: ' . esc_attr( $header_padding ) . 'px 0;';
    
    // Footer settings
    $footer_bg = get_theme_mod( 'fectionmini_footer_bg_color', '#f8f9fa' );
    $footer_text = get_theme_mod( 'fectionmini_footer_text_color', '#000000' );
    $footer_padding = get_theme_mod( 'fectionmini_footer_padding', '30' );
    
    $css .= '--fectionmini-footer-bg-color: ' . esc_attr( $footer_bg ) . ';';
    $css .= '--fectionmini-footer-text-color: ' . esc_attr( $footer_text ) . ';';
    $css .= '--fectionmini-footer-padding: ' . esc_attr( $footer_padding ) . 'px 0;';
    
    // Typography settings
    $body_font = get_theme_mod( 'fectionmini_body_font', '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif' );
    $body_font_size = get_theme_mod( 'fectionmini_body_font_size', '16' );
    $heading_font = get_theme_mod( 'fectionmini_heading_font', 'inherit' );
    
    $css .= '--fectionmini-body-font: ' . esc_attr( $body_font ) . ';';
    $css .= '--fectionmini-body-font-size: ' . esc_attr( $body_font_size ) . 'px;';
    $css .= '--fectionmini-heading-font: ' . esc_attr( $heading_font ) . ';';
    
    // Container settings
    $container_width = get_theme_mod( 'fectionmini_container_width', '1140' );
    $container_padding = get_theme_mod( 'fectionmini_container_padding', '15' );
    
    $css .= '--fectionmini-container-width: ' . esc_attr( $container_width ) . 'px;';
    $css .= '--fectionmini-container-padding: ' . esc_attr( $container_padding ) . 'px;';
    
    $css .= '}';
    
    return $css;
}

/**
 * Customizer settings
 */
function fectionmini_customize_register( $wp_customize ) {
    
    // Header Section
    $wp_customize->add_section( 'fectionmini_header_section', array(
        'title'    => __( 'Header Settings', 'fectionmini' ),
        'priority' => 30,
    ) );
    
    // Header Background Color
    $wp_customize->add_setting( 'fectionmini_header_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fectionmini_header_bg_color', array(
        'label'    => __( 'Header Background Color', 'fectionmini' ),
        'section'  => 'fectionmini_header_section',
        'settings' => 'fectionmini_header_bg_color',
    ) ) );
    
    // Header Text Color
    $wp_customize->add_setting( 'fectionmini_header_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fectionmini_header_text_color', array(
        'label'    => __( 'Header Text Color', 'fectionmini' ),
        'section'  => 'fectionmini_header_section',
        'settings' => 'fectionmini_header_text_color',
    ) ) );
    
    // Header Padding
    $wp_customize->add_setting( 'fectionmini_header_padding', array(
        'default'           => '20',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'fectionmini_header_padding', array(
        'label'       => __( 'Header Padding (px)', 'fectionmini' ),
        'section'     => 'fectionmini_header_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 100,
            'step' => 5,
        ),
    ) );
    
    // Footer Section
    $wp_customize->add_section( 'fectionmini_footer_section', array(
        'title'    => __( 'Footer Settings', 'fectionmini' ),
        'priority' => 40,
    ) );
    
    // Footer Background Color
    $wp_customize->add_setting( 'fectionmini_footer_bg_color', array(
        'default'           => '#f8f9fa',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fectionmini_footer_bg_color', array(
        'label'    => __( 'Footer Background Color', 'fectionmini' ),
        'section'  => 'fectionmini_footer_section',
        'settings' => 'fectionmini_footer_bg_color',
    ) ) );
    
    // Footer Text Color
    $wp_customize->add_setting( 'fectionmini_footer_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fectionmini_footer_text_color', array(
        'label'    => __( 'Footer Text Color', 'fectionmini' ),
        'section'  => 'fectionmini_footer_section',
        'settings' => 'fectionmini_footer_text_color',
    ) ) );
    
    // Footer Padding
    $wp_customize->add_setting( 'fectionmini_footer_padding', array(
        'default'           => '30',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'fectionmini_footer_padding', array(
        'label'       => __( 'Footer Padding (px)', 'fectionmini' ),
        'section'     => 'fectionmini_footer_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 100,
            'step' => 5,
        ),
    ) );
    
    // Footer Text
    $wp_customize->add_setting( 'fectionmini_footer_text', array(
        'default'           => '&copy; ' . current_time('Y') . ' ' . get_bloginfo( 'name' ),
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'fectionmini_footer_text', array(
        'label'       => __( 'Footer Text', 'fectionmini' ),
        'section'     => 'fectionmini_footer_section',
        'type'        => 'textarea',
    ) );
    
    // Typography Section
    $wp_customize->add_section( 'fectionmini_typography_section', array(
        'title'    => __( 'Typography Settings', 'fectionmini' ),
        'priority' => 50,
    ) );
    
    // Body Font
    $wp_customize->add_setting( 'fectionmini_body_font', array(
        'default'           => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'fectionmini_body_font', array(
        'label'       => __( 'Body Font Family', 'fectionmini' ),
        'section'     => 'fectionmini_typography_section',
        'type'        => 'text',
        'description' => __( 'Enter font family (e.g., Arial, sans-serif)', 'fectionmini' ),
    ) );
    
    // Body Font Size
    $wp_customize->add_setting( 'fectionmini_body_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'fectionmini_body_font_size', array(
        'label'       => __( 'Body Font Size (px)', 'fectionmini' ),
        'section'     => 'fectionmini_typography_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 24,
            'step' => 1,
        ),
    ) );
    
    // Heading Font
    $wp_customize->add_setting( 'fectionmini_heading_font', array(
        'default'           => 'inherit',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'fectionmini_heading_font', array(
        'label'       => __( 'Heading Font Family', 'fectionmini' ),
        'section'     => 'fectionmini_typography_section',
        'type'        => 'text',
        'description' => __( 'Enter font family for headings (e.g., Georgia, serif)', 'fectionmini' ),
    ) );
    
    // Container Section
    $wp_customize->add_section( 'fectionmini_container_section', array(
        'title'    => __( 'Container Settings', 'fectionmini' ),
        'priority' => 60,
    ) );
    
    // Container Width
    $wp_customize->add_setting( 'fectionmini_container_width', array(
        'default'           => '1140',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'fectionmini_container_width', array(
        'label'       => __( 'Container Max Width (px)', 'fectionmini' ),
        'section'     => 'fectionmini_container_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 960,
            'max'  => 1920,
            'step' => 20,
        ),
    ) );
    
    // Container Padding
    $wp_customize->add_setting( 'fectionmini_container_padding', array(
        'default'           => '15',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'fectionmini_container_padding', array(
        'label'       => __( 'Container Padding (px)', 'fectionmini' ),
        'section'     => 'fectionmini_container_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 0,
            'max'  => 50,
            'step' => 5,
        ),
    ) );
}
add_action( 'customize_register', 'fectionmini_customize_register' );

/**
 * Customizer live preview
 */
function fectionmini_customize_preview_js() {
    wp_enqueue_script( 'fectionmini-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'fectionmini_customize_preview_js' );
