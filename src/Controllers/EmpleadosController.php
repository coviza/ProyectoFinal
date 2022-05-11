<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Emp;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\EmpRepository;
use Doctrine\Common\Util\Debug;

class EmpleadosController extends AbstractController
{
    public function showEmpleados()
    {
        
        $entityManager = (new EntityManager())->get();
        $empRepository = $entityManager->getRepository(Emp::class);
        $empleados = $empRepository->findAll();
        /* echo "<pre>";
        Debug::dump($empleados);
        die(); */

        $this->render("empleados.html", [
            "resultados" => $empleados
        ]);
    }
}