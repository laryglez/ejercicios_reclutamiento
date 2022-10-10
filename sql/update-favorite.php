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

    <title> Update favorite author </title>
    
</head>

<body>
<div class="container mt-5">
  <div>
    <h1> Update favorite author </h1>
    Se quiere actualizar la columna favorite_author_id de la tabla people, y almacenar en
ella, el autor preferido de cada persona. Ese nuevo valor debe calcularse a partir de los autores de los libros de cada persona.
Por ejemplo, si una persona, es dueña de 10 libros, de los cuales 5 son del autor X, 3 son del autor Y, y 2 son del autor Z. debe aparecer el id del autor X en la columna
favorite_author_id de dicha persona. <br>
Se quiere realizar una sentencia SQL (UPDATE) para actualizar esa columna para todas las
personas. <br>
  </div>

  <div class="mt-5">
    <h1> Solution </h1>
    UPDATE people P <br>
    SET favorite_author_id = ( <br>
    SELECT author_id FROM books b WHERE owner_id=P.id ORDER BY (SELECT COUNT(*) book_count FROM books c GROUP BY c.author_id limit 1) DESC)

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
