<?php
class base_script_enqueue_scripts
{
	function __construct( $core )
	{
		$this->core		=	$core;
		add_action( 'wp_enqueue_scripts' , array( $this , 'base_scripts' ) );
	}
	
	function base_scripts()
	{
		wp_enqueue_style( 'bootstrap' , $this->core->css_url( 'bootstrap' ) , array() , '3.1' , 'screen' );
		wp_enqueue_style( 'font-awesome.min' , $this->core->css_url( 'font-awesome.min' ) , array() , '3.1' , 'screen' );
		
		wp_enqueue_script( 'jquery_custom' , $this->core->js_url( 'jquery' ) , array()  , '1.0' , true );
		wp_enqueue_script( 'responsive-nav' , $this->core->js_url( 'responsive-nav' ) , array( 'jquery_custom' )  , '1.0' , true );
		wp_enqueue_script( 'jquery.flexisel' , $this->core->js_url( 'jquery.flexisel' ) , array( 'jquery_custom' )  , '1.0' , true );		
	}
}
$this->base_script_enqueue_scripts	=	new base_script_enqueue_scripts( $this );