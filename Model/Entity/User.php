<?php


class User
{
    private ?int $id;
    private ?int $statut;
    private ?string $registration;
    private ?string $username;
    private ?string $password;
    private ?string $mail;
    private ?Role $role_fk;

    /**
     * User constructor.
     * @param int|null $id
     * @param int|null $statut
     * @param string|null $registration
     * @param string|null $username
     * @param string|null $password
     * @param string|null $mail
     * @param Role|null $role_fk
     */
    public function __construct(int $id = null, int $statut = null, string $registration = null, string $username = null, string $password = null, string $mail = null, Role $role_fk = null)
    {
        $this->id = $id;
        $this->statut = $statut;
        $this->registration = $registration;
        $this->username = $username;
        $this->password = $password;
        $this->mail = $mail;
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
     * Get sattut of User
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
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * Set email of User
     * @param string|null $mail
     * @return User
     */
    public function setMail(?string $mail): User
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * Get role Fk of User
     * @return Role|null
     */
    public function getRoleFk(): ?Role
    {
        return $this->role_fk;
    }

    /**
     * Set role Fk of User
     * @param Role|null $role_fk
     */
    public function setRoleFk(?Role $role_fk): void
    {
        $this->role_fk = $role_fk;
    }
}