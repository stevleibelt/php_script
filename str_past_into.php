<?php
/*
 * This file is part of the artodeto_helper_files
 *
 * artodeto_helper_files are free software: you can redistribute them and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * artodeto_helper_files is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Zend_Framework_Bazzline Extension.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * For more Informations, see http://www.leibelt.de
*/
$i = 0;
$s[$i++] = '<a href="/asdasd/asdasd" title="title" alt="alt_sdasd" class="ssas">schwing</a>';
$s[$i++] = '<a href="/asdasd/asdasd" title="title" alt="" class="ssas">schwing</a>';
$s[$i++] = '<a href="/asdasd/asdasd" title="title" class="ssas">schwing</a>';
$s[$i++] = 'alt="meinalter"<a href="/asdasd/asdasd" title="title" class="ssas">schwing</a>';

foreach($s as $v => $k)
{
	echo 'string::'.htmlspecialchars($k).'<br>';
	echo 'past_into_content::'.htmlspecialchars(str_paste_into($k, '--content--', 'alt="', '" ')).'<br>----<br>';
}

/**
 * Past content into a part of string
 *
 * @author artodeto@bazzline.net
 * @param string $string
 * 		the string containing the "to cut out" content
 * @param string $content
 * 		the content to add
 * @param string $str_start
 * 		the string befor the "to cut out" content
 * @param string $str_end
 * 		the string after the "to cut out" content
 * @return mixed, false or string 
 * @since 2010-09-17
 */
function str_paste_into($string, $content, $str_start, $str_end)
{
	$return = $string;

	if( ( strlen($string) > 0 ) &&
		( strlen($content) > 0 ) &&
		( strlen($str_start) > 0 ) &&
		( strlen($str_end) > 0 ) )												//simple and short param-validation
	{
		$pos_start = stripos($string, $str_start);								//try to find position of str_start

		if( ( $pos_start !== false ) )											//string found? Attention "==" means, "0" is also false
		{
			$pos_start += strlen($str_start);
			$pos_end = stripos($string, $str_end, $pos_start);

			if( ( $pos_end >= $pos_start ) )										//only return when content between str_start and str_end is available
			{
				$return = substr($string, 0, $pos_start);
				$return .= $content;
				$return .= substr($string, $pos_end);
			}
		}
	}
	return $return;
}
