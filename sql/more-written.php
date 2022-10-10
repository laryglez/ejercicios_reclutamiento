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

    <title> More books written </title>
    
</head>

<body>
<div class="container mt-5">
  <div>
    <h1> More books written </h1>
    Crea una consulta SQL que devuelva el listado de personas que han escrito más libros que
la cantidad que poseen. O sea cada persona puede haber escrito N libros y ser dueña de M
libros. El resultado solo deben salir los nombres de las personas en las N > M. <br>
name <br>
---------- <br>
paco <br>
perico <br>
pirolo
  </div>

  <div class="mt-5">
    <h1> Solution </h1>
    SELECT name FROM people P <br>
    WHERE (Select COUNT(*) FROM books,people WHERE owner_id=people.id AND P.name=people.name) < (SELECT COUNT(*) FROM books, people WHERE author_id=people.id AND P.name=people.name) <br>
    GROUP BY name

  </div>

<div class="mt-5 mb-5">
  <a href="/" class="btn btn-primary btn-sm" role="button">Back</a>
</div>

</div>

EOPAGE;

$pageContents .= <<< EOPAGEC
  </body>
</html>
EOPAGEC;

echo $pageContents;

?>
