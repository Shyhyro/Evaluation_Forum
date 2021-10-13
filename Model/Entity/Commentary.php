<?php
namespace Bosqu\EvaluationForum\Model\Entity;

class Commentary
{
    private ?int $id;
    private ?int $statut;
    private ?int $user_fk;
    private ?int $subject_fk;
    private ?string $content;

    /**
     * Commentary constructor.
     * @param int|null $id
     * @param int|null $statut
     * @param int|null $user_fk
     * @param int|null $subject_fk
     * @param string|null $content
     */
    public function __construct(int $id = null, int $statut = null,
                                int $user_fk = null, int $subject_fk = null, string $content = null)
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
     * @return int|null
     */
    public function getUserFk(): ?int
    {
        return $this->user_fk;
    }

    /**
     * Set user_fk of Commentary
     * @param false|int|null $user_fk
     */
    public function setUserFk($user_fk): Commentary
    {
        $this->user_fk = $user_fk;
        return $this;
    }

    /**
     * Get subject_fk of Commentary
     * @return int|null
     */
    public function getSubjectFk(): ?int
    {
        return $this->subject_fk;
    }

    /**
     * Set subject of Commentary
     * @param false|int|null $subject_fk
     */
    public function setSubjectFk($subject_fk): Commentary
    {
        $this->subject_fk = $subject_fk;
        return $this;
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