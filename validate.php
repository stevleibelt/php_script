<?php

$int = 23;

echo xdebug_var_dump(Validate::IsInt($int), true);

/**
 * NET_BAZZLINE_VALIDATE is a class full of static functions to validate data
 *
 * @author artodeto@arcor.de
 * @access public
 * @since 2010-11-23 23:07
 * @version $id
 */
class Validate
{
    /**
     * Bazzline_Validate::IsInt
     * Validates if int is set and if typecast returns correct value
     *
     * @author artodeto(AT)arcor(DOT)de
     * @access public
     * @param int $int
	 * @param boolean $strict
     * @return boolean
     */
    public static function IsInt($int = false, $strict = true)
    {
        $return = false;

        if( ( isset($int) ) && ( $int !== false ) )
		{
			if( ( $strict === true ) &&
				( strlen($int) === strlen((int)$int ) ) )
			{
            
    	        $return = true;
			}
			elseif( ( strlen($int) == strlen((int)$int ) ) )
			{
				$return = true;
			}
        }

        return $return;
    }
}
?>