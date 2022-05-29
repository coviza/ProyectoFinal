<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Detalle;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\DetalleRepository;
use Doctrine\Common\Util\Debug;

class DetallesController extends AbstractController
{
    public function showDetalles()
    {
        
        $entityManager = (new EntityManager())->get();
        $detalleRepository = $entityManager->getRepository(Detalle::class);
        $detalles = $detalleRepository->findAll();
        /* echo "<pre>";
        Debug::dump($detalles);
        die(); */

        $this->render("detalles.html.twig", [
            "resultados" => $detalles
        ]);
    }
}