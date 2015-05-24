<?php
if( ! function_exists( '__riake' ) )
{
	function __riake( $key , $array , $default = false , $STRICT_MODE = false ){
		if(is_array($array))
		{
			// Return false if value is an empty string
			if( $STRICT_MODE == true )
			{
				$value	=	array_key_exists($key, $array) ? $array[ $key ] : $default;
				return $value == '' ? $default : $value;
			}
			else
			{
				return array_key_exists($key, $array) ? $array[ $key ] : $default;
			}
		}
		return $default;
	}
}

if( ! function_exists( '__force_array' ) )
{
	/** 
	 * Force a var to be an array.
	 *
	 * @param Var
	 * @return Array
	**/
	function __force_array( $array )
	{
		if( is_array( $array ) )
		{
			return $array;
		}
		return array();
	}
}

/**
 * Word Limiter
 *
 * Limits a string to X number of words.
 *
 * @access	public
 * @param	string
 * @param	integer
 * @param	string	the end character. Usually an ellipsis
 * @return	string
 */
if ( ! function_exists('__word_limiter'))
{
	function __word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if (trim($str) == '')
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;
	}
}

if( ! function_exists( '__farray' ) )
{
	/**
	 * farray : return first index from a given Array
	 * 
	 * @access public
	 * @param Array
	 * @return Array/False
	 * @note Return False if index doesn't exists or if param is not an array.
	**/
	function __farray( $array , $return_it_self	= true )
	{
		if( $return_it_self == true )
		{
			return __riake( 0 , $array , $array );
		}
		else
		{
			return __riake( 0 , $array , false );
		}
	}
}