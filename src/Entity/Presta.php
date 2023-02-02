<?php

namespace App\Entity;

use App\Repository\PrestaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestaRepository::class)]
class Presta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\ManyToOne(inversedBy: 'prestas')]
    private ?ejemplares $id_ejemplares = null;

    #[ORM\ManyToOne(inversedBy: 'prestas')]
    private ?socio $id_socio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha_devolucion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getIdEjemplares(): ?ejemplares
    {
        return $this->id_ejemplares;
    }

    public function setIdEjemplares(?ejemplares $id_ejemplares): self
    {
        $this->id_ejemplares = $id_ejemplares;

        return $this;
    }

    public function getIdSocio(): ?socio
    {
        return $this->id_socio;
    }

    public function setIdSocio(?socio $id_socio): self
    {
        $this->id_socio = $id_socio;

        return $this;
    }

    public function getFechaDevolucion(): ?\DateTimeInterface
    {
        return $this->fecha_devolucion;
    }

    public function setFechaDevolucion(\DateTimeInterface $fecha_devolucion): self
    {
        $this->fecha_devolucion = $fecha_devolucion;

        return $this;
    }
}
