<?PHP
echo calculateZodiac(21, 3);

function calculateZodiac($day, $month)
{
	$zodiac = 0;
	$day = (int)$day;
	$month = (int)$month;

	$zodiacs = array(1 => array(20 => 50, 21 => 51),
					 2 => array(19 => 51, 20 => 52),
					 3 => array(20 => 52, 21 => 41),
					 4 => array(20 => 41, 21 => 41),
					 5 => array(20 => 42, 21 => 43),
					 6 => array(21 => 43, 22 => 44),
					 7 => array(22 => 44, 23 => 45),
					 8 => array(23 => 45, 24 => 46),
					 9 => array(23 => 46, 24 => 47),
					 10 => array(23 => 47, 24 => 48),
					 11 => array(22 => 48, 23 => 49),
					 12 => array(21 => 49, 22 => 50),);

	if( ( isset($zodiacs[$month] ) ) )
	{
		$intervall = array_keys($zodiacs[$month]);
		if( ( isset($intervall[0]) ) && ( $day <= $intervall[0] ) )
		{
			$zodiac = $zodiacs[$month][$intervall[0]];
		}
		elseif( ( isset($intervall[1]) ) )
		{
			$zodiac = $zodiacs[$month][$intervall[1]];
		}
	}
	
	return $zodiac;
}
?>

