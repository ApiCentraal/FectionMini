<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FectionMini
 */

get_header();
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto text-center">
            <header class="page-header mb-4">
                <h1 class="page-title display-1">404</h1>
                <h2><?php _e( 'Oops! That page can&rsquo;t be found.', 'fectionmini' ); ?></h2>
            </header>

            <div class="page-content">
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'fectionmini' ); ?></p>
                
                <div class="search-form my-4">
                    <?php get_search_form(); ?>
                </div>

                <div class="mt-5">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                        <?php _e( 'Go to Homepage', 'fectionmini' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
