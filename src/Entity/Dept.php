<?php

/**
 * Enlazo el repositorio y apunto al Mapping mediante los use.
 */

namespace App\Entity;

use App\Repository\DeptRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
     * @ORM\Entity(repositoryClass=DeptRepository::class)
     * @ORM\Table(name="dept")
     */
class Dept
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="DEPT_NO", options={"unsigned": true})
     */
    private $deptNo;

    /** @ORM\Column(type="string", length="14", name="DNOMBRE ") */
    private $dNombre;

    /** @ORM\Column(type="string", length="14", name="LOC", nullable="true") */
    private $loc;

    /** @ORM\Column(type="string", length="20", name="color", nullable="true") */
    private $color;

    /**
     * Un departamento tiene muchos empleados.Lado de Uno, bidireccional
     * @ORM\OneToMany(targetEntity="Emp", mappedBy="dept")
     */
    private $emp;

    public function __construct() {
        $this->emp = new ArrayCollection();
    }

    /**
     * Get the value of deptNo
     */ 
    public function getDeptNo()
    {
        return $this->deptNo;
    }

    /**
     * Set the value of deptNo
     *
     * @return  self
     */ 
    public function setDeptNo($deptNo)
    {
        $this->deptNo = $deptNo;

        return $this;
    }

    /**
     * Get the value of dNombre
     */ 
    public function getDNombre()
    {
        return $this->dNombre;
    }

    /**
     * Set the value of dNombre
     *
     * @return  self
     */ 
    public function setDNombre($dNombre)
    {
        $this->dNombre = $dNombre;

        return $this;
    }

    /**
     * Get the value of loc
     */ 
    public function getLoc()
    {
        return $this->loc;
    }

    /**
     * Set the value of loc
     *
     * @return  self
     */ 
    public function setLoc($loc)
    {
        $this->loc = $loc;

        return $this;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get un departamento tiene muchos empleados.Lado de Uno, bidireccional
     */ 
    public function getEmp()
    {
        return $this->emp;
    }

    /**
     * Set un departamento tiene muchos empleados.Lado de Uno, bidireccional
     *
     * @return  self
     */ 
    public function setEmp($emp)
    {
        $this->emp = $emp;

        return $this;
    }
}