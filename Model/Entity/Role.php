<?php
namespace Bosqu\EvaluationForum\Model\Entity;

class Role
{
    private ?int $id;
    private ?string $name;

    /**
     * Role constructor.
     * @param int|null $id
     * @param string|null $name
     */
    public function __construct(int $id = null, string $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get id of Role
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get name of Role
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set name of Role
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

}