<?php

namespace App\Entity;

use App\Repository\EjemplaresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EjemplaresRepository::class)]
class Ejemplares
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $codigo = null;

    #[ORM\ManyToOne(inversedBy: 'ejemplares')]
    private ?libros $id_libros = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\OneToMany(mappedBy: 'id_ejemplares', targetEntity: Presta::class)]
    private Collection $prestas;

    public function __construct()
    {
        $this->prestas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getIdLibros(): ?libros
    {
        return $this->id_libros;
    }

    public function setIdLibros(?libros $id_libros): self
    {
        $this->id_libros = $id_libros;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection<int, Presta>
     */
    public function getPrestas(): Collection
    {
        return $this->prestas;
    }

    public function addPresta(Presta $presta): self
    {
        if (!$this->prestas->contains($presta)) {
            $this->prestas->add($presta);
            $presta->setIdEjemplares($this);
        }

        return $this;
    }

    public function removePresta(Presta $presta): self
    {
        if ($this->prestas->removeElement($presta)) {
            // set the owning side to null (unless already changed)
            if ($presta->getIdEjemplares() === $this) {
                $presta->setIdEjemplares(null);
            }
        }

        return $this;
    }
}
