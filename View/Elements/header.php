<?php

use Bosqu\EvaluationForum\Model\Manager\RoleManager;
use Bosqu\EvaluationForum\Model\Manager\TokenManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    $session = true;

    $userManager = new UserManager();
    $user = $userManager->searchUser($_SESSION['username']);
    $roleManager = new RoleManager();
    $role = $roleManager->searchRole($user->getRoleFk());

    $userRole = $role->getId();
    $userStatut = $user->getStatut();
}

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
        if (isset($_GET['error']))
        {
            $error = $_GET['error'];

            switch ($error)
            {
                case 'errorIsComing':
                    echo '<div id="header_message" class="red">Une erreur est survenus!</div>';
                    break;
                case 'easyPassword':
                    echo '<div id="header_message" class="red"> Mots de passe trop simple.<br>
                         Le mots de passe doit contenir une majuscule, une minuscule, <br>
                         un caractère spécial, un chiffre et avoir une longueur minimum de 8.
                         </div>';
                    break;
                case 'passwordEmail':
                    echo '<div id="header_message" class="red">Mots de passe différents et/ou Email différents.</div>';
                    break;
                case 'utilisateurExistant':
                    echo '<div id="header_message" class="orange">Username existant</div>';
                    break;
                case 'missingUser':
                    echo '<div id="header_message" class="orange">Username inexistant ou incorrect!</div>';
                    break;
                case 'dataMissing':
                    echo '<div id="header_message" class="orange">Donnée(s) Manquante(s)!</div>';
                    break;
            }
        }

        if (isset($_GET['statut'], $_GET['token']))
        {
            $token = $_GET['token'];
            $tokenManager = new TokenManager();
            $tokenUser = $tokenManager->searchToken($token);
            ?>
        <div id="header_message" class="green">
            Compte créer!<br>En attente de validation.<br>Un email vous à été envoyer pour confirmation.<br>
            Token de validation:
            <a href="../../Controller/TokenValidationController.php?token=<?=$tokenUser->getToken()?>">Valider mon compte!</a>
        </div>
        <?php
        }
        else if (isset($_GET['statut']))
        {
            $statut = $_GET['statut'];

            switch ($statut)
            {
                case 'online':
                    echo '<div id="header_message" class="green">Vous êtes en ligne!</div>';
                    break;
                case 'offline':
                    echo '<div id="header_message" class="red">Vous êtes hors ligne!</div>';
                    break;
            }
        }

        if (isset($_GET['action']))
        {
            $action = $_GET['action'];

            switch ($action)
            {
                // Category
                case 'categoryCreate':
                    echo '<div id="header_message" class="green">La catégorie à étais créer!</div>';
                    break;
                case 'categoryDelete':
                    echo '<div id="header_message" class="red">La catégorie à étais supprimer!</div>';
                    break;
                case 'commentaryCreate':
                    echo '<div id="header_message" class="green">Commentaire publié!</div>';
                    break;
                case 'commentaryDelete':
                    echo '<div id="header_message" class="red">Commentaire supprimer!</div>';
                    break;
                // Commentary
                case 'goodCommentary':
                    echo '<div id="header_message" class="green">Commentaire vérifié!</div>';
                    break;
                case 'commentarySignal':
                    echo '<div id="header_message" class="orange">Commentaire signalé!</div>';
                    break;
                // Subject
                case 'subjectCreate':
                    echo '<div id="header_message" class="green">Sujet créer!</div>';
                    break;
            }
        }
        ?>
        <div id="header_logIn_Logout">
            <?php
            if (isset($session))
            {
              ?>
                <div id="header_Logout">
                    <p>Hello <?= $role->getName() . ' ' . $user->getUsername() ?>!</p>
                    <?php
                    if ($userRole === 1 || $userRole === 2)
                    {
                    ?>
                    <a href="../View/Administration.php"><button type="button" class="green">Administration</button></a>
                    <?php
                    }
                    ?>
                    <a href="../Controller/UserLogoutController.php"><button type="button" class="red">Log-out</button></a>
                </div>
                <?php
            }
            else
            {
                ?>
                <form id="header_Login" name="Log-in" method="post" action="../Controller/UserLoginController.php?error=0">
                    <label>
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <button type="submit" class="green">Log-In</button>
                    </label>
                    <a href="../View/login_register.php"><button type="button" class="orange">Register</button></a>
                </form>
                <?php
            }
            ?>

        </div>
    </header>

    <div id="container">