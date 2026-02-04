<?php
/**
 * The template for displaying single posts
 *
 * @package FectionMini
 */

get_header();
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header mb-4">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        <div class="entry-meta text-muted">
                            <?php
                            printf(
                                '<span class="posted-on">%s</span> <span class="byline">by %s</span>',
                                get_the_date(),
                                get_the_author()
                            );
                            ?>
                            <?php if ( has_category() ) : ?>
                                <span class="cat-links ms-2">
                                    <?php _e( 'in', 'fectionmini' ); ?> <?php the_category( ', ' ); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail mb-4">
                            <?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'fectionmini' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <?php if ( has_tag() ) : ?>
                        <footer class="entry-footer mt-4">
                            <div class="tags-links">
                                <?php the_tags( '<span class="badge bg-secondary me-1">', '</span><span class="badge bg-secondary me-1">', '</span>' ); ?>
                            </div>
                        </footer>
                    <?php endif; ?>
                </article>

                <?php
                // Post navigation
                the_post_navigation( array(
                    'prev_text' => '<span class="nav-subtitle">' . __( 'Previous:', 'fectionmini' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . __( 'Next:', 'fectionmini' ) . '</span> <span class="nav-title">%title</span>',
                ) );

                // Comments
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; ?>
        </div>
        
        <aside class="col-lg-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php
get_footer();
