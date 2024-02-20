<?php
require_once '../config.php';
require_once '../models/Entreprise.php';

//session
session_start();
var_dump($_POST);
if(!isset($_SESSION['enterprise']))
{
    header("Location: ./controller-signin.php");
}

//On récupère les infos entreprise en cas de modification précédente
$entinfos = Entreprise::getInfos($_SESSION['enterprise']['ENT_MAIL']);
$_SESSION['enterprise'] = $entinfos;

if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: ./controller-signin.php");
}


$employees = Entreprise::getAllEmployees($_SESSION['enterprise']['ENT_ID']);

include '../views/view-home.php';