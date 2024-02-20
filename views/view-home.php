<?php
// Header
include '../views/templates/header.php';
?>


<div class="employeesstatus">
    <?php foreach($employees as $employee) { ?>
        <div class="employee">
            <p><?= $employee['USR_FNAME'] . " " . $employee['USR_LNAME'] ?></p>
            <div class="switch">
                <label>
                    Off
                    <input type="checkbox" data-user-id="<?=$employee['USR_ID'] ?>" <?= $employee['USR_VALID']== 1 ? "checked" : "" ?> >
                    <span class="lever"></span>
                    On
                </label>
                
                <a href="controller-ajax.php?validateid=<?=$employee['USR_ID']?>" >
                </a>
                    
                <a href="controller-ajax.php?unvalidateid=<?=$employee['USR_ID']?>">
                </a>
                
            </div>
        </div>
    <?php } ?>
</div>

<form method="POST" action="../controllers/controller-home.php">
    <button type="submit" name="logout" value="logout">Déconnexion</button>
</form>

<?php
// Footer
include '../views/templates/footer.php'
?>