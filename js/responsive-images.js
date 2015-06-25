function updateResponsiveBackground( element ){
	var width = $( window ).width(),
		breakPoint = 'xs';
	if( width > 1200 ){
		breakPoint = 'lg';
	} else if( width > 992 ){
		breakPoint = 'md';
	} else if( width > 768 ){
		breakPoint = 'sm';
	} else {
		breakPoint = 'xs';
	}
	$( element ).each( function(){
		$( this ).css( 'background-image', 'url('+$( this ).attr( 'data-bg-'+breakPoint )+')' );
	} )
}

$( document ).ready( function(){

	updateResponsiveBackground( '.responsive-bg' );

	$( window ).resize( function(){

		updateResponsiveBackground( '.responsive-bg' );

	} );

} );