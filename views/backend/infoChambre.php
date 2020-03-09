<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container ">
  <div class="card offset-4 mt-5" style="width:400px">
    <img class="card-img-top" src="./asset/image/<?=$data->getimage();?>" alt="Card image" style="width:100%">
    <div class="card-body">
    <h2>Chambre n°  <?=$_GET['id']?></h2>
      <ul style="list-style-type: none;"><br>
          <li>Nombre de lits  :  <?=$data->getnblits();?></li><br>
          <li>Nombre de personnes  :  <?=$data->getnbpers();?></li><br>
          <li>Prix  : <?=$data->getprix();?>  &euro;/ nuit</li><br>
          <li>Confort  : <?=$data->getcomfort();?></li>
</ul>
      </div>
      <a href="index.php?action=list_chambre" class="btn btn-secondary" >retour</a>
  </div>
  <br>
</body>
</html>
<?php
$contenu = ob_get_clean();
require_once("template.php");
?>