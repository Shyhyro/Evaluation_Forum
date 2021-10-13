<?php
namespace Bosqu\EvaluationForum\Model\Manager;

use Bosqu\EvaluationForum\Model\Classes\Database;
use Bosqu\EvaluationForum\Model\Entity\Role;

class RoleManager
{
    /**
     * Search role
     * @param $roleId
     * @return Role
     */
    public function searchRole($roleId):Role {
        $stmt = Database::getInstance()->prepare("SELECT * FROM role WHERE id = :roleId LIMIT 1");
        $stmt->bindValue(':roleId', $roleId);
        $state = $stmt->execute();
        $role = null;

        if($state) {
            $roleData = $stmt->fetch();
            $role = new Role($roleData['id'], $roleData['name']);
        }
        return $role;
    }

    /**
     * Get all role
     * @return array
     */
    public function allRole():array {
        $stmt = Database::getInstance()->prepare("SELECT * FROM role ");
        $state = $stmt->execute();
        $roles = [];
        if($state) {
            foreach ($stmt->fetchAll() as $role) {
                $roles [] = new Role($role['id'], $role['name']);
            }
        }
        return $roles;
    }

}