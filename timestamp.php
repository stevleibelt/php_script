<?PHP

echo 'date | timestamp converter<br>'."\n".
     'by:: sleibelt<br>'."\n".
     'lastupdate:: 1296834300<br>'."\n".
     '----------------<br>';

$stage = $_GET['stage'];

switch($stage)
{
  case '1':
    convertTimestampToDate();
    break;
  case '2':
    convertDateToTimestamp();
    break;
  default:
    showForm();
    break;
}

echo '----------------<br><form action="" method="get"><input type="submit" name="reload" value="reload"></form>';

function showForm()
{
  echo '<form action="" method="get">'."\n".
       'date::'."\n".
       '<input type="text" name="date">(yyyy[ |-|/]mm[ |-|/]dd))<br>'."\n".
       'time::'."\n".
       '<input type="text" name="time">(hh[ |:|-]mm[ |:|-][ss])<br>'."\n".
       '<input type="hidden" name="stage" value="2">'."\n".
       '<input type="submit" name="convert" value="convert"><br>'."\n".
       '</form>'."\n".
       '----------------'."\n".
       '<form action="" method="get">'."\n".
       'timestamp::'."\n".
       '<input type="text" name="timestamp"><br>'."\n".
       '<input type="hidden" name="stage" value="1">'."\n".
       '<input type="submit" name="convert" value="convert"><br>'."\n".
       '</form>';
}

function convertDateToTimestamp()
{
  $date = $_GET['date'];
  $date = str_replace(' ', '', $date);
  $date = str_replace('-', '', $date);
  $date = str_replace('/', '', $date);

  $error = '';

  $time = $_GET['time'];
  $time = str_replace(' ', '', $time);
  $time = str_replace(':', '', $time);
  $time = str_replace('-', '', $time);

  if( (strlen($date) == 8) )
  {
    $y = substr($date, 0, 4);
    $m = substr($date, 4, 2);
    $d = substr($date, 6, 2);

    $date = $y.$m.$d;

    if( ( strlen($time) >= 4  ) )
    {
      while(strlen($time) < 6)
      {
        $time .= '0';
      }

      $h = substr($time, 0, 2);
      $i = substr($time, 2, 2);
      $s = substr($time, 4, 2);
    }
    else
    {
      $h = '00';
      $i = '00';
      $s = '00';
    }

    $time = $h.$i.$s;
    $timestamp = mktime($h, $i, $s, $m, $d, $y);
  }
  else
  {
    $error .= 'dateformat wrong<br>';
  }

  if( ( strlen($error) < 1 ) )
  {
    echo 'date::'.$date.'<br>'."\n";
    echo 'time::'.$time.'<br>'."\n";
    echo 'timestamp::'.$timestamp.'<br>'."\n";
  }
  else
  {
    echo 'error::'.$error.'<br>'."\n";
  }
}

function convertTimestampToDate()
{
  $error = '';

  $timestamp = $_GET['timestamp'];

  if( ( strlen($timestamp) > 0 ) )
  {
    $date = date('Y-m-d', $timestamp);
    $time = date('H:i:s', $timestamp);
  }
  else
  {
    $error .= 'no timestamp given<br>';
  }

  if( ( strlen($error) < 1 ) )
  {
    echo 'timestamp::'.$timestamp.'<br>'."\n";
    echo 'date::'.$date.'<br>'."\n";
    echo 'time::'.$time.'<br>'."\n";
  }
  else
  {
    echo 'error::'.$error.'<br>'."\n";
  }
}
?>
