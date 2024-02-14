<?php
include '../views/templates/header.php'
?>
<h2>Connexion</h2>
<form method="POST" action="../controllers/controller-signin.php">
      <div>
            <label for="mailadress">Adresse Mail</label>
            <input placeholder="Ex: JohnDoe@gmail.com" name="mailadress" id="mailadress" type="text" class="validate">
      </div>

      <div>
            <label for="password">Mot de Passe </label>
            <input placeholder="Mot de Passe" name="password" id="password" type="password" class="validate">
      </div>

      <div class="center-align">
            <button class="btn waves-effect waves-light" type="submit" name="action">Se connecter</button>
      </div>
</form>
<p>Pas de compte ? <a href="../controllers/controller-signup.php">Inscrivez-vous ici</a></p>

<?php
include '../views/templates/footer.php'
?>