<?php

/**
 * Enlazo el repositorio y apunto al Mapping mediante los use.
 */

namespace App\Entity;

use App\Repository\EmpRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
     * @ORM\Entity(repositoryClass=EmpRepository::class)
     * @ORM\Table(name="Emp")
     */
class Emp
{
    /**
     * @ORM\Id
     * @ORM\Column(type="smallint", name="EMP_NO")
     */
    private $empNo;

    /** @ORM\Column(type="string", length="12", name="`Nombre`") */
    private $nombre;

    /** @ORM\Column(type="string", length="10", name="`APELLIDOS`") */
    private $apellidos;

    /** @ORM\Column(type="string", length="10", name="OFICIO", options={"fixed" = true}) */
    private $oficio;

    /**
     * @ORM\OneToOne(targetEntity="Emp")
     * @ORM\JoinColumn(name="JEFE", referencedColumnName="EMP_NO")
     */
    private $jefe;
    /**
     * Relacion OneToOne consigo mismo, IMPORTANTE poner el joinColumn(Parte N) y referencedColumnName(Parte 1)
     */

    /** @ORM\Column(type="datetime", name="FECHA_ALTA", nullable="true") */
    private $fechaAlta;

    /** @ORM\Column(type="integer", name="SALARIO", nullable="true") */
    private $salario;

    /** @ORM\Column(type="integer", name="COMISION", nullable="true") */
    private $comision;

    /**
     * Muchos empleados tienen un departamento. Este es el lado propietario.
     * @ORM\ManyToOne(targetEntity="Dept", inversedBy="emp")
     * @ORM\JoinColumn(name="DEPT_NO", referencedColumnName="DEPT_NO")
     */
    private $dept;

    /**
     * Un empleado tiene muchos clientes.Lado de Uno, bidireccional
     * @ORM\OneToMany(targetEntity="cliente", mappedBy="emp")
     */
    private $cliente;

    public function __construct() {
        $this->cliente = new ArrayCollection();
    }


   

    /**
     * Get the value of empNo
     */ 
    public function getEmpNo()
    {
        return $this->empNo;
    }

    /**
     * Set the value of empNo
     *
     * @return  self
     */ 
    public function setEmpNo($empNo)
    {
        $this->empNo = $empNo;

        return $this;
    }

    /**
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of oficio
     */ 
    public function getOficio()
    {
        return $this->oficio;
    }

    /**
     * Set the value of oficio
     *
     * @return  self
     */ 
    public function setOficio($oficio)
    {
        $this->oficio = $oficio;

        return $this;
    }

    /**
     * Get the value of jefe
     */ 
    public function getJefe()
    {
        return $this->jefe;
    }

    /**
     * Set the value of jefe
     *
     * @return  self
     */ 
    public function setJefe($jefe)
    {
        $this->jefe = $jefe;

        return $this;
    }

    /**
     * Get the value of fechaAlta
     */ 
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set the value of fechaAlta
     *
     * @return  self
     */ 
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get the value of salario
     */ 
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set the value of salario
     *
     * @return  self
     */ 
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get the value of comision
     */ 
    public function getComision()
    {
        return $this->comision;
    }

    /**
     * Set the value of comision
     *
     * @return  self
     */ 
    public function setComision($comision)
    {
        $this->comision = $comision;

        return $this;
    }

    /**
     * Get muchos empleados tienen un departamento. Este es el lado propietario.
     */ 
    public function getDept()
    {
        return $this->dept;
    }

    /**
     * Set muchos empleados tienen un departamento. Este es el lado propietario.
     *
     * @return  self
     */ 
    public function setDept($dept)
    {
        $this->dept = $dept;

        return $this;
    }

    /**
     * Get un empleado tiene muchos clientes.Lado de Uno, bidireccional
     */ 
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set un empleado tiene muchos clientes.Lado de Uno, bidireccional
     *
     * @return  self
     */ 
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

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
}