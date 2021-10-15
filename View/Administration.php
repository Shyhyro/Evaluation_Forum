<?php

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;
use Bosqu\EvaluationForum\Model\Manager\CommentaryManager;
use Bosqu\EvaluationForum\Model\Manager\RoleManager;
use Bosqu\EvaluationForum\Model\Manager\SubjectManager;
use Bosqu\EvaluationForum\Model\Manager\UserManager;

include '../View/Elements/header.php';

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    $session = true;

    $userManager = new UserManager();
    $user = $userManager->searchUser($_SESSION['username']);
    $roleManager = new RoleManager();
    $role = $roleManager->searchRole($user->getRoleFk());

    $userRole = $role->getId();
}

if (isset($session))
{
    $categoryManager = new CategoryManager();

    if ($userRole === 1)
    {
    ?>
        <section class="section_1">
            <div class="category">
                <h2>Category</h2>
            </div>
            <table>
                <tr>
                    <th>Identifiant</th>
                    <th>Titre</th>
                    <th>Actions</th>
                </tr>
                    <?php
                    $allCategory = $categoryManager->allCategory();
                    foreach ($allCategory as $oneCategory)
                    {
                    ?>
                <tr>
                    <td><?= $oneCategory->getId() ?></td>
                    <td><?= $oneCategory->getName() ?></td>
                    <td><a href="../Controller/CategoryDeleteController.php?error=0&category=<?=$oneCategory->getId()?>"><button class="red">Delete</button></a></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <form name="createCategory" action="../Controller/CategoryCreateController.php?error=0" method="post">
                <input name="name" type="text" maxlength="45" required>
                <button type="submit" class="green">Créer</button>
            </form>
        </section>

        <section class="section_1">
            <div class="category">
                <h2>Users</h2>
            </div>
            <table>
                <tr>
                    <th>Identifiant</th>
                    <th>Username</th>
                    <th>Statut</th>
                    <th>Enregistrement</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php
                $allUsers = $userManager->getAllUser();
                foreach ($allUsers as $oneUser) {
                ?>
                <tr>
                    <td><?=$oneUser->getId() ?></td>
                    <td><?=$oneUser->getUsername() ?></td>
                    <?php
                    if ($oneUser->getStatut() === 0)
                    {
                        echo '<td class="noActivate">Non activer</td>';
                    }
                    if ($oneUser->getStatut() === 1)
                    {
                        echo '<td class="activate">Activer</td>';
                    }
                    ?>
                    <td><?=$oneUser->getRegistration() ?></td>
                    <td><?=$roleManager->searchRole($oneUser->getRoleFk())->getName() ?></td>
                    <td><?=$oneUser->getEmail()?></td>
                    <td><a href="../Controller/UserDeleteController.php?error=0&user=<?=$oneUser->getId()?>"><button class="red">Delete</button></a></td>
                </tr>
                    <?php
                }
                    ?>
            </table>
        </section>


    <?php
    }
    if ($userRole === 2 || $userRole === 1)
    {
    ?>
    <section class="section_1">
        <div class="category">
            <h2>Commentaires signalés:</h2>
        </div>
        <table>
            <tr>
                <th>Utilisateur</th>
                <th>Sujet</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
            <?php
            $userSearch = new UserManager();
            $subjectSearch = new SubjectManager();
            $commentaryManager = new CommentaryManager();

            $allCommentary = $commentaryManager->getSignalCommentary();

            foreach ($allCommentary as $com) {
                ?>
                <tr>
                    <td><?=$userSearch->searchUserById($com->getUserFk())->getUsername()?></td>
                    <td><a href="../View/one_post.php?sujet=<?=$com->getSubjectFk() ?>"><?=$subjectSearch->searchSubject($com->getSubjectFk())->getName() ?></a></td>
                    <td><?=$com->getContent()?></td>
                    <td>
                        <a href="../Controller/CommentaryDeleteController.php?commentary=<?=$com->getId()?>"><button class="red">Delete</button></a>
                        <a href="../Controller/CommentaryGoodController.php?commentary=<?=$com->getId()?>"><button class="green">Rien a signaler</button></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </section>


        <section class="section_1">
            <div class="category">
                <h2>Sujets signalés:</h2>
            </div>
            <table>
                <tr>
                    <th>Utilisateur</th>
                    <th>Sujet</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
                <?php
                $userSearch = new UserManager();
                $allBadSubject = $subjectSearch->getAllBadSubject();

                foreach ($allBadSubject as $subject)
                {
                    ?>
                    <tr>
                        <td><?=$userSearch->searchUserById($subject->getUserFk())->getUsername()?></td>
                        <td>
                            <a href="../View/one_post.php?sujet=<?=$subject->getId() ?>"><?=$subject->getName() ?>
                            </a>
                        </td>
                        <td><?=$subject->getContent()?></td>
                        <td>
                            <a href="../Controller/SubjectDeleteController.php?subject=<?=$subject->getId()?>"><button class="red">Delete</button></a>
                            <a href="../Controller/SubjectGoodController.php?subject=<?=$subject->getId()?>"><button class="green">Rien a signaler</button></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </section>
<?php
    }
}
else {
    header("location:index.php");
}

include '../View/Elements/footer.php';
?>