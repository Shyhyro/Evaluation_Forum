<?php

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;
use Bosqu\EvaluationForum\Model\Manager\SubjectManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

include '../View/Elements/header.php';

if (isset($_GET['category'])) {
    $categoryManager = new CategoryManager();
?>

    <section class="section_1">
        <div class="category">
            <h2><?=$categoryManager->searchCategory($_GET['category'])->getName() ?></h2>
            <div>
                <?php
                if (isset($session))
                {
                    // JUST Admin → modification, archiver, delete → Category
                    if ($userRole === 1)
                    {
                    //<a href="#"><button type="button" class="orange">Modifier</button></a>
                    ?>
                    <a href="#"><button type="button" class="red">Supprimer</button></a>
                    <?php
                    }
                ?>
            </div>
                <?php
                // Admin, Modo & User → Create a new post in this category
                    if ($userRole === 1 || $userRole === 2 || $userRole === 3)
                    {
                    ?>
                    <a href="../View/new_post.php"><button type="button" class="newPost green">New Post</button></a>
                    <?php
                    }
                }
                ?>
        </div>
        <div class="subjects">
                <?php
                $oneCategory = $_GET['category'];
                $subjectManager = new SubjectManager();
                $userManager = new UserManager();

                $allSubjects = $subjectManager->getAllSubjectOfCategory($oneCategory);

                foreach ($allSubjects as $oneSubject)
                {
                    ?>
                    <div class="subject">
                        <h3><a href="../View/one_post.php?sujet=<?=$oneSubject->getId() ?>"><?= $oneSubject->getName() ?></a></h3>
                        <div>
                            <?php
                            if (isset($session))
                            {
                                // Admin, Modo & User creator -> Modification -> Subject
                                if ($userRole === 1 || $userRole === 2 || $user->getId() === $oneSubject->getUserFk() )
                                {
                                ?>
                                <a href="../View/change_post.php?subject=<?=$oneSubject->getId()?>"><button type="button" class="orange">Modifier</button></a>
                                <?php
                                }
                                // Admin & Modo -> Archiver -> Subject
                                if ($userRole === 1 || $userRole === 2)
                                {
                                    if ($oneSubject->getStatut() === 1)
                                    {
                                ?>
                                <a href="../Controller/SubjectStatutController.php?error=0&subject=<?=$oneSubject->getId()?>"><button type="button" class="orange">Archiver</button></a>
                                <?php
                                    }
                                }
                                // Admin & User creator -> Delete -> Subject
                                if ($userRole === 1 || $user->getId() === $oneSubject->getUserFk())
                                {
                                    ?>
                                    <a href="../Controller/SubjectDeleteController.php?error=0&category=<?=$oneSubject->getCategoryFk()?>&subject=<?=$oneSubject->getId()?>"><button type="button" class="red">Supprimer</button></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <p><?=$oneSubject->getDescription() ?></p>
                        <span>By <?=$userManager->searchUserById($oneSubject->getUserFk())->getUsername() ?></span>
                    </div>
                    <?php
                }
                ?>
        </div>
    </section>

<?php
    include '../View/Elements/footer.php';
}
else
{
    header("location:index.php");
}