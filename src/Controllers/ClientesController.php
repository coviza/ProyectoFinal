<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Cliente;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\ClienteRepository;
use Doctrine\Common\Util\Debug;

class ClientesController extends AbstractController
{
    public function showClientes()
    {
        
        $entityManager = (new EntityManager())->get();
        $cliRepository = $entityManager->getRepository(Cliente::class);
        $clientes = $cliRepository->findAll();
        /* echo "<pre>";
        Debug::dump($clientes);
        die(); */

        $this->render("clientes.html.twig", [
            "resultados" => $clientes
        ]);
    }
}