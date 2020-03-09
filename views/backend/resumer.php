<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>resumé</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container ">
    <h3>Resumé de la reservation</h3>
  <div class="card offset-4 mt-5" style="width:400px">
    <img class="card-img-top" src="./asset/image/<?=$data2->getimage();?>" alt="Card image" style="width:100%">
    <div class="card-body">
    <h2>Chambre n° <?=$_GET['id'];?> </h2>
      <ul style="list-style-type: none;"><br>
          <li><h5> Du  <?php echo date('d/m/y' , strtotime($_GET['arrivee']));  ?> Au <?php echo date('d/m/y' , strtotime($_GET['depart']));  ?></li></h5><br>
          <li>Prix  :  <?php echo $data2->getprix();?> &euro;/ nuit</li><br>
          <?php $total = (strtotime($_GET['depart']) - strtotime($_GET['arrivee']))/3600/24*$data2->getprix();?>
          <?php if($total > 350 ){?>
            <li>Total : <span  class= "btn btn-success " ><?=$total;?> &euro; - 15% </span><small>(Remisse exceptionnelle !!)</small> </li>
            <?php $total = $total*0.75;?>
          <?php } ?>
          <li style="font-size:20px" >Total : <span style="font-size:35px"><?=$total;?> &euro;</span></li>
          <p class="text-center">
<script
  src="https://checkout.stripe.com/checkout.js"
  class="stripe-button"
  data-key="pk_test_C3pR4HvmW0RtHPmeJZoBpfPR00m7mzxGLU"
  data-name="Hotel"
  data-description="Chambre d'hotel"
  data-amount="<?=$total?>00"
  data-currency="eur"
  data-locale="auto">
</script>
</p>
</ul>
      </div>
      
  </div>
  <br>
</body>
</html>
<?php
$contenu = ob_get_clean();
require_once("./views/gabarit.php");
?>