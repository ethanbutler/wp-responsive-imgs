<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $image = wp_prepare_attachment_for_js( get_post_thumbnail_id($post->ID) )['url']; ?>
	<?php responsiveImage( $image, 'jpg', 'hero', 'test' ); ?>

</article><!-- #post-## -->
