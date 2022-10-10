<?php
$result = '';
if(isset($_POST['list']))
{
  $list1 = $_POST['list'];
  $list1 = explode(',',$list1);
  $list1 = noReply($list1);
  $list1 = implode(',',$list1);

  $result = "<p class='mt-5'>The new list is {$list1} </p>";

}

function noReply($list)
{
  $last_position = count($list)-1;
  $aux = array();

  for($i=$last_position;$i>=0;$i--)
  {
    if(in_array($list[$i],$aux))
    {
      unset($list[$i]);
    }
    else
    {
      $aux[]=$list[$i];
    }
  }
  return $list;
}

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title> Delete from list </title>
</head>

<body>
<div class="container mt-5">
  <div>
    <h1> Delete from list </h1>
    <form action="#" method="post">
        <label>Enter the numbers separated by (,):</label>
        <input type="text" name="list" />
        <br/>
        <button type="submit" class="btn btn-primary btn-sm">Send</button>
        <a href="/" class="btn btn-primary btn-sm" role="button">Back</a>
    </form>
    {$result}
  </div>
</div>

EOPAGE;

$pageContents .= <<< EOPAGEC
</body>
</html>
EOPAGEC;

echo $pageContents;

?>
