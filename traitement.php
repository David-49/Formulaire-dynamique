<?php include('PDO/connection_bdd.php');

function valid_donnees($donnees)
{
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

function age($date)
{
    $age = date('Y') - date('Y', strtotime($date));
    if (date('md') < date('md', strtotime($date))) {
        return $age - 1;
    }
    return $age;
}

$dateNow = date('Y/m/d');
/* Configure le script en français */
setlocale(LC_TIME, 'fr_FR', 'fra');
//Définit le décalage horaire par défaut de toutes les fonctions date/heure
date_default_timezone_set("Europe/Paris");
//Definit l'encodage interne
mb_internal_encoding("UTF-8");

if (!empty($_POST['dateNaissance'])) {
    $dateNaissance = valid_donnees($_POST['dateNaissance']);

    //Convertir une date US en françcais
    // $dateNaissance strftime('%d-%m-%Y', strtotime($dateNaissance));

    // list($dd,$mm,$yyyy) = explode('-',$dateNaissance);
    // if (checkdate($mm,$dd,$yyyy)) {
    //     echo "<br/>Il y'a une erreur dans le format de la date.";
    //     exit();
    // }

    $age = age($dateNaissance);

    if ($age >= 18) {
        echo "success";
        exit();
    } else {
        echo "<br/>Vous devez être majeur pour vous inscrire.";
        exit();
    }
}


if (!empty($_POST['mail'])) {
    $mail = valid_donnees($_POST['mail']);
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $reqM = $connection -> prepare("SELECT id FROM users WHERE email = '$mail'");
        $reqM -> execute();
        if ($reqM -> rowCount() > 0) {
            echo "<br/>Email déjà utilisé";
            exit();
        } else {
            echo "success";
            exit();
        }
    } else {
        echo "<br/>Adresse email invalide.";
        exit();
    }
}

if (!empty($_POST['mdp']) && !empty($_POST['mdp2'])) {
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];
    if (strlen($mdp) < 6) {
        echo "<br/>Trop court (6 caractères minimum)";
        exit();
    } elseif ($mdp == $mdp2) {
        echo "success";
        exit();
    } else {
        echo "<br/>Les deux mots de passe sont différents.";
        exit();
    }
}

if (isset($_POST['boutonIns'])) {
    // extract($_POST);
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $dateNaissanceIns = $_POST['dateNaissanceIns'];
    $mailIns = $_POST['mailIns'];
    $pass1Ins = $_POST['pass1Ins'];
    $pass2Ins = $_POST['pass2Ins'];

    if (!empty($prenom) || !empty($nom) || !empty($dateNaissanceIns) || !empty($mailIns) || !empty($pass1Ins) || !empty($pass2Ins)) {
        if (filter_var($mailIns, FILTER_VALIDATE_EMAIL)) {
            $reqM = $connection -> prepare("SELECT id FROM users WHERE email = '$mailIns'");
            $reqM -> execute();
            $mail_check = $reqM -> rowCount();
            //Convertir une date US en françcais
            // $dateNaissanceIns strftime('%d-%m-%Y', strtotime($dateNaissanceIns));


            $age = age($dateNaissanceIns);

            if ($mail_check > 0) {
                echo "<br/>Email déjà utilisé";
            }
            // elseif (checkdate($mm,$dd,$yyyy)) {
            //     echo "<br/>Il y'a une erreur dans le format de la date.";
            // }
            elseif ($age < 18) {
                echo "<br/>Vous devez être majeur pour vous inscrire.";
            } elseif ($pass1Ins != $pass2Ins) {
                echo "<br/>Les deux mots de passe sont différents.";
            } else {
                $reqIns = $connection -> prepare("INSERT INTO users (prenom, nom, email, mdp,  date_Inscription, dateNaissance) VALUES (:prenom, :nom, :email, :mdp, :date_Inscription, :dateNaissance)");
                $ok = $reqIns -> execute([
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'email' => $mailIns,
                    'mdp' => $pass1Ins,
                    'date_Inscription' => $dateNow,
                    'dateNaissance' => $dateNaissanceIns,
                ]);

                if ($ok) {
                    echo "success";
                }
            }
        } else {
            echo "<br/>Adresse email invalide.";
        }
    } else {
        echo "<br/>Tous les champs doivent être remplis.";
    }
}
