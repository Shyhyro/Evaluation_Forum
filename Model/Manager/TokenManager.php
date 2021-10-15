<?php
namespace Bosqu\EvaluationForum\Model\Manager;
use Bosqu\EvaluationForum\Model\Classes\Database;
use Bosqu\EvaluationForum\Model\Entity\Token;

class TokenManager
{
    /**
     * Create a new token for new User
     * @param $user_fk
     * @param $token
     * @return bool
     */
    public function addUser($user_fk, $token) :bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO token (user_fk, token) VALUES (:user, :token)");

        $stmt->bindValue(':user', $user_fk);
        $stmt->bindValue(':token', $token);

        return $stmt->execute();
    }

    /**
     * Search a token of user
     * @param $userId
     * @return Token|null
     */
    public function searchToken($userId): ?Token
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM token  WHERE user_fk = :userId LIMIT 1");
        $stmt->bindValue(':userId', $userId);
        $state = $stmt->execute();
        if($state && $tokenData = $stmt->fetch())
        {
            $user = new Token($tokenData['id'], $tokenData['user_fk'], $tokenData['token']);
        }
        else
        {
            $user = null;
        }
        return $user;
    }


    /**
     * Search a User in table user by Id
     * @param $token
     * @return Token
     */
    public function searchTokenByToken($token): ?Token
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM token  WHERE token = :token LIMIT 1");
        $stmt->bindValue(':token', $token);
        $state = $stmt->execute();
        if($state && $tokenData = $stmt->fetch())
        {
            $user = new Token($tokenData['id'], $tokenData['user_fk'], $tokenData['token']);
        }
        else
        {
            $user = null;
        }
        return $user;
    }

    /**
     * delete a token by token
     * @param $token
     * @return bool
     */
    public function deleteTokenByToken($token) :bool
    {
        $stmt = Database::getInstance()->prepare("DELETE FROM token WHERE token = :token ");

        $stmt->bindValue(':token', $token);

        return $stmt->execute();
    }
}