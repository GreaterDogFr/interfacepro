<?php
require_once '../config.php';
require_once '../models/Entreprise.php';
//TODO: Nom entreprise, mot de passe, SIRET, Adresse, code postal, ville

$paternSpecChar = '/[\'\/^£$%&*()}{@#~?><>,|=_+¬]/';
$nonumberpatern = "/[a-zA-ZÀ-ÿ\-]+$/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $errors = [];

    if (strlen($_POST['siretnumber']) !=14){
        $errors['siretnumber'] = 'Entre un numéro de siret (14 chiffres)';
    }
    
    if (isset($_POST['usermail'])) {
        if (!filter_var($_POST['usermail'], FILTER_VALIDATE_EMAIL)) {
            $errors['usermail'] = 'Adresse Mail non valide';
        } else if (empty($_POST['usermail'])) {
            $errors['usermail'] = 'Entre une adresse mail';
        }
    }

    if (isset($_POST['adress'])) {
        if (preg_match($paternSpecChar, $_POST['adress'])) {
            $errors['adress'] = 'Pas de charactère spéciaux';
        } if (empty($_POST['adress'])) {
            $errors['adress'] = 'Entrez une adresse';
        }
    }

    if (isset($_POST['name'])) {
        if (preg_match($paternSpecChar, $_POST['name'])) {
            $errors['name'] = 'Pas de charactère spéciaux';
        }else if (strlen($_POST['name'])>= 50 ) {
            $errors['name'] = 'Limité à 50 charactères';
        }else if (empty($_POST['password'])) {
            $errors['name'] = 'Entrez un nom d\'entreprise';
        }
    }

    if (isset($_POST['city'])) {
        if (preg_match($paternSpecChar, $_POST['city'])) {
            $errors['city'] = 'Pas de charactère spéciaux';
        }
        if (empty($_POST['city'])) {
            $errors['city'] = 'Entrez une ville';
        }
    }

    if (isset($_POST['codepostal'])) {
        if (preg_match($nonumberpatern, $_POST['codepostal'])) {
            $errors['codepostal'] = 'Seulement des chiffres';
        } else if (strlen($_POST['codepostal'])!= 5 ) {
            $errors['codepostal'] = 'Entrez un code postal de 5 chiffres';
        } if (empty($_POST['codepostal'])) {
            $errors['codepostal'] = 'Entrez un code postal';
        }
    }


    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'Entrez votre Mot de passe';
        } else if (strlen($_POST['password']) < 8) {
            $errors['password'] = 'Plus de 8 charactères';
        }
    }

    if (isset($_POST['password']) && (isset($_POST['passwordconfirm']))) {
        if (empty($_POST['passwordconfirm'])) {
            $errors['passwordconfirm'] = 'Confirmez votre mot de passe';
        } else if ($_POST['password'] != $_POST['passwordconfirm']) {
            $errors['passwordconfirm'] = 'Mot de pass non identique';
        }
    }

    // On valide le captcha
    if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
        $errors['g-recaptcha-response'] = 'reCAPTHCA verification failed, please try again.';
    } else {
        $secret = '6LdHfXIpAAAAAL0NeWGc-bEYSTZy9iTySryNzR4G';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);

        if($response->success) {
            // Your code here to handle a successful verification
            // echo 'Successful login.';
        } else {
            // What happens when the CAPTCHA was entered incorrectly
            $errors['g-recaptcha-response'] = 'reCAPTHCA verification failed, please try again.';
        }
    }

    var_dump($errors);
    var_dump($_POST);
    if(empty($errors)){
        $entmail = $_POST['mailadress'];
        $entsiret = $_POST['siretnumber'];
        $entname = $_POST['name'];
        $entpass = $_POST['password'];
        $entadr = $_POST['adress'];
        $entzip = $_POST['codepostal'];
        $enttown = $_POST['city'];


        Entreprise::create($entmail, $entsiret, $entname, $entpass, $entadr, $entzip, $enttown);
        // TODO: Penser a faire les vérifications d'unicité du Siret et du mail
        header("Refresh:3; url=./controller-signin.php");
    }
}


include '../views/view-signup.php';
