<?php

/**

 * The template for displaying a list of gigs.

 *

 * @package Encore

 * @since 1.0.0

 */

$post_type        = 'audiotheme_gig';
$post_type_object = get_post_type_object( $post_type );
$archive_id       = get_audiotheme_post_type_archive( $post_type );
$upcoming_gigs      = encore_audiotheme_upcoming_gigs_query();
//print_r ($upcoming_gigs);

get_header();

?>


<main id="primary" <?php audiotheme_archive_class( array( 'content-area', 'archive-gig' ) ); ?> role="main" itemprop="mainContentOfPage">



	<?php do_action( 'encore_main_top' ); ?>



	<?php if ( $upcoming_gigs->have_posts() ) : ?>

		

		<?php get_template_part( 'audiotheme/gig/content', 'archive' ); ?>



	<?php else : ?>



		<?php get_template_part( 'audiotheme/gig/content', 'none' ); ?>



	<?php endif; ?>



	<?php do_action( 'encore_main_bottom' ); ?>



</main>



<?php

get_footer();

