<?php
class vcb_ini_menus
{
	function __construct( $core )
	{
		$this->core				=	$core;
		$this->extension_path	=	'extensions/horizontal-menus';
		
		add_action( 'init' , array( $this , 'register_nav_menus' ) );	
		add_action( 'vcb_include_vc_items' , array( $this , 'vc_menus' ) );
		add_action( 'vcb_add_styles' , array( $this , 'add_styles' ) );
		
		add_shortcode( 'vcb_menu_items' , array( $this , 'vcb_menu_items_func' ) );
		
		add_filter( 'nav_menu_css_class' , array( $this , 'special_nav_class' ) , 10 , 2);
	}
	function register_nav_menus()
	{
		// Worthy Horizontal Menu
		register_nav_menu( 'worthy_menu' , __( 'Worthy Menu' , $this->core->textdomain ) );
	}
	function vc_menus()
	{
		vc_map( array(
			'name'					=>		__( 'Menus' , $this->core->textdomain ),
			'base'					=>		'vcb_menu_items',
			'category'				=>		__( 'Menus Items' ),
			'params'				=>		array(
				array(
					'type'				=>		'dropdown',
					'param_name'		=>		'item_type',
					'value'				=>		array(
						__( 'Worthy - Menu (1 level menu)' )	=>		'menu_worthy'
					),
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'Select the type of your menu' )
				),
				array(
					'type'				=>		'dropdown',
					'param_name'		=>		'menu_is_fixed',
					'value'				=>		array(
						__( 'True' )	=>		'true',
						__( 'False' )	=>		'false',
					),
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'Set as fixed menu' )
				),
				array(
					'type'				=>		'dropdown',
					'param_name'		=>		'menu_id',
					'value'				=>		array(
						__( 'True' )	=>		'true',
						__( 'False' )	=>		'false',
					),
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'Select the menu you want to apply' )
				),
				array(
					'type'				=>		'textfield',
					'param_name'		=>		'logo_path',
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'The path to your logo' )
				),
				array(
					'type'				=>		'textfield',
					'param_name'		=>		'header_title',
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'Set the title for your header' )
				),
				array(
					'type'				=>		'textfield',
					'param_name'		=>		'header_description',
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'Set description for your header' )
				)
			)	
		) );
	}
	function vcb_menu_items_func( $atts )
	{
		global $vc_bootstrap;
		global $vcb_array;		
		
		extract( shortcode_atts( array(
			'item_type' 		=> false,
			'background_img'	=> false,
			'title'				=> __( 'Untitled' ),
			'description'		=> __( 'No description' ),
			'menu_is_fixed'		=> 'true'
		) , $atts ) );
		
		$vcb_array				=	array_merge( $vcb_array	, array(
			'item_type' 		=> 	$item_type,
			'background_img'	=> 	$background_img,
			'title'				=> 	$title,
			'description'		=> 	$description,
			'menu_is_fixed'		=>	$menu_is_fixed
		) );
		
		switch( $item_type )
		{
			case 'menu_worthy'	:	return $vc_bootstrap->inc( $this->extension_path . '/views/worthy-menu.php' ); break;
		}
	}
	function add_styles()
	{
		wp_enqueue_style( 'worthy' , $this->core->css_uri . '/worthy/worthy.css'  );
		wp_enqueue_script( 'bootstrapjs' , $this->core->js_uri . '/bootstrap.min.js' , array( 'jquery' ) , '1.0' , true );
	}
	function special_nav_class($classes, $item){
		 if( in_array('current-menu-item', $classes) ){
				 $classes[] = 'active ';
		 }
		 return $classes;
	}

}
new vcb_ini_menus( $this );