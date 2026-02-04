<?php
/**
 * The template for displaying search results
 *
 * @package FectionMini
 */

get_header();
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <header class="page-header mb-4">
                <h1 class="page-title">
                    <?php
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'fectionmini' ), '<span>' . get_search_query() . '</span>' );
                    ?>
                </h1>
            </header>

            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
                        <header class="entry-header">
                            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                            <div class="entry-meta text-muted mb-3">
                                <?php
                                printf(
                                    '<span class="posted-on">%s</span> <span class="byline">by %s</span>',
                                    get_the_date(),
                                    get_the_author()
                                );
                                ?>
                            </div>
                        </header>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary">
                                <?php _e( 'Read More', 'fectionmini' ); ?>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;

                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __( '&laquo; Previous', 'fectionmini' ),
                    'next_text' => __( 'Next &raquo;', 'fectionmini' ),
                ) );
            else :
                ?>
                <div class="no-results">
                    <h2><?php _e( 'Nothing Found', 'fectionmini' ); ?></h2>
                    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'fectionmini' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
                <?php
            endif;
            ?>
        </div>
        
        <aside class="col-lg-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php
get_footer();
