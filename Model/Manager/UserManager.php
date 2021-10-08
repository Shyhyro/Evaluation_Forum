<?php

class UserManager
{
    /**
     * Get all User in table user
     */
    public function getAllUser(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM user");

        if($stmt->execute() && $userDatas = $stmt->fetchAll()) {
            foreach ($userDatas as $userData) {
                $array[] = new User($userData['id'], $userData['username'], $userData['password']);
            }
        }
        return $array;
    }

    /**
     * Search a User in table user for log
     * @param $username
     * @return User
     */
    public function searchUser($username): ?User
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM user  WHERE username = :username LIMIT 1");
        $stmt->bindValue(':username', $username);
        $state = $stmt->execute();
        if($state && $userData = $stmt->fetch())
        {
            $user = new User($userData['id'], $userData['username'], $userData['password']);
        }
        else
        {
            $user = null;
        }
        return $user;
    }

    /**
     * Add a new user
     * @param $username
     * @param $password
     * @param $email
     * @return bool
     */
    public function addUser($username, $password, $email) :bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO user (username, password, email, role_fk) VALUES (:username, :password, :email, 3)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':email', $email);

        return $stmt->execute();
    }
}