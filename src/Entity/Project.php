<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CallForProjects", inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $callForProjects;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FilledField", mappedBy="project", orphanRemoval=true, cascade={"persist"})
     */
    private $filledFields;

    public function __construct()
    {
        $this->filledFields = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
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

    /**
     * @return Collection|FilledField[]
     */
    public function getFilledFields(): Collection
    {
        return $this->filledFields;
    }

    public function addFilledField(FilledField $filledField): self
    {
        if (!$this->filledFields->contains($filledField)) {
            $this->filledFields[] = $filledField;
            $filledField->setProject($this);
        }

        return $this;
    }

    public function removeFilledField(FilledField $filledField): self
    {
        if ($this->filledFields->contains($filledField)) {
            $this->filledFields->removeElement($filledField);
            // set the owning side to null (unless already changed)
            if ($filledField->getProject() === $this) {
                $filledField->setProject(null);
            }
        }

        return $this;
    }
}
