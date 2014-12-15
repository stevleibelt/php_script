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
/**
 * A Helperfunction to centralize db_querys
 *
 * @author artodeto@bazzline.net
 * @param array $a
 * 	needed keys are 'select' and 'from', optional keys are 'where', 'group',
 * 		'order', 'limit'
 * 	'select' could be as array('value1', 'value2') etc. or 
 * 		array('as1' => 'value1', 'as2' => 'value2')
 * 	'from' could be as array('from1', 'from2') etc. or 
 * 		array('as1' => 'from1', 'as2' => 'from2')
 * 	'join' could be as array('inner' => array('as1' => 'table1'), 'ON-EXPRESSION'
 * 	'where' is a real array (no assoziativ)
 * 	'group' is a real array
 * 	'order' could be array('order1', 'order2' or
 * 		array('order1' => 'DESC', 'order2' => 'ASC')
 * 	'limit' is a real array. if more then one value is set limit will be set as
 * 		'LIMIT limit[0], $limit[1]'
 * @param boolean $debug
 * 	if set to true, the query will be set as "status" by using drupals "set_message" method
 * @return mixed, false or result
 * @since 2011-06-19
 */
function drupal_6_db_get_result($a, $debug = false)								//http://dev.mysql.com/doc/refman/5.1/de/query-speed.html
{
	$return = false;

	if( ( is_array($a) === true ) &&
		( count($a) >= 2 ) )													//key 'select' are key 'from' are essential keys
	{
		$error = false;
		$query = '';

		if( ( isset($a['select']) === true ) )
		{
			$query .= 'SELECT ';
			if( ( is_array($a['select']) !== true ) )
			{
				$a['select'] = array($a['select']);
			}
			foreach($a['select'] AS $k => $v)
			{
				$query .= ( ( ( is_numeric($k) !== true ) ) ? 
					$k.' AS '.$v : $v ).', ';
			}
			$query = substr($query, 0, -2).' ';
		}
		else
		{
			$error = true;
		}

		if( ( isset($a['from']) === true ) &&
			( $error === false ) )
		{
			$query .= 'FROM ';
			if( ( is_array($a['from']) !== true ) )
			{
				$a['from'] = array($a['from']);
			}
			foreach($a['from'] AS $k => $v)
			{
				$query .= '{'.$v.'}'.( ( ( is_numeric($k) !== true ) ) ? 
					' AS '.$k : '' ).', ';
			}
			$query = substr($query, 0, -2).' ';
		}
		else
		{
			$error = true;
		}

		if( ( $error === false ) )
		{
			if( ( isset($a['join']) === true ) &&
				( is_array($a['join']) === true ) )
			{
				$joins = array('inner', 'left', 'right');
				foreach($joins as $jk => $jv)
				{
					if( ( isset($a['join'][$jv]) ) &&
						( count($a['join'][$jv]) >= 2 ) )
					{
						$tb = $a['join'][$jv][0];
						if( ( is_array($tb) === true ) )
						{
							$tb = '{'.implode('', array_values($tb)).'} AS '.
								implode('', array_keys($tb));
						}
						else
						{
							$tb = '{'.$tb.'}';
						}
						$query .= strtoupper($jv).' JOIN '.$tb.' ON '.$a['join'][$jv][1].' ';
					}
				}
			}

			if( ( isset($a['where']) === true ) )
			{
				$query .= 'WHERE ';
				if( ( is_array($a['where']) !== true ) )
				{
					$a['where'] = array($a['where']);
				}
				foreach($a['where'] AS $k => $v)
				{
					$query .= $v.' AND ';
				}
				$query = substr($query, 0, -5).' ';
			}

			if( ( isset($a['group']) === true ) )
			{
				$query .= 'GROUP BY ';
				if( ( is_array($a['group']) !== true ) )
				{
					$a['group'] = array($a['group']);
				}
				foreach($a['group'] AS $k => $v)
				{
					$query .= $v.', ';
				}
				$query = substr($query, 0, -2).' ';
			}

			if( ( isset($a['order']) === true ) )
			{
				$query .= 'ORDER BY ';
				if( ( is_array($a['order']) !== true ) )
				{
					$a['order'] = array($a['order']);
				}
				foreach($a['order'] AS $k => $v)
				{
					if( ( is_numeric($k) === true ) )
					{
						$query .= $v.', ';
					}
					else
					{
						$query .= $k.' '.$v.', ';								//key === order by $v === ASC || DESC
					}
				}
				$query = substr($query, 0, -2).' ';
			}

			if( ( isset($a['limit']) === true ) )
			{
				$query .= 'LIMIT ';
				if( ( is_array($a['limit']) !== true ) )
				{
					$a['limit'] = array($a['limit']);
				}
				if( ( count($a['limit']) < 2 ) )
				{
					$query .= $a['limit'][0];
				}
				else
				{
					$query .= $a['limit'][0].', '.$a['limit'][1];
				}
			}
		}

		if( ( $error === false ) )
		{
			$return = db_query($query);
		}
	}

	return $return;
}
