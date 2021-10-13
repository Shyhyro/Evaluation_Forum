<?php
namespace Bosqu\EvaluationForum\Model\Entity;

class User
{
    private ?int $id;
    private ?int $statut;
    private ?string $registration;
    private ?string $username;
    private ?string $password;
    private ?string $email;
    private ?int $role_fk;

    /**
     * User constructor.
     * @param int|null $id
     * @param int|null $statut
     * @param string|null $registration
     * @param string|null $username
     * @param string|null $password
     * @param string|null $email
     * @param int|null $role_fk
     */
    public function __construct(int $id = null, int $statut = null, string $registration = null, string $username = null, string $password = null, string $email = null, int $role_fk = null)
    {
        $this->id = $id;
        $this->statut = $statut;
        $this->registration = $registration;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role_fk = $role_fk;
    }

    /**
     * Get id of User
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get statut of User
     * @return int|null
     */
    public function getStatut(): ?int
    {
        return $this->statut;
    }

    /**
     * Set statut of User
     * @param int|null $statut
     * @return User
     */
    public function setStatut(?int $statut): User
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * Get registration date of User
     * @return string|null
     */
    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    /**
     * Set registration date of User
     * @param string|null $registration
     * @return User
     */
    public function setRegistration(?string $registration): User
    {
        $this->registration = $registration;
        return $this;
    }

    /**
     * Get username of User
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set username of User
     * @param string|null $username
     * @return User
     */
    public function setUsername(?string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get password of User
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set password of User
     * @param string|null $password
     * @return User
     */
    public function setPassword(?string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get email of User
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set email of User
     * @param string|null $email
     * @return User
     */
    public function setEmail(?string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get role_fk of User
     * @return int|null
     */
    public function getRoleFk(): ?int
    {
        return $this->role_fk;
    }

    /**
     * Set role_fk of User
     * @param false|int|null $role_fk
     */
    public function setRoleFk($role_fk): User
    {
        $this->role_fk = $role_fk;
        return $this;
    }

}