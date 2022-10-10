<?php
$theorical = "theorical.php";

$csv = "csv.php";
$soccer = "soccer.php";
$noreply = "noreply.php";
$nextperiodic = "nextperiodic.php";
$squarearea = "squarearea.php";
$superprime = "superprime.php";

$owners_books = "owners-books.php";
$ages = "ages.php";
$more_written = "more-written.php";
$update_favorite = "update-favorite.php";

$baseT = "./theorical/";
$base = "./php/";
$baseS = "./sql/";

$pageContents = <<< EOPAGE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Exercises</title>
</head>

<body>
<div class="container mt-5">  
  <div class="alert alert-primary" role="alert">
	<b> Theorical exercises </b>
  </div>

  <div class="list-group">
	<a href="{$baseT}{$theorical}" class="list-group-item list-group-item-action"> Dogs vs cats </a>
  </div>

  <div class="alert alert-primary mt-5" role="alert">
  	<b> PHP exercises (v7.4.26)</b>
  </div>
  
  <div class="list-group">
	<a href="{$base}{$csv}" class="list-group-item list-group-item-action"> CSV </a>
	<a href="{$base}{$soccer}" class="list-group-item list-group-item-action">Soccer clasification</a>
	<a href="{$base}{$noreply}" class="list-group-item list-group-item-action">Delete from list</a>
	<a href="{$base}{$nextperiodic}" class="list-group-item list-group-item-action">Next number on binary sequency</a>
	<a href="{$base}{$squarearea}" class="list-group-item list-group-item-action">Square area</a>
	<a href="{$base}{$superprime}" class="list-group-item list-group-item-action">Super prime numbers</a>	
  </div>
  
  <div class="alert alert-primary mt-5" role="alert">
	<b> SQL exercises (MySQL v5.7.36) </b>
  </div>
  <div class="mb-3">
	  Download the database script from Google Drive &nbsp;
    <a href="https://drive.google.com/file/d/1wU4j8JosZoVeNKasS0jOGEa3i1kLHmLS/view?usp=sharing" target="_blank" class="btn btn-primary btn-sm" role="button">Download</a>
  </div>
  
  <div class="list-group mb-5">
	<a href="{$baseS}{$owners_books}" class="list-group-item list-group-item-action">Amount by owners </a>
	<a href="{$baseS}{$ages}" class="list-group-item list-group-item-action">Titles & ages</a>
	<a href="{$baseS}{$more_written}" class="list-group-item list-group-item-action">More books written</a>
	<a href="{$baseS}{$update_favorite}" class="list-group-item list-group-item-action">Update favorite authors</a>	
  </div>
</div>

EOPAGE;

$pageContents .= <<< EOPAGEC

<script>

</script>
</body>
</html>
EOPAGEC;

echo $pageContents;

?>
