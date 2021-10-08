<?php
require_once "requires.php";

// If a session is active, user redirection to home page
if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    header("location:../index.php");
}
// Else, her login information as submit to this page for login verification
else
{
    if(isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] === "0") {
        $username = strip_tags(trim($_POST['username']));
        $password = strip_tags(trim($_POST['password']));

        /**
         * Check if information of login is correct and creat a session for the user
         * @param string $username
         * @param string $password
         */
        function checkPassword(string $username, string $password) {
            $user = new UserManager();

            // If good username, check password of this username
            if($user->searchUser($username)) {
                if(password_verify($password, $user->searchUser($username)->getPassword())) {

                    $_SESSION['id'] = $user->searchUser($username)->getId();
                    $_SESSION['username'] = $user->searchUser($username)->getUsername();
                    $_SESSION['key'] = date('dmY') . $user->searchUser($username)->getId();

                    /*
                    setcookie('id', $user->searchUser($username)->getId(), 0, '/', true);
                    setcookie('username', $user->searchUser($username)->getUsername(), 0, '/', true);
                    setcookie('key', date('dmY') . $user->searchUser($username)->getId() , 0, '/', true);
                    */

                    if(isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {
                        header('location: ../View/index.php?statut=online');
                    }
                    else
                    {
                        header('location: ../View/index.php?statut=AucuneSessionCree');
                    }
                }
                else {
                    header('location: ../View/index.php?error=errorIsComing');
                }
            }
            else {
                header('location: ../View/index.php?error=missingUser');
            }
        }
        checkPassword($username, $password);
    }
}