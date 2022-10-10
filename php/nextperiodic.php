<?php
$result = '';
if(isset($_POST['decimal']))
{
  $decimal = $_POST['decimal'];
  $next = nextPeriodic($decimal);

  $result = "<p class='mt-5'> Next periodic is {$next} </p>";
}

function nextPeriodic($decimal)
{
$result = 0;
$flag = false;
$k = 1;
while(!$flag)
{
    $binary = decbin($decimal + $k);
    $length = strlen($binary);
    $middle = $length/2;
    
    for($i = 1; $i <= $middle; $i++)
    {
        if($length%$i == 0)
        {
            if(checkBinaryPeriodicity($binary,$i))
            {
                $flag = true;
                $result = $decimal + $k;
                break;
            }
        }
    }
    $k++;
    
}    
return $result;
}
    
    function checkBinaryPeriodicity($binary, $periodicity){
        $pattern = substr($binary, 0, $periodicity);
        $str_len = strlen($binary);
        for($i = $periodicity; $i < $str_len; $i+=$periodicity)
        {
            $portion = substr($binary,$i,$periodicity);
            if($pattern != $portion)
            {
                return false;
            }
        }
        
        return true;
    }

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title> Next number on binary sequency </title>

</head>

<body>
<div class="container mt-5">
  <div>
    <h1> Next number on binary sequency </h1>
    <form action="#" method="post">
        <label>Enter decimal number:</label>
        <input type="text" name="decimal" />
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
