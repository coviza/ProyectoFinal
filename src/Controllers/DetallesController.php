<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Detalle;
use App\Entity\Pedido;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\DetalleRepository;
use App\Repository\PedidoRepository;
use Doctrine\Common\Util\Debug;

class DetallesController extends AbstractController
{
    public function showDetalles($pedidoNum)
    {
        
        $entityManager = (new EntityManager())->get();
        $detalleRepository = $entityManager->getRepository(Detalle::class);
        // $detalles = $detalleRepository->findBy(['pedidoNum' => '601']);
        $pedidoRepository = $entityManager->getRepository(Pedido::class);
        $pedido = $detalleRepository->findBy(['pedido' => $pedidoNum]);
        /* echo "<pre>";
        Debug::dump($detalles);
        die(); */

        $this->render("detalles.html.twig", [
            "resultados" => $pedido
        ]);
    }
}