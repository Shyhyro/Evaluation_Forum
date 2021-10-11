<?php


class CategoryManager
{
    /**
     * Search category
     * @param $categoryId
     * @return Category
     */
    public function searchCategory($categoryId):Category {
        $stmt = Database::getInstance()->prepare("SELECT * FROM category WHERE id = :categoryId LIMIT 1");
        $stmt->bindValue(':categoryId', $categoryId);
        $state = $stmt->execute();
        $category = null;

        if($state) {
            $categoryData = $stmt->fetch();
            $category = new Category($categoryData['id'], $categoryData['name']);
        }
        return $category;
    }

    /**
     * Get all category
     * @return array
     */
    public function allCategory():array {
        $stmt = Database::getInstance()->prepare("SELECT * FROM category ");
        $state = $stmt->execute();
        $categories = [];
        if($state) {
            foreach ($stmt->fetchAll() as $category) {
                $categories [] = new Category($category['id'], $category['name']);
            }
        }
        return $categories;
    }

    /**
     * Delete a category
     * @param $categoryId
     * @return bool
     */
    public function deleteCategory($categoryId) :bool
    {
        $stmt = Database::getInstance()->prepare("DELETE FROM category WHERE id = :categoryId ");
        $stmt->bindValue(':categoryId', $categoryId);

        return $stmt->execute();
    }

}