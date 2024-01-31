<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'projets')]
    private Collection $category;

    #[ORM\ManyToMany(targetEntity: Etiquette::class, inversedBy: 'projets')]
    private Collection $etiquette;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->etiquette = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        $this->category->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, Etiquette>
     */
    public function getEtiquette(): Collection
    {
        return $this->etiquette;
    }

    public function addEtiquette(Etiquette $etiquette): static
    {
        if (!$this->etiquette->contains($etiquette)) {
            $this->etiquette->add($etiquette);
        }

        return $this;
    }

    public function removeEtiquette(Etiquette $etiquette): static
    {
        $this->etiquette->removeElement($etiquette);

        return $this;
    }
}
