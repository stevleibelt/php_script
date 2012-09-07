<html>
<body>
<?
$i = 1;

printNext($i++);

$array = array ("W1" => array("I. 1", "I. 2"), "W2" => array ("II. 1", "II. 2"));
echo $array["W1"][1],"<br>";

printNext($i++);

$x=array("montag"=>3,"dienstag"=>4,5,6,7,8);
// für Arrays gibt es eine eigene Schleifenkonstruktion, die sich besonders
// bei assoziativen Arrays anbietet. Die folgenden foreach-Schleife wird für
// jedes Element des Arrays $x einmal durchlaufen, wobei der jeweilige Wert
// aus dem Array in die Variable $x, der Index bzw. Schlüssel in die Variable
// $key kopiert wird. Die folgende Schleife gibt daher ein assoziatives Array
// mit Schlüsseln aus.
foreach ($x as $key=>$value) {
    echo $key,"=>",$value,"<br>";
}

printNext($i);

$ar=array("test", 0, "test3", "testvier" );
// Die foreach-Schleife ist eine Neuerung in PHP4. In PHP3 gibt es
// eine ähnliche Konstruktion, die einen internen Zähler in jedem
// Array nutzt. Dieser wird zunächst mit reset auf das erste Element
// zurückgesetzt.

reset($ar);
// anschliessen wird die Schleife mit den Befehlen list und each
// realisiert
while (list($key,$value)=each($ar)) {
    echo $key," => ", $value, "<br>";
}

foreach($ar as $value) {
    echo("$value <br>");
}
echo "<br>";
foreach($ar as $key=>$value) {
    echo("$key:$value <br>");
}
?>
</html>
</body>

<?

function printNext($i){
	echo '<br>--------<br>Next&nbsp;'.$i.'<br>--------<br><br>';
}
?>