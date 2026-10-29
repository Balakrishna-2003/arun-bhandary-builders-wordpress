<?php
/**
 * Template Name: Inside Page Template
 *

 */
get_header();
?>

<article id="primary">
    <?php
    while ( have_posts() ) :
        the_post();

        // Output page content without automatic paragraph formatting.
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_content', 'shortcode_unautop' );
        ?>

        <?php the_content(); ?>

    <?php endwhile; ?>
    </article>

<?php get_footer(); ?>

