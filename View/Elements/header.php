<?php
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
                <div id="header_message" class="red">
                    Mots de passe différents où Email différents.
                </div>
        <?php
            }
        }
        ?>
        <div id="header_logIn_Logout">
            <?php
            if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
            {
            ?>
                <div id="header_Logout">
                    <p>Hello Username!</p>
                    <button type="button"><a>Administration</a></button>
                    <button type="button" class="red"><a>Log-out</a></button>
                </div>
            <?php
            }
            else {
            ?>
                <form id="header_Login" name="Log-in">
                    <label>
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <button type="submit" class="green">Log-In</button>
                        <a href="../View/login_register.php"><button type="button">Register</button></a>
                    </label>
                </form>
            <?php
            }
            ?>

        </div>
    </header>

    <div id="container">