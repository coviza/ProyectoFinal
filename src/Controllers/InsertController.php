<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Pedido;
use App\Entity\Cliente;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\PedidoRepository;

use Doctrine\Common\Util\Debug;


class InsertController extends AbstractController {
    public function insertPedidos() {
        /**
         * Esto me deberia de llegar desde un formulario a traves de $_POST
         */
       /*  $numeroPedido = 623;
        $clienteCodigo = 100;
        $tipoPedido = 'C'; 
        $total = 4.5; */
        $numeroPedido = $_POST['num'];
        $clienteCodigo = $_POST['cod'];
        $tipoPedido = $_POST['tipo']; 
        $total = $_POST['total'];
        // var_dump($_POST);
        
        $entityManager = (new EntityManager())->get(); //llamo al EM
        
        $pedidoRepository = $entityManager->getRepository(Pedido::class);  //Cargo los Repositorios que usare mas adelante
        $clienteRepository = $entityManager->getRepository(Cliente::class); //Cargo los Repositorios que usare mas adelante
        /**
         * Aqui en este punto parariamos de hacer codigo para poder debugear y empezar el Repositorio 
         * con la funcion que utilizaremos para hacer la insercion
         */
        /**
         * Tengo que buscar el campo que sea obligatorio y obtener el objeto de esa Entidad, es decir en este caso un objeto de la entidad Cliente pasandole como parametro el codigo cliente
         */
        $cliente = $clienteRepository->find($clienteCodigo); //el metodo find() me devuelve un objeto pasandole como parametro el codigo del cliente, el findOneBy() un objeto pero puedo buscar por diferentes columnas
        /* echo '<pre>';
        Debug::dump($numeroPedido);
        die(); */
        $pedido = $pedidoRepository->add($cliente, $numeroPedido, $tipoPedido, $total);
    
        header('location:/profile');  //redirigo a la vista que quiera

    }
}