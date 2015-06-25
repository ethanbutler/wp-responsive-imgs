<?php

function registerSizes(){
	$usesJson = file_get_contents( get_template_directory().'/inc/img/sizes.json' );
	$uses = json_decode( $usesJson );

	foreach ( $uses as $use => $value ) {
		foreach( $value as $size => $dimensions ){
			add_image_size( $use.'_'.$size, $dimensions->w, $dimensions->h, true );
		}
	}
}
add_action( 'init', 'registerSizes' );

function responsiveImage( $img, $format, $set, $caption ){
	$sizesJson = file_get_contents( get_template_directory().'/inc/img/sizes.json' );
	$sizes = json_decode( $sizesJson );
	$breakpointsJson = file_get_contents( get_template_directory().'/inc/img/breakpoints.json' );
	$breakpoints = json_decode( $breakpointsJson );
	$img = str_replace( '.'.$format, '', $img );
?>
	<picture class="responsive-img">
		<!--[if IE 9]><video style="display: none;"><![endif]-->
		<source srcset="<?= $img.'-'.$sizes->$set->lg->w.'x'.$sizes->$set->lg->h.'.'.$format; ?>" media="(min-width: <?= $breakpoints->lg; ?>px)">
		<source srcset="<?= $img.'-'.$sizes->$set->md->w.'x'.$sizes->$set->md->h.'.'.$format; ?>" media="(min-width: <?= $breakpoints->md; ?>px)">
		<source srcset="<?= $img.'-'.$sizes->$set->sm->w.'x'.$sizes->$set->sm->h.'.'.$format; ?>" media="(min-width: <?= $breakpoints->sm; ?>px)">
		<!--[if IE 9]></video><![endif]-->
		<img srcset="<?= $img.'-'.$sizes->$set->xs->w.'x'.$sizes->$set->xs->h.'.'.$format; ?>" alt="<?= $caption; ?>">
	</picture>
<?php
} //end responsiveImage

function responsiveBackground( $img, $format, $set ){
	$sizesJson = file_get_contents( get_template_directory().'/inc/img/sizes.json' );
	$sizes = json_decode( $sizesJson );
	$img = str_replace( '.'.$format, '', $img );
	$dimensions = $sizes->$set;
	$lg = $dimensions->lg->w.'x'.$dimensions->lg->h;
	$md = $dimensions->md->w.'x'.$dimensions->md->h;
	$sm = $dimensions->sm->w.'x'.$dimensions->sm->h;
	$xs = $dimensions->xs->w.'x'.$dimensions->xs->h;
	return 'style="background-image:url('.$img.'-'.$xs.'.'.$format.');" data-bg-lg="'.$img.'-'.$lg.'.'.$format.'" data-bg-md="'.$img.'-'.$md.'.'.$format.'" data-bg-sm="'.$img.'-'.$sm.'.'.$format.'" data-bg-xs="'.$img.'-'.$xs.'.'.$format.'"';
}