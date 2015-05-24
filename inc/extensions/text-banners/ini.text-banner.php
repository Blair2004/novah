<?php
class vcb_text_banner
{
	function __construct( $core )
	{
		$this->core				=	$core;
		$this->extension_path	=	'extensions/text-banners';
		
		add_shortcode( 'vcb_text_banner' , array( $this , 'text_banner' ) );
		add_action( 'vcb_include_vc_items' , array( $this , 'vc_item' ) );
	}
	function vc_item()
	{
		vc_map( array(
			'name'					=>		__( 'Text Banner' , $this->core->textdomain ),
			'base'					=>		'vcb_text_banner',
			'category'				=>		__( 'Text Items' ),
			'params'				=>		array(
				array(
					'type'				=>		'dropdown',
					'param_name'		=>		'item_type',
					'value'				=>		array(
						__( 'Worthy' )	=>		'text_banner_worthy'
					),
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'Select your text banner type' )
				),
				array(
					'type'				=>		'textfield',
					'param_name'		=>		'title',
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'Set a title for this banner' )
				),
				array(
					'type'				=>		'textarea',
					'param_name'		=>		'description',
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'Set a description for this banner' )
				),
				array(
					'type'				=>		'textfield',
					'param_name'		=>		'background_img',
					'class'				=>		'',
					'description'		=>		'',
					'heading'			=>		__( 'Set a background img for this banner' )
				),
			)	
		) );
	}
	function text_banner( $atts )
	{
		global $vc_bootstrap;
		global $vcb_array;
		
		extract( shortcode_atts( array(
			'item_type' 		=> false,
			'background_img'	=> false,
			'title'				=> __( 'Untitled' ),
			'description'		=> __( 'No description' )
		) , $atts ) );
		
		$vcb_array	=	array_merge( $vcb_array	, array(
			'item_type' 		=> $item_type,
			'background_img'	=> $background_img,
			'title'				=> $title,
			'description'		=> $description
		) );
		
		switch( $item_type )
		{
			case 'text_banner_worthy'	:	return $vc_bootstrap->inc( $this->extension_path . '/views/worthy-banner.php' ); break;
		}
	}
}
$this->vcb_text_banner 			=	new vcb_text_banner( $this );