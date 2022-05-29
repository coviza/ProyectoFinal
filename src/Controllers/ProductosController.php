<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Producto;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\ProductoRepository;
use Doctrine\Common\Util\Debug;

class ProductosController extends AbstractController
{
    public function showProductos()
    {
        
        $entityManager = (new EntityManager())->get();
        $productoRepository = $entityManager->getRepository(Producto::class);
        $productos = $productoRepository->findAll();
        /* echo "<pre>";
        Debug::dump($productos[0]->getProdNum());
        die(); */

        $this->render("productos.html.twig", [
            "resultados" => $productos
        ]);
    }

}