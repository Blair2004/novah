<?php
global $novah_core;
class novah_core
{
	function __construct()
	{
		$this->theme_path		=	get_template_directory();
		$this->theme_uri		=	get_template_directory_uri();
		$this->inc_path			=	$this->theme_path . '/inc';
		$this->classes_path		=	$this->inc_path . '/classes';
		$this->actions_path		=	$this->inc_path . '/actions';
		$this->filters_path		=	$this->inc_path . '/filters';
		$this->helpers_path		=	$this->inc_path . '/helpers';
		$this->shortcode_path	=	$this->inc_path . '/shortcodes';
		$this->view_path		=	$this->inc_path . '/views';
		$this->extensions_uri	=	$this->inc_path . '/extensions';
		$this->css_path			=	$this->theme_path . '/assets/css';
		$this->js_path			=	$this->theme_path . '/assets/js';
		$this->fonts_path		=	$this->theme_path . '/assets/fonts';
		$this->css_uri			=	$this->theme_uri . '/assets/css';
		$this->js_uri			=	$this->theme_uri . '/assets/js';
		$this->fonts_uri		=	$this->theme_uri . '/assets/fonts';
		$this->defaults			=	array();
		
		include_once( $this->inc_path . '/helpers-includer.php' );
		include_once( $this->inc_path . '/classes-includer.php' );		
		include_once( $this->inc_path . '/actions-includer.php' );
		include_once( $this->inc_path . '/shortcodes-includer.php' );
		include_once( $this->inc_path . '/extensions-includer.php' );
		include_once( $this->inc_path . '/filters-includer.php' );
		
	}
	
	function set_textdomain( $text )
	{
		$this->textdomain	=	$text;
	}
	function inc( $path )
	{
		return include( $this->inc_path . '/' . $path );
	}
	function inc_classes( $class_path )
	{
		include_once( $this->classes_path . '/' . $class_path );
	}
	function inc_filters( $class_path )
	{
		include_once( $this->filters_path . '/' . $class_path );
	}
	function inc_actions( $class_path )
	{
		include_once( $this->actions_path . '/' . $class_path );
	}
	function inc_helpers( $class_path )
	{
		include_once( $this->helpers_path . '/' . $class_path );
	}
	function inc_shortcodes( $path )
	{
		include_once( $this->shortcode_path . '/' . $path );
	}
	function inc_view( $path )
	{
		return include( $this->view_path . '/' . $path );
	}
	function inc_extensions( $path )
	{
		return include( $this->extensions_uri . '/' . $path );
	}
	function css_url( $path )
	{
		return $this->css_uri . '/' . $path .'.css';
	}
	function js_url( $path )
	{
		return $this->js_uri . '/' . $path . '.js';
	}
}
$novah_core					=	new novah_core;