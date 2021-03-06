<?php
namespace Bosqu\EvaluationForum\Controller;
use Bosqu\EvaluationForum\Model\Manager\TokenManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    header("location:index.php");
}
else
{
    if(isset($_GET['error'], $_POST['username'], $_POST['password'], $_POST['passwordCheck'], $_POST['email'], $_POST['emailCheck'])
        && $_GET['error'] === "0")
    {
        $username = strip_tags(trim($_POST['username']));
        $password = strip_tags(trim($_POST['password']));
        $passwordCheck = strip_tags(trim($_POST['passwordCheck']));
        $email = strip_tags(trim($_POST['email']));
        $emailCheck = strip_tags(trim($_POST['emailCheck']));

        $user = new UserManager();
        $user = $user->searchUser($username);

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        // If: password no have uppercase, lowercase, number, special chars and 8, no register this
        // Else : registration
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) <= 8)
        {
            header("location: ../View/login_register.php?error=easyPassword");
        }
        else
        {
            if ( ($password === $passwordCheck) && ($email === $emailCheck) ) {
                if($user == null)
                {
                    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $addUser = new UserManager();
                    $addUser = $addUser->addUser($username, $new_password, $email);

                    if ($addUser)
                    {
                        $searchUser = new UserManager();
                        $userId = $searchUser->searchUser($username)->getId();
                        $token = new TokenManager();

                        $tokenController = new TokenController();
                        $tokenGenerate = $tokenController->generate();

                        $token = $token->addUser($userId, $tokenGenerate);

                        //$sendMail = $tokenController->sendToken($searchUser->searchUser($username)->getEmail(), $tokenGenerate);

                        header("location: ../View/index.php?statut=create&token=$userId");
                    }
                    else
                    {
                        header("location: ../View/login_register.php?error=errorIsComing");
                    }
                }
                else
                {
                    header("location: ../View/login_register.php?error=username");
                }
            }
            else {
                header("location: ../View/login_register.php?error=passwordEmail");
            }
        }
    }
    else
    {
        header("location: ../View/login_register.php?error=dataMissing");
    }
}