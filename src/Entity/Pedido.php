<?php

/**
 * Enlazo el repositorio y apunto al Mapping mediante los use.
 */

namespace App\Entity;

use App\Repository\PedidoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
     * @ORM\Entity(repositoryClass=PedidoRepository::class)
     * @ORM\Table(name="pedido")
     */
class Pedido
{
    /**
     * @ORM\Id
     * @ORM\Column(type="smallint", name="PEDIDO_NUM")
     */
    private $pedidoNum;

    /** @ORM\Column(type="datetime", nullable="true", name="PEDIDO_FECHA") */
    private $pedidoFecha;

    /** @ORM\Column(type="string", length="1", name="PEDIDO_TIPO", options={"fixed" = true}) */
    private $pedidoTipo;

    /**
     * Muchos pedidos tienen un cliente. Este es el lado propietario.
     * @ORM\ManyToOne(targetEntity="cliente", inversedBy="pedido")
     * @ORM\JoinColumn(name="CLIENTE_COD", referencedColumnName="CLIENTE_COD")
     */
    private $cliente;

    /** @ORM\Column(type="datetime", nullable="true", name="FECHA_ENVIO") */
    private $fechaEnvio;

    /** @ORM\Column(type="decimal", precision="8", scale="2", name="TOTAL", nullable="true") */
    
    private $total;
    /**
     * Un pedido tiene muchos detalles.Lado de Uno, bidireccional
     * @ORM\OneToMany(targetEntity="detalle", mappedBy="pedido")
     */
    private $detalle;

    public function __construct() {
        $this->detalle = new ArrayCollection();
    }

    /**
     * Get the value of pedidoNum
     */ 
    public function getPedidoNum()
    {
        return $this->pedidoNum;
    }

    /**
     * Set the value of pedidoNum
     *
     * @return  self
     */ 
    public function setPedidoNum($pedidoNum)
    {
        $this->pedidoNum = $pedidoNum;

        return $this;
    }

    /**
     * Get the value of pedidoFecha
     */ 
    public function getPedidoFecha()
    { 
        return $this->pedidoFecha->format('Y-m-d');  //para poder mostrar las fechas le paso el metodo date->format('formato')
        // return $this->pedidoFecha;
    }

    /**
     * Set the value of pedidoFecha
     *
     * @return  self
     */ 
    public function setPedidoFecha($pedidoFecha)
    {
        $this->pedidoFecha = $pedidoFecha;

        return $this;
    }

    /**
     * Get the value of pedidoTipo
     */ 
    public function getPedidoTipo()
    {
        return $this->pedidoTipo;
    }

    /**
     * Set the value of pedidoTipo
     *
     * @return  self
     */ 
    public function setPedidoTipo($pedidoTipo)
    {
        $this->pedidoTipo = $pedidoTipo;

        return $this;
    }

   
    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get un pedido tiene muchos detalles.Lado de Uno, bidireccional
     */ 
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * Set un pedido tiene muchos detalles.Lado de Uno, bidireccional
     *
     * @return  self
     */ 
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * Get muchos pedidos tienen un cliente. Este es el lado propietario.
     */ 
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set muchos pedidos tienen un cliente. Este es el lado propietario.
     *
     * @return  self
     */ 
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get the value of fechaEnvio
     */ 
    public function getFechaEnvio()
    {
        return $this->fechaEnvio->format('d-m-Y'); //para poder mostrar las fechas le paso el metodo date->format('formato')
        // return $this->fechaEnvio;
    } 

    /**
     * Set the value of fechaEnvio
     *
     * @return  self
     */ 
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }
}