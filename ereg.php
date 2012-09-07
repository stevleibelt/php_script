<?

testReg('https://webredaktion.eon-energie.com/vip/InternetENE_edit/pages/ene_en/Press/Press_Releases/News/Pressemitteilung.htm');
testReg('http://www.eon-netz.com/pages/ene_de/EEG__KWK-G/Kraft-Waerme-_Kopplungsgesetz/Links_und_Downloads/index.htm');

function testReg($url){
	if (ereg('InternetENE_edit', $url) !== FALSE) {
		echo '<br />InternetENE_edit!';
	}else{
		echo '<br />nothing';
	}
}
?>