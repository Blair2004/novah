<?php
class vc_bootstrap_vc_before_init
{
	function __construct( $core )
	{
		$this->core		=	$core;
		add_action( 'vc_before_init' , array( $this , 'vc_items' ) );
	}
	function vc_items()
	{
		do_action( 'vcb_include_vc_items' ); // include each vc items
	}
}
$this->vc_bootstrap_vc_before_init	=	new vc_bootstrap_vc_before_init( $this );