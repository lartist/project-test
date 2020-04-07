<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FieldRepository")
 */
class Field
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CallForProjects", inversedBy="fields")
     * @ORM\JoinColumn(nullable=false)
     */
    private $callForProjects;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FormWidget")
     * @ORM\JoinColumn(nullable=false)
     */
    private $widgetForm;

    /**
     * @ORM\Column(type="integer")
     */
    private $rank;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     * @return Field
     */
    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getCallForProjects(): ?CallForProjects
    {
        return $this->callForProjects;
    }

    public function setCallForProjects(?CallForProjects $callForProjects): self
    {
        $this->callForProjects = $callForProjects;

        return $this;
    }

    public function getWidgetForm(): ?FormWidget
    {
        return $this->widgetForm;
    }

    public function setWidgetForm(?FormWidget $widgetForm): self
    {
        $this->widgetForm = $widgetForm;

        return $this;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }
}
