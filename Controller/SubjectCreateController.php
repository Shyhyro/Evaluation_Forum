<?php
namespace Bosqu\EvaluationForum\Controller;
use Bosqu\EvaluationForum\Model\Manager\SubjectManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{

    if(isset($_GET['error'], $_POST['category'], $_POST['name'], $_POST['description'], $_POST['content'])
        && $_GET['error'] === "0")
    {
        $name = strip_tags(trim($_POST['name']));
        $category = strip_tags(trim($_POST['category']));
        $description = strip_tags(trim($_POST['description']));
        $content = strip_tags(trim($_POST['content']));

        $user = new UserManager();
        $user = $user->searchUser($_SESSION['username'])->getId();

        $sujet = new SubjectManager();
        $addSujet = $sujet->addSubject($user, $category, $name, $description, $content);

        if ($addSujet)
        {
            header("location: ../View/index.php?action=subjectCreate");
        }
        else
        {
            header("location: ../View/new_post.php?error=errorIsComing");
        }
    }
    else {
        header("location: ../View/new_post.php?error=missingData");
    }
}
else
{
    header("location:../View/index.php");
}