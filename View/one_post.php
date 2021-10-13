<?php

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;
use Bosqu\EvaluationForum\Model\Manager\CommentaryManager;
use Bosqu\EvaluationForum\Model\Manager\SubjectManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

include '../View/Elements/header.php';

if (isset($_GET['sujet'])) {
    $categoryManager = new CategoryManager();
    $subjectManager = new SubjectManager();
    $userManager = new UserManager();

    $sujet = $_GET['sujet'];
    $category = $subjectManager->searchSubject($sujet)->getCategoryFk();

    ?>

    <section class="section_1">
        <div class="category">
            <h2><?=$categoryManager->searchCategory($category)->getName() ?></h2>
        </div>
        <div class="subjects">
            <?php

            $Subjects = $subjectManager->getSubjectById($sujet);
?>
                    <h3><?= $Subjects->getName() ?></h3>
                    <div>
                        <?php
                        if (isset($session))
                        {
                            // Admin, Modo & User creator → modifier → subject
                            if ($userRole === 1 || $userRole === 2 || $user->getId() === $Subjects->getUserFk() )
                            {
                                if ($Subjects->getStatut() === 1)
                                {
                            ?>
                            <a href="../View/new_post.php?subject=<?=$Subjects->getId()?>"><button type="button" class="orange">Modifier</button></a>
                            <?php
                                }
                            }
                            // Admin & Modo → Archiver → subject
                            if ($userRole === 1 || $userRole === 2)
                            {
                                if ($Subjects->getStatut() === 1)
                                {
                            ?>
                            <a href="../Controller/SubjectStatutController.php?error=0&subject=<?=$Subjects->getId()?>"><button type="button" class="orange">Archiver</button></a>
                            <?php
                                }
                            }
                            // Admin & User creator → Delete → subject
                            if ($userRole === 1 || $user->getId() === $Subjects->getUserFk())
                            {
                                ?>
                                <a href="../Controller/SubjectDeleteController.php?error=0&category=<?=$Subjects->getCategoryFk()?>&subject=<?=$Subjects->getId()?>"><button type="button" class="red">Supprimer</button></a>
                                <?php
                            }
                        }
                        ?>
                    </div>
            <p><?=$Subjects->getDescription() ?></p>
            <p><?=$Subjects->getContent() ?></p>
            <span>By <?=$userManager->searchUserById($Subjects->getUserFk())->getUsername() ?></span>
        </div>
    </section>
    <section class="section_1">
        <div class="subjects">
            <?php
            $commentary = new CommentaryManager();
            $allComment = $commentary->getCommentary($sujet);

            foreach ($allComment as $com) {
            ?>
            <div class="subject">
                <div><?=$userManager->searchUserById($com->getUserFk())->getUsername()?></div>
                <div>

                    <?php
                    if (isset($session))
                    {
                        if ($userRole === 1 || $userRole === 2 || $user->getId() === $Subjects->getUserFk() )
                        {
                            if ($Subjects->getStatut() === 1)
                            {
                        ?>
                        <a href="#"><button type="button" class="orange">Modifier</button></a>
                        <?php
                            }
                        }

                        if ($userRole === 1 || $user->getId() === $Subjects->getUserFk() )
                        {
                            ?>
                            <a href="../Controller/CommentaryDeleteController.php?error=0&post=<?=$sujet?>&commentary=<?=$com->getId()?>"><button type="button" class="red">Supprimer</button></a>
                            <?php
                        }
                    }
                    ?>
                </div>
                <p><?=$com->getContent()?></p>
            </div>
                <?php
            }
                ?>
            <?php
            if ($session)
            {
                if ($Subjects->getStatut() === 1) {
                    ?>
                    <div class="subject">
                        <form name="new_commentary" method="post" action="../Controller/CommentaryCreateController.php?error=0&post=<?=$sujet?>">
                            <h3>Commentaires:</h3>
                            <textarea name="content" maxlength="300" required></textarea>
                            <button class="green" type="submit">Envoyer</button>
                        </form>
                    </div>
                        <?php
                }
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