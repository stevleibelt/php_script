<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Urlaub 2011</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
        body{margin: 0; padding: 0;}
        table{text-align: left; border: 1px solid #222222; background-color: #CCCCCC; width: 800px; margin: 4px 2px;}
        table tr{background-color: #FFFFFF; vertical-align: top;}
        table th{border: 1px solid #444444; padding: 2px 4px; background-color: #FFCC66;}
        table td{border: 1px solid #888888; padding: 2px 4px;}

        #content{width: 800px;}

        .sumup{background-color: #FFCC66;}
    </style>
  </head>
  <body>
      <div id="content">
          <table>
              <tr>
                  <th>Station</th>
                  <th>Start</th>
                  <th>Ziel</th>
                  <th>Kilometer</th>
                  <th>Fahrtzeit</th>
                  <th>Tag</th>
                  <th>Übernachtung</th>
                  <th>Datum</th>
                  <th>Preis</th>
              </tr>
<?php
$startTermin = array(13, 2, 2011);
$station = 0;
$tag = 1;
$uebernachtung = 0;
$kilometer = 0;
$fahrtzeit = 0;
$preis = 0;

$td = array();

$td[$station++] = array($station, 'Hamburg', 'Wismar', 126, 86, $tag ,0, 0, 'Kaffeepause');
$tag += $td[$station-1][6];
$td[$station++] = array($station, $td[$station-2][2], 'Kühlungsborn', 41, 41, $tag, 1, 85, 'Polar-Stern: DZ, Seeseite inkl. Frühstück<br>Email geschickt');
$tag += $td[$station-1][6];
$td[$station++] = array($station, $td[$station-2][2], 'Zingst', 100, 101, $tag, 2, 278, 'Vier Jahreszeiten Resort: Wellness-Paket "Relax"<br>Paketleistungen pro Person: 2 Übernachtungen inklusive Frühstück, kostenfreie Nutzung des Wellnessbereichs, einstündige Ganzkörpermassage');
$tag += $td[$station-1][6];
$td[$station++] = array($station, $td[$station-2][2], 'Stralsund', 45, 45, $tag, 2, 82, 'Altstadt zur Post: DZ exkl. Früstück');
$tag += $td[$station-1][6];
$td[$station++] = array($station, $td[$station-2][2], 'Heringsdorf', 110, 100, $tag, 1, 77, 'Aurelia Hotel St. Hubertus inkl. Frühstück');
$tag += $td[$station-1][6];
$td[$station++] = array($station, $td[$station-2][2], 'Rostock', 170, 140, $tag, 1, 79.20, 'pentahotel Rostock exkl. Frühstück');
$tag += $td[$station-1][6];
$td[$station++] = array($station, $td[$station-2][2], 'Schwerin', 90, 60, $tag, 2, 112, 'Crowne Plaza exkl. Frühstück');
$tag += $td[$station-1][6];
$td[$station++] = array($station, $td[$station-2][2], 'Hamburg', 110, 90, $tag, 0, 0);

foreach($td as $k => $v)
{
    $uebernachtung += $v[6];
    $kilometer += $v[3];
    $fahrtzeit += $v[4];
    $timestamp = mktime(0, 0, 0, $startTermin[1], ($startTermin[0]-1+$v[5]), $startTermin[2]);
    $preis += $v[7];

    echo '<!-- '.$v[1].' -> '.$v[2].' -->'."\n";
    echo '<tr><td>'.$v[0].'</td>'."\n";
    echo '<td>'.$v[1].'</td>'."\n";
    echo '<td>'.$v[2].'</td>'."\n";
    echo '<td>'.$v[3].'</td>'."\n";
    echo '<td>'.$v[4].'</td>'."\n";
    echo '<td>'.$v[5].'</td>'."\n";
    echo '<td>'.$v[6].' ('.$v[2].')</td>'."\n";
    echo '<td>'.date('d-m-Y (D)', $timestamp).'</td>';
    echo '<td>'.$v[7].'</td></tr>';
}

    ?>
              <tr class="sumup">
                  <td>Gesamt</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><?php echo $kilometer; ?></td>
                  <td><?php echo $fahrtzeit; ?></td>
                  <td>&nbsp;</td>
                  <td><?php echo $uebernachtung; ?></td>
                  <td>&nbsp;</td>
                  <td><?php echo $preis; ?><br>
                      +Tanken<br>
                      <?php echo $preis+150; ?></td>
              </tr>
          </table>
          <table>
              <tr>
                  <th style="width: 80px;">Ort</th>
                  <th>Notizen</th>
              </tr>
<?php
foreach($td as $k => $v)
{
    if( ( $v[2] !== 'Hamburg' ) )
    {
        echo '<tr>'."\n";
        echo '<td>'.$v[2].'</td>'."\n";
        echo '<td>'.$v[8].'<br>
            - <br>
            - <br>
            - </td>'."\n";
        echo '</tr>'."\n";
    }
}
?>
          </table>
      </div>
  </body>
</html>
