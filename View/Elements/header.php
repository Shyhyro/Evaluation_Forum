<?php
require_once "../Controller/requires.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="../View/Styles/common.css">
    <link rel="stylesheet" href="../View/Styles/colors.css">
</head>

<body>
<div id="bodyDiv">

    <header>
        <div id="header_Tittle">
            <h1><a href="../View/index.php">Forum</a></h1>
        </div>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] === 'errorIsComing') {
                ?>
                <div id="header_message" class="red">Une erreur est survenus!</div>
                <?php
            }
            if ($_GET['error'] === 'easyPassword') {
                ?>
                <div id="header_message" class="red">
                    Mots de passe trop simple.<br>
                    Le mots de passe doit contenir une majuscule, une minuscule, <br>
                    un caractère spécial, un chiffre et avoir une longueur minimum de 8.
                </div>
                <?php
            }
            if ($_GET['error'] === 'passwordEmail') {
                ?>
                <div id="header_message" class="red">Mots de passe différents et/ou Email différents.</div>
                <?php
            }
            if ($_GET['error'] === 'utilisateurExistant') {
                ?>
                <div id="header_message" class="orange">Username existant</div>
                <?php
            }
            if ($_GET['error'] === 'missingUser') {
                ?>
                <div id="header_message" class="orange">Username inexistant ou incorrect!</div>
                <?php
            }
            if ($_GET['error'] === 'dataMissing') {
                ?>
                <div id="header_message" class="orange">Donnée(s) Manquante(s)!</div>
                <?php
            }
        }
        ?>
        <?php
        if (isset($_GET['statut'])) {
            if ($_GET['statut'] === 'create') {
                ?>
                <div id="header_message" class="green">
                    Compte créer!<br>En attente de validation.<br>Un email vous à été envoyer pour confirmation.<br>
                    Token de validation:
                </div>
                <?php
            }
            if ($_GET['statut'] === 'online') {
                ?>
                <div id="header_message" class="green">Vous êtes en ligne!</div>
                <?php
            }
            if ($_GET['statut'] === 'offline') {
                ?>
                <div id="header_message" class="red">Vous êtes hors ligne!</div>
                <?php
            }
        }
        ?>
        <div id="header_logIn_Logout">
            <?php
            if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {
              ?>
                <div id="header_Logout">
                    <p>Hello Username!</p>
                    <button type="button"><a href="#">Administration</a></button>
                    <button type="button" class="red"><a href="../Controller/UserLogoutController.php">Log-out</a></button>
                </div>
                <?php
           } else {
                ?>
                <form id="header_Login" name="Log-in" method="post" action="../Controller/UserLoginController.php?error=0">
                    <label>
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <button type="submit" class="green">Log-In</button>
                    </label>
                    <a href="../View/login_register.php"><button type="button">Register</button></a>
                </form>
                <?php
            }
            ?>

        </div>
    </header>

    <div id="container">