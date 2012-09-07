<?
$i = 0;
$navigationArray = array(	$i++ => array('Home','Home','Sandy Beach Resort', 1, 1, 'home.htm'),	//Position => Angezeigter Name, Name in der URL, benutztes Template, Contentart, Schlagwoerter, Contentdatei
							$i++ => array('Philosophie','Philosophie','Sandy Beach Resort', 2, 1, 'philosophie.htm'),
							$i++ => array('Die Insel Foa','Die_Insel_Foa','Sandy Beach Resort', 2, 1, 'die_insel_foa.htm'),
							$i++ => array('Das Resort','Das_Resort','Sandy Beach Resort', 2, 1, 'das_resort.htm'),
							$i++ => array('Aktivitäten','Aktivitaeten','Sandy Beach Resort', 2, 1, 'aktivitaeten.htm'),
							$i++ => array('Gut zu wissen','Gut_zu_wissen','Sandy Beach Resort', 2, 1, 'gut_zu_wissen.htm'),
							$i++ => array('Preise & Buchung', 'Preise_und_Buchung', 'Sandy Beach Resort', 2, 1, 'preise_und_buchung.htm')
						);

echo '<br>i::'.$i.'<br>arraySize:'.sizeof($navigationArray);

echo '<br>URL_NAME::'.$navigationArray[1][1];

echo '<br>____newArray';

$newArray = array(	'de' => array ('de', 'Deutsch', 'german', './media/img/flagDe.jpg'),
					'en' => array ('en', 'english', 'english', './media/img/flagEn.jpg')
				);

foreach($newArray as $key){
	echo '<br>'.$key[0];
}

var_dump($newArray);
?>