<?php

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title> Amount by owners </title>
    
</head>

<body>
<div class="container mt-5">
  <div>
    <h1> Amount by owners </h1>
    
Crea una consulta SQL que devuelva el listado de personas con la cantidad de libros de las
que es dueño, este listado debe aparecer ordenado de mayor a menor. Las personas que no
tengan ningún libro, no deben aparecer en el resultado. Si más de una persona tiene la misma
cantidad de libros, entonces deben quedar ordenadas alfabéticamente entre ellas. La salida
debe ser algo como:<br>
name | amount <br>
--------+---------<br>
paco | 10 <br>
perico | 8 <br>
pocholo | 8 <br>
pancho | 5 <br>
pupo | 5 <br>
pirolo | 3

  </div>
  <div class="mt-5">
  <h1>Solution</h1>
  
  SELECT name, (SELECT COUNT(*) FROM books, people WHERE owner_id=people.id AND P.name = people.name) AS amount <br>
  FROM people P <br>
  GROUP BY name <br>
  ORDER BY amount, name <br>
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
