<?php
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
                    <th>Id</th>
                    <th>Name</th>
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
                    <td><a href="#"><button class="red">Delete</button></a></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <form>
                <input type="text" maxlength="45" required>
                <button type="submit" class="green">Créer</button>
            </form>
        </section>

        <section class="section_1">
            <div class="category">
                <h2>Users</h2>
            </div>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Statut</th>
                    <th>Registration</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                <?php
                $allUsers = $userManager->getAllUser();
                foreach ($allUsers as $oneUser) {
                ?>
                <tr>
                    <td><?=$oneUser->getId() ?></td>
                    <td><?=$oneUser->getUsername() ?></td>
                    <td>
                        <?php
                        if ($oneUser->getStatut() === 0)
                        {
                            echo 'Non activer';
                        }
                        if ($oneUser->getStatut() === 1)
                        {
                            echo 'Activer';
                        }
                        ?>
                    </td>
                    <td><?=$roleManager->searchRole($oneUser->getRoleFk())->getName() ?></td>
                    <td><?=$oneUser->getRegistration() ?></td>
                    <td><a href="#"><button class="red">Delete</button></a></td>
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
?>