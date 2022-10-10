<?php
$result = '';
if ( isset( $_POST[ 'coordinates' ] ) ) {
    $coordinates = $_POST[ 'coordinates' ];
    $coordinates = explode( ',', $coordinates );

    $area = intersectionArea( $coordinates[ 0 ], $coordinates[ 1 ], $coordinates[ 2 ], $coordinates[ 3 ], $coordinates[ 4 ], $coordinates[ 5 ], $coordinates[ 6 ], $coordinates[ 7 ] );
    $result = "<p class='mt-5'>Intersection area is {$area} </p>";
}

function intersectionArea( $x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4 ) {
    $x_max = max( array( $x1, $x2, $x3, $x4 ) );
    $y_max = max( array( $y1, $y2, $y3, $y4 ) );

    $x_side = abs( $x1-$x2 ) + abs( $x3-$x4 ) - $x_max;
    $y_side = abs( $y1-$y2 ) + abs( $y3-$y4 ) - $y_max;

    if ( $x_side > 0 && $y_side > 0 ) {
        return $x_side * $y_side;
    } else {
        return 0;
    }
}

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title> Square area </title>
</head>

<body>
<div class="container mt-5">
  <div>
    <h1> Square area </h1>
    <form action="#" method="post">
        <label>Enter the coordinates separated by (,) (x1,y1,x2,y2,x3,y3,x4,y4):</label>
        <input type="text" name="coordinates" />
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
