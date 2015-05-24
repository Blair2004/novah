<?php
class novah_filter
{
	function __construct( $core )
	{
		$this->core		=	$core;
		add_filter('comment_reply_link', array( $this , 'replace_reply_link_class' ) );
	}
	function replace_reply_link_class($class){
		$class = str_replace("class='comment-reply-link", "class='pull-right reply", $class);
		return $class;
	}
}
$this->novah_filter	=	new novah_filter( $this );