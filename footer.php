</main>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <div class="footer-widgets">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                    <nav class="footer-navigation">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu list-unstyled',
                            'depth'          => 1,
                        ) );
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center mt-3">
                <div class="footer-text">
                    <?php
                    $footer_text = get_theme_mod( 'fectionmini_footer_text', '&copy; ' . date('Y') . ' ' . get_bloginfo( 'name' ) );
                    echo wp_kses_post( $footer_text );
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
