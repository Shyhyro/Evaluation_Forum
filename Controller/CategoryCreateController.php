<?php
require_once "requires.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    if(isset($_GET['error'], $_POST['name']) && $_GET['error'] === "0")
    {
        $name = strip_tags(trim($_POST['name']));

        $user = new UserManager();
        $user = $user->searchUser($_SESSION['username'])->getId();

        $category = new CategoryManager();
        $addCategory = $category->createCategory($name);

        if ($addCategory)
        {
            header("location: ../View/Administration.php?statut=categoryCreate");
        }
        else
        {
            header("location: ../View/Administration.php?error=errorIsComing");
        }
    }
    else {
        header("location: ../View/Administration.php?error=missingData");
    }
}
else
{
    header("location:../View/index.php");
}