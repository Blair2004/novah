<?php
class progressus_filters
{
	function __construct( $core )
	{
		$this->core		=	$core;
		// add_filter( 'piklist_post_types' , array( $this , 'posttypes' ) );
		add_filter( 'wp_nav_menu_objects', array( $this , 'add_menu_parent_class' ) );
	}
	function add_menu_parent_class( $items ) 
	{
		$parents = array();
		foreach ( $items as $item ) {
			if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				$parents[] = $item->menu_item_parent;
			}
		}
		
		foreach ( $items as $item ) {
			if ( in_array( $item->ID, $parents ) ) {
				$item->classes[] = 'dropdown'; 
			}
		}
		
		return $items;    
	}

	function posttypes( $post_types )
	{
		$post_types[ 'vcb_services' ]	=	array(
			'labels'					=>	piklist( 'post_type_labels' , 'VCB Services' ),
			'title'						=>	__( 'Create new Service' , $this->core->textdomain ),
			'public'					=>	true,
			'supports'					=>	array( 'title' )
		);
		return $post_types;
	}
}
$this->progressus_filters	=	new progressus_filters( $this );