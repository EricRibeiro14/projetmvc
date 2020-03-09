<?php
ob_start();
?>

<div class="container col-3">
  <h2 class="text-center">Connexion</h2>
  <form action="" method="post">
  <p class="text-center">
      <img style='width:200px; height:200px' src="image/profil.png" alt="">
  </p>
    <div class="form-group">
      <label for="email">login</label>
      <input type="text" class="form-control" id="" placeholder="Pseudo"  name="login" required>
    </div>
    <div class="form-group">
      <label for="pwd">Mot de passe</label>
      <input type="password" class="form-control" id="pwd" placeholder="Entrer mot de passe" name="pass" required>
    </div>
    <p class="text-center">
    <button type="submit" name="soumis" class="btn btn-primary col-12">Connexion</button>
  </p>
  <?php if(isset($erreur)){
      echo $erreur;
  };?>
    <p class="text-center">
  
  </p>
  </form>
</div>

</body>
</html>

<?php
$contenu = ob_get_clean();
require_once('./views/gabarit.php');
?>