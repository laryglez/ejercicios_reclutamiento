<?php
$result = '';

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title> Titles & ages </title>
    
</head>

<body>
<div class="container mt-5">
    <h1> Titles & ages </h1>
    Crea una consulta SQL que devuelva la edad del dueño de cada libro y la edad del autor. La
salida debe ser algo como: <br>
title | owner_age | author_age <br>
------------+-----------+----------- <br>
papa goriot | 15 | 50 <br>
don quijote | 18 | 34 <br>
la iliada &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| 25 | 70


  
  <div class="mt-5">
  <h1>Solution</h1>
  
  SELECT title, <br>
(SELECT age FROM people, books WHERE owner_id=people.id AND B.owner_id=people.id LIMIT 1) AS owner_age,<br>
(SELECT age FROM people, books WHERE author_id=people.id AND B.author_id=people.id LIMIT 1) AS author_age <br>
FROM books B 
</div>

<div class="mt-5 mb-5">
  <a href="/" class="btn btn-primary btn-sm" role="button">Back</a>
</div>
        </div>
      </div>

EOPAGE;

$pageContents .= <<< EOPAGEC
  </body>
</html>
EOPAGEC;

echo $pageContents;

?>
