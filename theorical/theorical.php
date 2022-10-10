<?php

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang = 'en'>
<head>
<meta charset = 'UTF-8'>
<meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<link rel = 'stylesheet' href = 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity = 'sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin = 'anonymous'>

<title> Dogs vs cats </title>

</head>

<body>
<div class = 'container mt-5'>
<div>
<h1> Dogs vs cats </h1>
Dos amigos están discutiendo sobre si en Internet se habla más sobre gatos o sobre
perros. No se ponen de acuerdo y deciden hacer un programa que resuelva ese problema. <br>
Entrada <br>
El programa recibe como entrada un fichero domains.txt que contiene un dominio por
cada fila. Ejemplo: <br>
domain.txt <br>
sitio1.com <br>
sitio2.net <br>
sitio3.org <br>
sitio4.com <br><br>

Salida <br>
El programa devuelve por la salida solamente una palabra “perro” o “gato” después de
hacer un análisis de cuál de los dos términos es el más usado en los dominios datos.
</div>

<div class = 'mt-5'>
<h1> Solution </h1>
<ol>
<li> Declarar variable para contar gatos </li>
<li> Declarar variable para contar perros </li>
<li> Abrir el archivo domain.txt </li>
<li> Por cada fila del archivo </li>
<ul>
<li> Verificar si en la fila actual se encuentra la subcadena perro al menos una vez. Hay varias maneras de hacer esto: </li>

<ul>
<li> Buscando la subcadena en la fila. Si se aplica esta variante entonces se aumenta el contador en 1. </li>
<li> Cortando la fila por la subcadena y guardando el resultado en un arreglo, es decir la subcadena sería el delimitador. En esta variante bastaría verificar que la longitud del arreglo es mayor que 1, para aumentar en 1 el contador de perro. </li>
</ul>
<li> Verificar si en la fila actual se encuentra la subcadena gato al menos una vez. Hay varias maneras de hacer esto: </li>
<ul>
<li> Buscando la subcadena en la fila. Si se aplica esta variante entonces se aumenta el contador en 1. </li>
<li> Cortando la fila por la subcadena y guardando el resultado en un arreglo, es decir la subcadena sería el delimitador. En esta variante bastaría verificar que la longitud del arreglo es mayor que 1, para aumentar en 1 el contador de gato. </li>
</ul>
</ul>
<li> Tomar una decisión si el contador de perros es mayor que el contador de gatos </li>
<ul>
<li> Mostrar la palabra perro y terminar.</li>
</ul>
<li> Tomar una decisión si el contador de gatos es mayor que el contador de perros </li>
<ul>
<li> Mostrar la palabra gato y terminar. </li>
</ul>
<li> Mostrar la palabra iguales y terminar, esto solo ocurre si no se cumplieron las condiciones 5 o 6. </li>

<br><br>
PD: Asumiendo que todos los dominios están en un solo idioma ( español ) y contienen la palabra nativa que se desea contabilizar. <br>
Gato: Sí <br>
Gatico: No <br>
Perro: Sí <br>
Cachorro: No <br><br>
Otro problema, es que la subcadena que se desea contar forme parte de un dominio en otro contexto, por ejemplo: gatorade, lo cual es una bebida energizante, no un animal. La solución a esta problemática estaría dada realizando un procesamiento del lenguaje natural ( inteligencia artificial ).

</div>

<div class = 'mt-5 mb-5'>
<a href = '/' class = 'btn btn-primary btn-sm' role = 'button'>Back</a>
</div>
</div>

EOPAGE;

$pageContents .= <<< EOPAGEC
</body>
</html>
EOPAGEC;

echo $pageContents;

?>
