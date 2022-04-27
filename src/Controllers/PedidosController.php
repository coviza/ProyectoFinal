<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Pedido;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\PedidoRepository;
use Doctrine\Common\Util\Debug;

class PedidosController extends AbstractController
{
    public function showPedidos()
    {
        
        $entityManager = (new EntityManager())->get();
        $pedidoRepository = $entityManager->getRepository(Pedido::class);
        $pedidos = $pedidoRepository->findAll();
        /* echo "<pre>";
        Debug::dump($pedidos[0]->getDetalle()->getPedidoNum());
        die(); */

        $this->render("pedidos.html", [
            "resultados" => $pedidos
        ]);
    }
}