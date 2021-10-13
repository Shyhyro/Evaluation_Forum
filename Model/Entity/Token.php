<?php
namespace Bosqu\EvaluationForum\Model\Entity;

class Token
{
    private ?int $id;
    private ?int $user_fk;
    private ?string $token;

    /**
     * Token constructor.
     * @param int|null $id
     * @param int|null $user_fk
     * @param string|null $token
     */
    public function __construct(int $id = null, int $user_fk = null, string $token = null)
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
     * Get user_fk of Token
     * @return int|null
     */
    public function getUserFk(): ?int
    {
        return $this->user_fk;
    }

    /**
     * Set user_fk of Token
     * @param false|int|null $user_fk
     */
    public function setUserFk($user_fk): Token
    {
        $this->user_fk = $user_fk;
        return $this;
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