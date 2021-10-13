<?php

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;
use Bosqu\EvaluationForum\Model\Manager\SubjectManager;

include '../View/Elements/header.php';

if (isset($session, $_GET['subject']) )
{
    $categoriesManager = new CategoryManager();
    $allCategories = $categoriesManager->allCategory();

    $subjectManager = new SubjectManager();
    $Subjects = $subjectManager->searchSubject($_GET['subject']);

    if ($userRole === 1 || $user->getId() === $Subjects->getUserFk())
    {
?>

    <section class="section_1">
        <div class="category">
            <h2>Create a new Post</h2>
        </div>
        <form id="new_post" name="NewPost" method="post" action="../Controller/SubjectCreateController.php?error=0">
            <p><?=$categoriesManager->searchCategory($Subjects->getCategoryFk())->getName() ?></p>

            <label for="newPost_name">Titre:</label>
            <input id="newPost_name" type="text" name="name" required maxlength="45" value="<?=$Subjects->getName() ?>">

            <label for="newPost_description">Description:</label>
            <textarea id="newPost_description" name="description" required maxlength="300"><?=$Subjects->getDescription() ?></textarea>

            <label for="newPost_content">Contenus:</label>
            <textarea id="newPost_content" name="content" required><?=$Subjects->getContent() ?></textarea>

            <button type="submit" class="green">Modifier sujet!</button>
        </form>
    </section>

<?php
    }
    else
    {
        header("location:../View/index.php");
    }
    include '../View/Elements/footer.php';
}
else {
    header("location:../View/index.php");
}
?>