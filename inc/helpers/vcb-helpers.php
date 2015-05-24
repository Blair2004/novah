<?php
if( ! function_exists( 'vcb_get_item_id' ) )
{
	function vcb_get_item_id( $item_namespace )
	{
		global $vcb_array;
		$vcb_items_namespaces	=	__riake( 'vcb_items_namespace' , $vcb_array );
		if( __riake( $item_namespace , $vcb_items_namespaces ) )
		{
			$vcb_array[ 'vcb_items_namespace' ][ $item_namespace ]++;
		}
		else
		{
			$vcb_array[ 'vcb_items_namespace' ][ $item_namespace ] = 1;
		}
		return $vcb_array[ 'vcb_items_namespace' ][ $item_namespace ];
	}
}