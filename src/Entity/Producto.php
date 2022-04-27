<?php

/**
 * Enlazo el repositorio y apunto al Mapping mediante los use.
 */

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
     * @ORM\Entity(repositoryClass=ProductoRepository::class)
     * @ORM\Table(name="producto")
     */
class Producto
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="PROD_NUM")
     */
    private $prodNum;

    /** @ORM\Column(type="string", length="30", name="DESCRIPCION") */
    private $descripcion;

    /**
     * Un cliente tiene muchos pedidos.Lado de Uno, bidireccional
     * @ORM\OneToMany(targetEntity="detalle", mappedBy="producto")
     */
    private $detalle;

    public function __construct() {
        $this->detalle = new ArrayCollection();
    }


    /**
     * Get the value of prodNum
     */ 
    public function getProdNum()
    {
        return $this->prodNum;
    }

    /**
     * Set the value of prodNum
     *
     * @return  self
     */ 
    public function setProdNum($prodNum)
    {
        $this->prodNum = $prodNum;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get un cliente tiene muchos pedidos.Lado de Uno, bidireccional
     */ 
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set un cliente tiene muchos pedidos.Lado de Uno, bidireccional
     *
     * @return  self
     */ 
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }
}