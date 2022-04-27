<?php

/**
 * Enlazo el repositorio y apunto al Mapping mediante los use.
 */

namespace App\Entity;

use App\Repository\DetalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
     * @ORM\Entity(repositoryClass=DetalleRepository::class)
     * @ORM\Table(name="detalle")
     */
class Detalle
{
    /**
     * @ORM\Id
     * @ORM\Column(type="smallint", name="PEDIDO_NUM")
     */
    private $pedidoNum;

    /** @ORM\Column(type="smallint", name="DETALLE_NUM ") */
    private $detalleNum;

    /**
     * Muchos detalles para un producto. Este es el lado propietario.
     * @ORM\ManyToOne(targetEntity="producto", inversedBy="detalle")
     * @ORM\JoinColumn(name="PROD_NUM", referencedColumnName="PROD_NUM")
     */
    private $producto;

    /** @ORM\Column(type="decimal", precision="8", scale="2", name="PRECIO_VENTA", nullable="true") */
    private $precioVenta;

    /** @ORM\Column(type="integer", name="CANTIDAD", nullable="true") */
    private $cantidad;

    /** @ORM\Column(type="decimal", precision="8", scale="2", name="IMPORTE", nullable="true") */
    private $importe;

    /**
     * Muchos detalles para un pedido. Este es el lado propietario.
     * @ORM\ManyToOne(targetEntity="pedido", inversedBy="detalle")
     * @ORM\JoinColumn(name="PEDIDO_NUM", referencedColumnName="PEDIDO_NUM")
     */
    private $pedido;


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
     * Get the value of detalleNum
     */ 
    public function getDetalleNum()
    {
        return $this->detalleNum;
    }

    /**
     * Set the value of detalleNum
     *
     * @return  self
     */ 
    public function setDetalleNum($detalleNum)
    {
        $this->detalleNum = $detalleNum;

        return $this;
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
     * Get the value of precioVenta
     */ 
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    /**
     * Set the value of precioVenta
     *
     * @return  self
     */ 
    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of importe
     */ 
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set the value of importe
     *
     * @return  self
     */ 
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get muchos detalles para un pedido. Este es el lado propietario.
     */ 
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set muchos detalles para un pedido. Este es el lado propietario.
     *
     * @return  self
     */ 
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get muchos detalles para un producto. Este es el lado propietario.
     */ 
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set muchos detalles para un producto. Este es el lado propietario.
     *
     * @return  self
     */ 
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }
}