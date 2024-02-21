<?php
// Header
include '../views/templates/header.php';
?>

<nav>
    <div class="nav-wrapper">
    <a href="../controllers/controller-home.php" class="offset-s2 brand-logo">Metro Pro Edition</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="../controllers/controller-admin.php">Adminstrator</a></li>
        <li><a href="#">Options</a></li>
        <li><a href="#">User</a></li>
    </ul>
    </div>
</nav>

<div class="employeesstatus">
    <?php foreach ($employees as $employee) {?>
        <div class="employee">
            <p><?=$employee['USR_FNAME'] . " " . $employee['USR_LNAME']?></p>
            <div class="switch">
                <label>
                    Off
                    <input type="checkbox" data-user-id="<?=$employee['USR_ID']?>" <?=$employee['USR_VALID'] == 1 ? "checked" : ""?> >
                    <span class="lever"></span>
                    On
                </label>

                <a href="controller-ajax.php?validateid=<?=$employee['USR_ID']?>" >
                </a>

                <a href="controller-ajax.php?unvalidateid=<?=$employee['USR_ID']?>">
                </a>

            </div>
        </div>
    <?php }?>
</div>

<?php
// Footer
include '../views/templates/footer.php'
?>