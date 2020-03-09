<?php ob_start(); 

?>
<div class="container">
  <div class="row">
    <div class="card col-4 offset-4" style="width: 18rem;">
        <img src="../image/<?=$image;?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h2 class="card-title text-center"><?=$marque ;?>   <?=$model;?></h2>
            <p><strong>Prix : </strong><span class="btn btn-success" ><?=$prix;?> &euro;</span> </p>
          </div>
       
      <form action="./payement.php" class="col" method="POST">
<input type="hidden" value="<?=$id;?>" name="id">
<input type="hidden" value="<?=$prix;?>" name="prix">
<script
  src="https://checkout.stripe.com/checkout.js"
  class="stripe-button"
  data-key="pk_test_C3pR4HvmW0RtHPmeJZoBpfPR00m7mzxGLU"
  data-name="Concessionnaire"
  data-description="Vehicules de luxe"
  data-amount="<?=$prix?>00"
  data-currency="eur"
  data-locale="auto">
</script>
</form>
</div>
      </div>
</div>
</div>
<?php $contenu =ob_get_clean();
require_once('../template.php')?>