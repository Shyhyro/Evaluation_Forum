<?php
require_once "requires.php";

// If a session is active : Get and destroy all session cookies params for logout
if(isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    session_destroy();
    header("location: ../View/index.php?statut=offline");
}
else
{
    header("location:../View/index.php?error=NoSession");
}