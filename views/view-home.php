<?php
// Header
include '../views/templates/header.php';
?>

<!-- navigation -->
<nav>
    <div class="nav-wrapper">
    <a href="../controllers/controller-home.php" class="offset-s2 brand-logo">Metro Pro Edition</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="../controllers/controller-admin.php">Adminstrator</a></li>
        <li><a href="#">Options</a></li>
        <li><a href="../controllers/controller-admin.php">Administration <?=$_SESSION['enterprise']['ENT_NAME']?></a></li>
        <li>
            <form method="POST" action="../controllers/controller-home.php">
            <button type="submit" name="logout" value="logout">Déconnexion</button>
            </form>
        </li>
    </ul>
    </div>
</nav>

<?php
// Footer
include '../views/templates/footer.php'
?>