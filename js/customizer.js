/**
 * Customizer Live Preview
 *
 * @package FectionMini
 */

(function($) {
    'use strict';

    // Helper function to update CSS variable
    function updateCSSVariable(variable, value) {
        document.documentElement.style.setProperty(variable, value);
    }

    // Header Background Color
    wp.customize('fectionmini_header_bg_color', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-header-bg-color', newval);
        });
    });

    // Header Text Color
    wp.customize('fectionmini_header_text_color', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-header-text-color', newval);
        });
    });

    // Header Padding
    wp.customize('fectionmini_header_padding', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-header-padding', newval + 'px 0');
        });
    });

    // Footer Background Color
    wp.customize('fectionmini_footer_bg_color', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-footer-bg-color', newval);
        });
    });

    // Footer Text Color
    wp.customize('fectionmini_footer_text_color', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-footer-text-color', newval);
        });
    });

    // Footer Padding
    wp.customize('fectionmini_footer_padding', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-footer-padding', newval + 'px 0');
        });
    });

    // Footer Text
    wp.customize('fectionmini_footer_text', function(value) {
        value.bind(function(newval) {
            // Since the content is sanitized with wp_kses_post on the server,
            // we can safely use html() here. For plain text, use .text() instead.
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = newval;
            $('.footer-text').html(tempDiv.innerHTML);
        });
    });

    // Body Font
    wp.customize('fectionmini_body_font', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-body-font', newval);
        });
    });

    // Body Font Size
    wp.customize('fectionmini_body_font_size', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-body-font-size', newval + 'px');
        });
    });

    // Heading Font
    wp.customize('fectionmini_heading_font', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-heading-font', newval);
        });
    });

    // Container Width
    wp.customize('fectionmini_container_width', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-container-width', newval + 'px');
        });
    });

    // Container Padding
    wp.customize('fectionmini_container_padding', function(value) {
        value.bind(function(newval) {
            updateCSSVariable('--fectionmini-container-padding', newval + 'px');
        });
    });

})(jQuery);
