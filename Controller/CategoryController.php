<?php

namespace Bosqu\EvaluationForum\Controller;

use Bosqu\EvaluationForum\Model\Manager\CategoryManager;

class CategoryController
{

    /**
     * Add a category
     * @param $name
     * @return bool
     */
    public function addCategory($name) :bool
    {
        return (new CategoryManager())->createCategory(filter_var($name, FILTER_SANITIZE_STRING));
    }

    /**
     * Remove a Category
     * @param $id
     * @return bool
     */
    public function removeCategory($id) :bool
    {
        return (new CategoryManager())->deleteCategory(filter_var($id, FILTER_SANITIZE_NUMBER_INT));
    }

}