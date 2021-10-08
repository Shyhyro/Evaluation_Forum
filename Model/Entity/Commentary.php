<?php


class Commentary
{
    private ?int $id;
    private ?int $statut;
    private ?User $user_fk;
    private ?Subject $subject_fk;
    private ?string $content;

    /**
     * Commentary constructor.
     * @param int|null $id
     * @param int|null $statut
     * @param User|null $user_fk
     * @param Subject|null $subject_fk
     * @param string|null $content
     */
    public function __construct(int $id = null, int $statut = null,
                                User $user_fk = null, Subject $subject_fk = null, string $content = null)
    {
        $this->id = $id;
        $this->statut = $statut;
        $this->user_fk = $user_fk;
        $this->subject_fk = $subject_fk;
        $this->content = $content;
    }

    /**
     * Get id of Commentary
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get statut of Commentary
     * @return int|null
     */
    public function getStatut(): ?int
    {
        return $this->statut;
    }

    /**
     * Set statut of Commentary
     * @param int|null $statut
     * @return Commentary
     */
    public function setStatut(?int $statut): Commentary
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * Get user_fk of Commentary
     * @return User|null
     */
    public function getUserFk(): ?User
    {
        return $this->user_fk;
    }

    /**
     * Set user_fk of Commentary
     * @param User|null $user_fk
     */
    public function setUserFk(?User $user_fk): void
    {
        $this->user_fk = $user_fk;
    }

    /**
     * Get subject_fk of Commentary
     * @return Subject|null
     */
    public function getSubjectFk(): ?Subject
    {
        return $this->subject_fk;
    }

    /**
     * Set subject_fk of Commentary
     * @param Subject|null $subject_fk
     */
    public function setSubjectFk(?Subject $subject_fk): void
    {
        $this->subject_fk = $subject_fk;
    }

    /**
     * Get content of Commentary
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Set content of Commentary
     * @param string|null $content
     * @return Commentary
     */
    public function setContent(?string $content): Commentary
    {
        $this->content = $content;
        return $this;
    }

}