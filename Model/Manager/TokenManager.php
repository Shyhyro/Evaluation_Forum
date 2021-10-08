<?php

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
     * @return bool
     */
    public function searchToken($userId) :bool
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM token WHERE user_fk = :userId ");

        $stmt->bindValue(':userId', $userId);

        return $stmt->execute();
    }
}