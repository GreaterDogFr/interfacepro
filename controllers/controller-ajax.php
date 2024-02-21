<?php 
require_once'../config.php';
require_once'../models/Entreprise.php';

session_start();

if(!isset($_SESSION['enterprise']))
{
    header("Location: ./controller-signin.php");
}


    if(isset($_GET['validateid']) && $_SESSION['enterprise'])
    {
        $userinfo = Entreprise::getEmployee($_GET['validateid']);
        if($_SESSION['enterprise']['ENT_ID'] == $userinfo['ENT_ID']) {
            Entreprise::validate($_GET['validateid']);
        }
        
    }

    if(isset($_GET['unvalidateid']) && $_SESSION['enterprise'])
    {
        $userinfo = Entreprise::getEmployee($_GET['unvalidateid']);
        if($_SESSION['enterprise']['ENT_ID'] == $userinfo['ENT_ID']) {
            Entreprise::unvalidate($_GET['unvalidateid']);
        }
    } 

?>