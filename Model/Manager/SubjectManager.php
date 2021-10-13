<?php
namespace Bosqu\EvaluationForum\Model\Manager;

use Bosqu\EvaluationForum\Model\Classes\Database;
use Bosqu\EvaluationForum\Model\Entity\Subject;

class SubjectManager
{
    /**
     * Get all Subject of a category
     */
    public function getAllSubjectOfCategory($categoryId): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM subject WHERE category_fk = :categoryId");
        $stmt->bindValue(':categoryId', $categoryId);

        if($stmt->execute() && $subjectDatas = $stmt->fetchAll()) {
            foreach ($subjectDatas as $subjectData) {
                $array[] = new Subject($subjectData['id'], $subjectData['statut'], $subjectData['registration'], $subjectData['user_fk'], $subjectData['category_fk'],
                    $subjectData['name'], $subjectData['description'], $subjectData['content']);
            }
        }
        return $array;
    }

    /**
     * Search a subject
     * @param $subjectId
     * @return Subject
     */
    public function searchSubject($subjectId): ?Subject
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM subject  WHERE id = :subjectId LIMIT 1");
        $stmt->bindValue(':subjectId', $subjectId);
        $state = $stmt->execute();
        if($state && $subjectData = $stmt->fetch())
        {
            $subject = new Subject($subjectData['id'], $subjectData['statut'], $subjectData['registration'], $subjectData['user_fk'], $subjectData['category_fk'],
                $subjectData['name'], $subjectData['description'], $subjectData['content']);
        }
        else
        {
            $subject = null;
        }
        return $subject;
    }

    /**
     * Get all subject by statut
     * @param $statut
     * @return Subject
     */
    public function allSubjectsByStatut($statut):Subject {
        $stmt = Database::getInstance()->prepare("SELECT * FROM subject WHERE statut = :statut ");
        $stmt->bindValue(':statut', $statut);
        $state = $stmt->execute();
        $subjects = null;

        if($state) {
            $subjectsData = $stmt->fetch();
            $subjects = new Subject($subjectsData['id'], $subjectsData['statut'], $subjectsData['registration'], $subjectsData['user_fk'],
                $subjectsData['category_fk'], $subjectsData['name'], $subjectsData['description'], $subjectsData['content']);
        }
        return $subjects;
    }

    /**
     * Add a new subjects
     * @param $user_fk
     * @param $category_fk
     * @param $name
     * @param $description
     * @param $content
     * @return bool
     */
    public function addSubject($user_fk, $category_fk, $name, $description, $content) :bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO subject (statut, user_fk, category_fk, name, description, content) 
                                                        VALUES (1, :username, :category, :name, :description, :content)");
        $stmt->bindValue(':username', $user_fk);
        $stmt->bindValue(':category', $category_fk);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':content', $content);

        return $stmt->execute();
    }

    /**
     * change statut of a subjects
     * @param $statut
     * @param $subjectId
     * @return bool
     */
    public function changeStatutSubject($statut, $subjectId) :bool
    {
        $stmt = Database::getInstance()->prepare("UPDATE subject SET statut = :statut WHERE id = :subjectId ");
        $stmt->bindValue(':statut', $statut);
        $stmt->bindValue(':subjectId', $subjectId);

        return $stmt->execute();
    }

    /**
     * delete a subjects
     * @param $subjectId
     * @return bool
     */
    public function deleteSubject($subjectId) :bool
    {
        $stmt = Database::getInstance()->prepare("DELETE FROM subject WHERE id = :subjectId ");
        $stmt->bindValue(':subjectId', $subjectId);

        return $stmt->execute();
    }

    /**
     * get a subjects
     * @param $subjectId
     * @return bool
     */
    public function getSubjectById($subjectId):Subject {
        $stmt = Database::getInstance()->prepare("SELECT * FROM subject WHERE id = :subjectId ");
        $stmt->bindValue(':subjectId', $subjectId);
        $state = $stmt->execute();
        $subjects = null;

        if($state) {
            $subjectsData = $stmt->fetch();
            $subjects = new Subject($subjectsData['id'], $subjectsData['statut'], $subjectsData['registration'], $subjectsData['user_fk'],
                $subjectsData['category_fk'], $subjectsData['name'], $subjectsData['description'], $subjectsData['content']);
        }
        return $subjects;
    }

}