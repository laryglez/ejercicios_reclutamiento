<?php

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title> Theorical </title>
    
</head>

<body>
<div class="container mt-5">
  <div>
    <h1> Theorical execises </h1>
    <form action="#" method="post">
        <label>String CSV:</label>
        <input type="text" name="csv" />
        <label>Column:</label>
        <input type="text" name="column" />
        <br/>
        <button type="submit" class="btn btn-primary btn-sm">Send</button>
        <a href="/" class="btn btn-primary btn-sm" role="button">Back</a>
    </form>
  </div>
</div>

EOPAGE;

$pageContents .= <<< EOPAGEC
  </body>
</html>
EOPAGEC;

echo $pageContents;

?>
