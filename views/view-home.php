<?php
// Header
include '../views/templates/header.php';
?>

<h2>
    <form method="POST" action="../controllers/controller-home.php">
        <button type="submit" name="disconnect" value="disconnect">Déconnexion</button>
    </form>
</h2>

<?php
// Footer
include '../views/templates/footer.php'
?>