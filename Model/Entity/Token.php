<?php


class Token
{
    private ?int $id;
    private ?User $user_fk;
    private ?string $token;

    /**
     * Token constructor.
     * @param int|null $id
     * @param User|null $user_fk
     * @param string|null $token
     */
    public function __construct(int $id = null, User $user_fk = null, string $token = null)
    {
        $this->id = $id;
        $this->user_fk = $user_fk;
        $this->token = $token;
    }

    /**
     * Get id of Token
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get user Fk of Token
     * @return User|null
     */
    public function getUserFk(): ?User
    {
        return $this->user_fk;
    }

    /**
     * Set user Fk of Token
     * @param User|null $user_fk
     */
    public function setUserFk(?User $user_fk): void
    {
        $this->user_fk = $user_fk;
    }

    /**
     * Get token of Token
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * Set token of Token
     * @param string|null $token
     * @return Token
     */
    public function setToken(?string $token): Token
    {
        $this->token = $token;
        return $this;
    }

}