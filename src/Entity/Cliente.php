<?php

/**
 * Enlazo el repositorio y apunto al Mapping mediante los use.
 */

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
     * @ORM\Entity(repositoryClass=ClienteRepository::class)
     * @ORM\Table(name="cliente")
     */
class Cliente
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="CLIENTE_COD")
     */
    private $clienteCod;

    /** @ORM\Column(type="string", length="45", name="NOMBRE") */
    private $nombre;

    /** @ORM\Column(type="string", length="40", name="DIREC") */
    private $direccion;

    /** @ORM\Column(type="string", length="30", name="CIUDAD") */
    private $ciudad;

    /** @ORM\Column(type="string", length="2", name="ESTADO", nullable="true") */
    private $estado;

    /** @ORM\Column(type="string", length="9", name="COD_POSTAL") */
    private $codPostal;

    /** @ORM\Column(type="smallint", name="AREA", nullable="true") */
    private $area;

    /** @ORM\Column(type="string", length="9", name="`TELEFONO`", nullable="true") */
    private $telefono;

     /**
     * Muchos clientes tienen un empleado. Este es el lado propietario.
     * @ORM\ManyToOne(targetEntity="Emp", inversedBy="Cliente")
     * @ORM\JoinColumn(name="REPR_COD", referencedColumnName="EMP_NO")
     */
    private $emp;

    /** @ORM\Column(type="decimal", precision="9", scale="2", name="LIMITE_CREDITO", nullable="true") */
    private $limiteCredito;

    /** @ORM\Column(type="text", name="OBSERVACIONES", nullable="true") */
    private $observaciones;


    /**
     * Un cliente tiene muchos pedidos.Lado de Uno, bidireccional
     * @ORM\OneToMany(targetEntity="pedido", mappedBy="cliente")
     */
    private $pedido;

    public function __construct() {
        $this->pedido = new ArrayCollection();
    }

    /**
     * Get the value of clienteCod
     */ 
    public function getClienteCod()
    {
        return $this->clienteCod;
    }

    /**
     * Set the value of clienteCod
     *
     * @return  self
     */ 
    public function setClienteCod($clienteCod)
    {
        $this->clienteCod = $clienteCod;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */ 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of codPostal
     */ 
    public function getCodPostal()
    {
        return $this->codPostal;
    }

    /**
     * Set the value of codPostal
     *
     * @return  self
     */ 
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    /**
     * Get the value of area
     */ 
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the value of area
     *
     * @return  self
     */ 
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }


    /**
     * Get the value of limiteCredito
     */ 
    public function getLimiteCredito()
    {
        return $this->limiteCredito;
    }

    /**
     * Set the value of limiteCredito
     *
     * @return  self
     */ 
    public function setLimiteCredito($limiteCredito)
    {
        $this->limiteCredito = $limiteCredito;

        return $this;
    }

    /**
     * Get the value of observaciones
     */ 
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     *
     * @return  self
     */ 
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get un cliente tiene muchos pedidos.Lado de Uno, bidireccional
     */ 
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set un cliente tiene muchos pedidos.Lado de Uno, bidireccional
     *
     * @return  self
     */ 
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get muchos clientes tienen un empleado. Este es el lado propietario.
     */ 
    public function getEmp()
    {
        return $this->emp;
    }

    /**
     * Set muchos clientes tienen un empleado. Este es el lado propietario.
     *
     * @return  self
     */ 
    public function setEmp($emp)
    {
        $this->emp = $emp;

        return $this;
    }
}
