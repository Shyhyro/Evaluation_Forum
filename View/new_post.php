<?php
include '../View/Elements/header.php';

if (isset($session))
{
    $categoriesManager = new CategoryManager();
    $allCategories = $categoriesManager->allCategory();

?>

    <section class="section_1">
        <div class="category">
            <h2>Create a new Post</h2>
        </div>
        <form id="new_post" name="NewPost" method="post" action="../Controller/SubjectCreateController.php?error=0">
            <select name="category">
                <?php
                foreach ($allCategories as $oneCategory)
                {
                    ?>
                    <option value="<?=$oneCategory->getId() ?>"><?=$oneCategory->getName() ?></option>
                    <?php
                }
                ?>
            </select>

            <label for="newPost_name">Tittle:</label>
            <input id="newPost_name" type="text" name="name" required maxlength="45">

            <label for="newPost_description">Description:</label>
            <textarea id="newPost_description" name="description" required maxlength="300"></textarea>

            <label for="newPost_content">Content:</label>
            <textarea id="newPost_content" name="content" required></textarea>

            <button type="submit" class="green">Create new post</button>
        </form>
    </section>

<?php
}
else {
    header("location:index.php");
}
?>