<?php
include '../View/Elements/header.php';

//if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
//{

    ?>

    <section class="section_1">
        <div class="category">
            <h2>Create a new Post</h2>
        </div>
        <form id="new_post" name="NewPost">
            <select name="category">
                <option>Category 1</option>
                <option>Category 2</option>
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


<?php /*
}
else {
    header("location:index.php");
}
 */
 ?>