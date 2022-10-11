<?php
$result = '';
if ( isset( $_POST[ 'csv' ] ) && isset( $_POST[ 'column' ] ) ) {
    $csv = $_POST[ 'csv' ];
    $column = $_POST[ 'column' ];
    try {
        $result = sort_csv( $csv, $column );
        $result = implode( '\\n', $result );
        $result = "<p class='mt-5'>The resulting string is: $result</p>";
    } catch ( Exception $e ) {
        $result = '<p class="mt-5">Exception: '.  $e->getMessage(). '</p>';
    }

}

function sort_csv( $csv, $column ) {
  $data = explode( '\\n', $csv );
  $data_array = array();
  foreach ( $data as $row ) {
    $data_array [] = explode( ',', $row );
  }
  foreach ( $data_array as $row ) {
    if ( count( $row ) <= $column ) {
      throw new Exception( 'Column does not exist in any row.' );
    }
  }
  
  $aux = array();
  foreach ( $data_array as $key => $fila ) {
    $aux[ $key ] = $fila[ $column ];
  }
  array_multisort( $aux, SORT_ASC, $data_array );

  $result = array();
  foreach ( $data_array as $row ) {
    $result[] = implode( ',', $row );
  }

  return $result;
}

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>CSV</title>
    
</head>

<body>
<div class="container mt-5">
  <div>
    <h1> CSV </h1>
    <form action="#" method="post">
        <label>String CSV:</label>
        <input type="text" name="csv" />
        <label>Column:</label>
        <input type="text" name="column" />
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
