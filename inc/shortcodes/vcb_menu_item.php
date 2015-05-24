<?php
add_shortcode( 'vcb_menu_items' , 'vcb_menu_items_func' );
function vcb_menu_items_func( $atts )
{
	global $vc_bootstrap;
	global $vcb_array;
	
	extract( shortcode_atts( array(
		'item_type' 		=> 	false,
		'menu_is_fixed'		=> 	true,
		'menu_id'			=> 	false,
		'logo_path'			=> 	false,
		'header_description'=>	__( 'Set your description here' ),
		'header_title'		=>	__( 'Untitled' )
	) , $atts , 'vcb_menu_items' ) );
	
	$vcb_array	=	array_merge( $vcb_array 	, array(
		'item_type' 		=> 	$item_type,
		'menu_is_fixed'		=> 	$menu_is_fixed,
		'menu_id'			=> 	$menu_id,
		'logo_path'			=> 	$logo_path,
		'header_description'=>	$header_description,
		'header_title'		=>	$header_title
	) );
	
	
	switch( $item_type )
	{
		case 'menu_worthy'			:	return $vc_bootstrap->inc_view( 'horizontal-menu/worthy-menu.php' ); break;
	}
}