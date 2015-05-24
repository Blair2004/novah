<?php
class novah_framework
{
	function __construct( $core )
	{
		$this->core	=	$core;
	}
	function get_pagination( $custom_query	= FALSE )
	{
		$prev_arrow = is_rtl() ? 'fa fa-long-arrow-right' : 'fa fa-long-arrow-left';
		$next_arrow = is_rtl() ? 'fa fa-long-arrow-left' : 'fa fa-long-arrow-right';

		global $wp_query;
		
		if ( $custom_query ) {
			$wp_query = $custom_query;
		}

		$big = 999999999;

		if( $wp_query->found_posts > 1 ) {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				 $format = '&paged=%#%';
			}
			$pagination	= paginate_links(array(
				'base'		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'	=> $format,
				'current'	=> max( 1, get_query_var('paged') ),
				'total'		=> $wp_query->found_posts,
				'mid_size'	=> 3,
				'type'		=> 'array',
				'prev_text'	=> '<i class="'. $prev_arrow .'"></i>',
				'next_text'	=> '<i class="'. $next_arrow .'"></i>',
			) );
			$final_string	=	'<ul>';
			foreach( $pagination as $_i	=>	$menu )
			{
				if( (int) strip_tags( $menu ) == $current_page )
				{
					$final_string .= '<li class="active">' . $menu . '</li>';
				}
				else
				{				
					$final_string .= '<li>' . $menu . '</li>';
				}
			}
			return $final_string . '</ul>';
		}
		return false;
	}
}
$this->framework	=	new novah_framework( $this );