<?php
$result = '';
if ( isset( $_POST[ 'number' ] ) ) {
  $number = $_POST[ 'number' ];
  if( is_numeric( $number ) && (int) $number == $number ) {
    $amount = countSuperPrime( $number );
    if ( $amount == 1 ) {
        $result = "<p class='mt-5'>There is {$amount} super prime number until {$number} </p>";
    } else {
        $result = "<p class='mt-5'>There are {$amount} super prime numbers until {$number} </p>";
    }
  } else {
    $result = "<p class='mt-5'>There is not a number </p>";
  }  
}

function countSuperPrime( $number ) {
    $amount = 0;
    for ( $i = 2; $i <= $number; $i++ ) {
        if ( isSuperPrime( $i ) ) {
            $amount++;
        }
    }

    return $amount;
}

function isSuperPrime( $num ) {
    $actual = $num;
    $i = 0;
    $str_len = strlen( $num );
    do {
        if ( !prime( $actual ) ) {
            return false;
        } else {
            $actual = ror( $actual );
        }
        $i++;
    }
    while( $i< $str_len );

    return true;
}

function prime( $num ) {
    $square = sqrt( $num );
    for ( $i = 2; $i <= $square; $i++ ) {
        if ( $num%$i == 0 ) {
            return false;
        }
    }
    
    return true;
}

function ror( $num ) {
    $str_len = strlen( $num );
    $remainder = $num%10;
    $num = $num - $remainder;
    $quotient = $num/10;

    return $remainder.$quotient;
}


$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title> Super prime numbers </title>
</head>

<body>
  <div class="container mt-5">
    <div>
      <h1> Super prime numbers </h1>
      <form action="#" method="post">
        <label>Enter the number:</label>
        <input type="text" name="number" />
        <br/>
        <button type="submit" class="btn btn-primary btn-sm">Send</button>
        <a href="/" class="btn btn-primary btn-sm" role="button">Back</a>
        
    </form>
    {$result}
    </div>
  </div>

EOPAGE;

if(isset($_POST['number']))
{
  
}

$pageContents .= <<< EOPAGEC

</body>
</html>
EOPAGEC;

echo $pageContents;

?>
