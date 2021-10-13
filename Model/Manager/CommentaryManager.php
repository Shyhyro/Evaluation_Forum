<?php
namespace Bosqu\EvaluationForum\Model\Manager;

use Bosqu\EvaluationForum\Model\Classes\Database;
use Bosqu\EvaluationForum\Model\Entity\Commentary;

class CommentaryManager
{
    /**
     * Get all public commentary of a subject
     * @param $subjectId
     * @return array
     */
    public function getCommentary($subjectId):array
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM commentary WHERE subject_fk = :subjectId AND statut = 1");
        $stmt->bindValue(':subjectId', $subjectId);
        $state = $stmt->execute();
        $comments = [];
        if ($state)
        {
            foreach ($stmt->fetchAll() as $commentary)
            {
                $comments [] = new Commentary($commentary['id'], $commentary['statut'], $commentary['user_fk'], $commentary['subject_fk'], $commentary['content']);
            }
        }
        return $comments;
    }

    /**
     * Insert a new commentary
     * @param $user_fk
     * @param $subject_fk
     * @param $content
     * @return bool
     */
    public function newCommentary($user_fk, $subject_fk, $content): bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO commentary (statut, user_fk, subject_fk, content) VALUE (1, :user_fk, :subject_fk, :content)");
        $stmt->bindValue(':user_fk', $user_fk);
        $stmt->bindValue(':subject_fk', $subject_fk);
        $stmt->bindValue(':content', $content);

        return $stmt->execute();
    }

    /**
     * Delete a commentary
     * @param $commentaryId
     * @return bool
     */
    public function deleteCommentary($commentaryId): bool
    {
        $stmt = Database::getInstance()->prepare("DELETE FROM commentary WHERE id = :commentaryId");
        $stmt->bindValue(':commentaryId', $commentaryId);

        return $stmt->execute();
    }



}