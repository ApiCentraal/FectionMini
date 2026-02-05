<?php
/**
 * The main template file
 *
 * @package FectionMini
 */

get_header();
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
                        <header class="entry-header">
                            <?php
                            if ( is_singular() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            else :
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            endif;
                            ?>
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

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail mb-3">
                                <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php
                            if ( is_singular() ) :
                                the_content();
                            else :
                                the_excerpt();
                                ?>
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary">
                                    <?php _e( 'Read More', 'fectionmini' ); ?>
                                </a>
                                <?php
                            endif;
                            ?>
                        </div>
                    </article>
                    <?php
                endwhile;

                // Pagination
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __( '&laquo; Previous', 'fectionmini' ),
                    'next_text' => __( 'Next &raquo;', 'fectionmini' ),
                ) );
            else :
                ?>
                <div class="no-posts">
                    <h2><?php _e( 'Nothing Found', 'fectionmini' ); ?></h2>
                    <p><?php _e( 'It looks like nothing was found at this location.', 'fectionmini' ); ?></p>
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
