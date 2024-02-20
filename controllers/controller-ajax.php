<?php 
require_once'../config.php';
require_once'../models/Entreprise.php';

    if(isset($_GET['validateid']))
    {
        Entreprise::validate($_GET['validateid']);
        
    }
    if(isset($_GET['unvalidateid']))
    {
        Entreprise::unvalidate($_GET['unvalidateid']);
        
    } 

?>