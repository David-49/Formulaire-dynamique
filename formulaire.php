<?php include('PDO/connection_bdd.php') ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="normalize.css">
        <script src="https://kit.fontawesome.com/b51ebbfc71.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Entrainement Ajax</title>
    </head>
    <body>
    <!-- <form class="formConnexion was-validated" method="post">
        <fieldset>
            <legend class="legendConnexion"><?php echo strtoupper('connexion') ?></legend>

            <div class="blocInfo form-group">
                <label for="mail">Adresse mail</label>
                <input type="email" name="mailConnect" id="mail" required class="form-control is-invalid inpt">
            </div>

            <div class="blocInfo form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdpConnect" id="mdp" required class="form-control inpt">
            </div>



            <button type="submit" name="buttonCo" class="boutonConnexion btn btn-primary" id="boutonConnexion"><?php echo strtoupper('Se connecter') ?></button>

        </fieldset>
    </form> -->





    <form class="formInscription" onsubmit="return false;" id="register_form">
        <fieldset>

            <legend class="legendConnexion"><?php echo strtoupper('inscription') ?></legend>

            <div class="blocInfo form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom"  class="form-control inpt">
            </div>

            <div class="blocInfo form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom"  class="form-control inpt">
            </div>

            <div class="blocInfo form-group">
                <label for="dateNaissance">Date de naissance</label>
                <input type="date" id="dateNaissance" name="dateNaissance"   class="form-control inpt">
                <small id="output-naissance"></small>
            </div>


            <div class="blocInfo form-group">
                <label for="mailInscription">Adresse mail</label>
                <input type="email" id="mailInscription" name="mailInscription"  class="form-control inpt">
                <small id="output-mail"></small>
            </div>

            <div class="blocInfo form-group">
                <label for="mdpInscription">Mot de passe</label>
                <input type="password" id="mdpInscription" name="mdpInscription"  class="form-control inpt">
                <small id="output-Pass"></small>
            </div>

            <div class="blocInfo form-group" id="blocMdpVerif">
                <label for="mdpVerif">Confirmation du mot de passe</label>
                <input type="password" id="mdpVerif" name="mdpVerif"  class="form-control inpt">
                <small id="output-PassVerif"></small>
            </div>

            <div id="status">
                <p style="font-size: 18px;">Remplir tous les champs !</p>
            </div>

            <input type="submit" id="buttonIns" value="S'inscrire" class="boutonConnexion btn btn-success">
        </fieldset>

    </form>



<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="app.js"></script>
    </body>
</html>
