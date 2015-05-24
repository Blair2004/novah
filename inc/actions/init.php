<?php
class piklist_sample_init
{
	function __construct( $core )
	{
		$this->core		=	$core;
		$this->core->set_textdomain( 'novah' );
		
		add_action( 'init' , array( $this , 'check_piklist' ) );
		
		$this->core->defaults		=	array(
			'enable-title'			=>	'true',
			'post-read-more-label'	=>	__( 'Read More' , $this->core->textdomain ),
			'show-comments-count'	=>	'true',
		);
		
		// Overwrite defaults
		
		$saved						=	(array) get_option( 'novah-settings' );
		$this->core->options		=	array_merge( $this->core->defaults , $saved );
	}
	
	function check_piklist()
	{
		if ( ! piklist_checker::check( __FILE__, 'theme' ) )
		{
			return false;
		}
	}
}
$this->piklist_sample_init	=	new piklist_sample_init( $this );

