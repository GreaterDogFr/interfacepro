<?php
class Entreprise
{
    /**
     * Méthode permettant de créer une entreprise
     * @param string $entmail Mail de l'entreprise
     * @param string $entsiret Numéro Siret de l'entreprise
     * @param string $entname Nom de l'entreprise
     * @param string $entpass Mot de passe de l'entreprise
     * @param string $entadr Adresse de l'entreprise
     * @param string $entzip code postal de l'entreprise
     * @param string $ent_town ville de l'entreprise
     *
     * @return void
     */
    public static function create($entmail, $entsiret, $entname, $entpass, $entadr, $entzip, $ent_town)
    {
        $database = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPASSWORD);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO `enterprise__ent` (`ENT_MAIL`, `ENT_SIRET`, `ENT_NAME`, `ENT_PASS`, `ENT_ADR`, `ENT_ZIP`,`ENT_TOWN`)
        VALUES(:ENT_MAIL, :ENT_SIRET, :ENT_NAME, :ENT_PASS, :ENT_ADR, :ENT_ZIP, :ENT_TOWN)';

        $query = $database->prepare($sql);

        $query->bindValue(':ENT_MAIL', $_POST['mailadress'], PDO::PARAM_STR);
        $query->bindValue(':ENT_SIRET', $_POST['siretnumber'], PDO::PARAM_STR);
        $query->bindValue(':ENT_NAME', htmlspecialchars($_POST['name']), PDO::PARAM_STR);
        $query->bindValue(':ENT_PASS', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $query->bindValue(':ENT_ADR', htmlspecialchars($_POST['adress']), PDO::PARAM_STR);
        $query->bindValue(':ENT_ZIP', ($_POST['codepostal']), PDO::PARAM_STR);
        $query->bindValue(':ENT_TOWN', htmlspecialchars($_POST['city']), PDO::PARAM_STR);

        try {
            $query->execute();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }
    /**
     * Methode permettant de récupérer les informations d'une entreprise avec son mail comme paramètre
     *
     * @param string $mailadress Adresse mail de l'entrerprise
     *
     * @return bool
     */

    public static function checkMailExists(string $mailadress): bool
    {
        // le try and catch permet de gérer les erreurs, nous allons l'utiliser pour gérer les erreurs liées à la base de données
        try {
            // Création d'un objet $database selon la classe PDO
            $database = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `enterprise__ent` WHERE `ENT_MAIL` = :ENT_MAIL";

            // je prepare ma requête pour éviter les injections SQL
            $query = $database->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':ENT_MAIL', $mailadress, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le mail n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Methode permettant de récupérer les infos d'une entreprise avec son mail comme paramètre
     *
     * @param string $mailadress Adresse mail de l'entreprise
     *
     * @return array Tableau associatif contenant les infos de l'entreprise
     */

    public static function getInfos(string $mailadress): array
    {
        try {
            // Création d'un objet $database selon la classe PDO
            $database = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `enterprise__ent` WHERE `ENT_MAIL` = :ENT_MAIL";

            // je prepare ma requête pour éviter les injections SQL
            $query = $database->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':ENT_MAIL', $mailadress, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
