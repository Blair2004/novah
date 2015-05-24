<?php
class _after_setup
{
	function __construct( $core )
	{	
		$this->core		=	$core;
		add_action( 'after_setup_theme' , array( $this , 'register_nav_menu' ) );
		add_action( 'after_setup_theme' , array( $this , 'add_theme_support' ) );
	}
	function register_nav_menu()
	{
		// top header menu
		register_nav_menu( 'main-menu' , __( 'Main menu' , $this->core->textdomain ) );
	}
	function add_theme_support()
	{
		add_theme_support( 'html5' , array( 'comment-list' , 'comment-form' , 'search-form' ) );
		add_theme_support( 'title-tag' );
	}
}
new _after_setup( $this );