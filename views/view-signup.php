<?php
include '../views/templates/header.php'
?>
<h2>Inscription</h2>
<form method="POST" action="../controllers/controller-signup.php">
      <div>
            <label for="mailadress">Adresse Mail</label>
            <input placeholder="Ex: JohnDoe@gmail.com" name="mailadress" id="mailadress" type="email" class="validate">
            <p class="errorText">
                    <?=isset($errors['mailadress']) ? $errors['mailadress'] : "";?>
            </p>
      </div>
      <div>
            <label for="siret">Numero SIRET</label>
            <input placeholder="76000111222333" name="siretnumber" id="siretnumber" type="text" class="validate">
            <p class="errorText">
                    <?=isset($errors['siretnumber']) ? $errors['siretnumber'] : "";?>
            </p>
      </div>
      <div>
            <label for="name">Nom de l'entreprise</label>
            <input placeholder="Acme" name="name" id="enterprisename" type="text" class="validate">
            <p class="errorText">
                    <?=isset($errors['name']) ? $errors['name'] : "";?>
            </p>
      </div>
      <div>
            <label for="adress">Adresse</label>
            <input placeholder="25 Rue des joncquilles" name="adress" id="adress" type="text" class="validate">
            <p class="errorText">
                    <?=isset($errors['adress']) ? $errors['adress'] : "";?>
            </p>
      </div>
      <div>
            <label for="codepostal">Code Postal</label>
            <input placeholder="76000" id="code_postal" name="codepostal" type="text" class="validate">
            <p class="errorText">
                    <?=isset($errors['codepostal']) ? $errors['codepostal'] : "";?>
            </p>
      </div>
      <div>
            <label for="city">Ville</label>
            <input placeholder="Rouen" name="city" id="city" type="text" class="validate">
            <p class="errorText">
                    <?=isset($errors['city']) ? $errors['city'] : "";?>
            </p>
      </div>
      <div>
            <label for="password">Mot de Passe</label>
            <input placeholder="Mot de Passe" name="password" id="password" type="password" class="validate">
            <p class="errorText">
                    <?=isset($errors['password']) ? $errors['password'] : "";?>
            </p>
      </div>
      <div>
            <label for="passwordconfirm">Confirmation du mot de passe</label>
            <input placeholder="Confirmer Mot de Passe" name="passwordconfirm" id="passwordconfirm" type="password" class="validate">
            <p class="errorText">
                    <?=isset($errors['passwordconfirm']) ? $errors['passwordconfirm'] : "";?>
            </p>
      </div>

      <div class="g-recaptcha" data-sitekey="6LdHfXIpAAAAAEdk69HJGqZX85CbfCAaFwH2vRQz"></div>
      
      <div class="center-align">
            <button class="btn waves-effect waves-light" type="submit" name="signup">S'inscrire</button>
      </div>

</form>
<p>Déjà un compte ? <a href="../controllers/controller-signin.php">Connectez-vous ici!</a></p>

<?php
include '../views/templates/footer.php'
?>