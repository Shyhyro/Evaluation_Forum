<?php


class Subject
{
    private ?int $id;
    private ?int $statut;
    private ?string $registration;
    private ?User $user_fk;
    private ?Category $category_fk;
    private ?string $name;
    private ?string $description;
    private ?string $content;

    /**
     * Subject constructor.
     * @param int|null $id
     * @param int|null $statut
     * @param string|null $registration
     * @param User|null $user_fk
     * @param Category|null $category_fk
     * @param string|null $name
     * @param string|null $description
     * @param string|null $content
     */
    public function __construct(int $id = null, int $statut = null, string $registration = null,
                                User $user_fk = null, Category $category_fk = null,
                                string $name = null, string $description = null, string $content = null)
    {
        $this->id = $id;
        $this->statut = $statut;
        $this->registration = $registration;
        $this->user_fk = $user_fk;
        $this->category_fk = $category_fk;
        $this->name = $name;
        $this->description = $description;
        $this->content = $content;
    }

    /**
     * Get id of Subject
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get statut of Subject
     * @return int|null
     */
    public function getStatut(): ?int
    {
        return $this->statut;
    }

    /**
     * Set statut of Subject
     * @param int|null $statut
     * @return Subject
     */
    public function setStatut(?int $statut): Subject
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * Get registration date of Subject
     * @return string|null
     */
    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    /**
     * Set registration date of Subject
     * @param string|null $registration
     * @return Subject
     */
    public function setRegistration(?string $registration): Subject
    {
        $this->registration = $registration;
        return $this;
    }

    /**
     * Get user_fk of Subject
     * @return User|null
     */
    public function getUserFk(): ?User
    {
        return $this->user_fk;
    }

    /**
     * Set user_fk of Subject
     * @param User|null $user_fk
     */
    public function setUserFk(?User $user_fk): void
    {
        $this->user_fk = $user_fk;
    }

    /**
     * Get category_fk of Subject
     * @return Category|null
     */
    public function getCategoryFk(): ?Category
    {
        return $this->category_fk;
    }

    /**
     * Set category_fk of Subject
     * @param Category|null $category_fk
     */
    public function setCategoryFk(?Category $category_fk): void
    {
        $this->category_fk = $category_fk;
    }

    /**
     * Get name of Subject
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set name of Subject
     * @param string|null $name
     * @return Subject
     */
    public function setName(?string $name): Subject
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get description of Subject
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set description of Subject
     * @param string|null $descrription
     * @return Subject
     */
    public function setDescription(?string $descrription): Subject
    {
        $this->description = $descrription;
        return $this;
    }

    /**
     * Get content of Subject
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Set content of Subject
     * @param string|null $content
     * @return Subject
     */
    public function setContent(?string $content): Subject
    {
        $this->content = $content;
        return $this;
    }

}