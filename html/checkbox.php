<?PHP
namespace http\checkbox;

require_once '../url.php';

printForm();
if (isFormSended()) {
  $checkboxSelected = getFormCheckboxChecked();
  echo 'selected checkbox are::' . implode(', ', $checkboxSelected);
}

function printForm()
{
  $url = \url\getScriptUrl();

  echo '<form name="myForm" method="post" action="' . $url . '">' . 
    '<input type="checkbox" name="checkbox[]" value="foo">foo<br />' . 
    '<input type="checkbox" name="checkbox[]" value="bar">bar<br />' . 
    '<input type="checkbox" name="checkbox[]" value="foobar">foobar<br />' . 
    '<input type="hidden" name="id" value="myFormId">' . 

    '<input type="submit" name="submit" value="send" />' . 
    '</form>';
}

function isFormSended()
{
  $isSended = false;

  if (is_array($_POST)
      && (count($_POST) > 0)) {
    $isSended = true;
  }

  return $isSended;
}

function getFormCheckboxChecked($elementName = 'checkbox')
{
  $checkboxSelected = array();

  if (isset($_POST[$elementName])) {
    $elements = $_POST[$elementName];
    foreach ($elements as $element) {
      array_push($checkboxSelected, $element);
    }
  }

  return $checkboxSelected;
}
