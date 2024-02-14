<?php
require_once('../config.php');
require_once '../models/Entreprise.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $errors = [];

    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'Entrez votre Mot de passe';
        } else if (strlen($_POST['password']) < 8) {
            $errors['password'] = 'Plus de 8 charactères';
        }
    }

    if (isset($_POST['usermail'])) {
        if (empty($_POST['usermail'])) {
            $errors['usermail'] = 'Entre une adresse mail';
        }
    }   
    
    if(empty($errors)){
        //on check si l'utilisateur est bien enregistré
        if(!Entreprise::checkMailExists($_POST['mailadress'])){
            $errors['mailadress'] = 'Utilisateur Inconnu';
        } else {
            //Récupération des infos et passage dans la session
            $entinfos = Entreprise::getInfos($_POST['mailadress']);
            if (password_verify($_POST['password'], $entinfos['ENT_PASS'])){
                $_SESSION['enterprise'] = $entinfos;
                header("Location: ./controller-home.php");
            } else {
                $errors['password'] = "Mot de passe erroné";
            }
        }
    }
}

include '../views/view-signin.php';