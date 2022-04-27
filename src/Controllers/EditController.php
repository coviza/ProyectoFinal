<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Pedido;
use App\Entity\Cliente;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\PedidoRepository;

use Doctrine\Common\Util\Debug;

/**
 * Este Controlador se encarga de la actualizacion de Pedidos
 * Funcion editPedidos() para mostrar el formulario de edicion de pedidos 
 * 1.Obtengo el EM
 * 2.Accedo al Repositorio
 * 3.Obtengo el objeto de la CLAVE PRIMARIA de la Entidad Pedido
 * - Renderiza la vista que utilizo para editar el pedido
 */
class EditController extends AbstractController
{
    /**
     * $numPedido viene del template profile.html 
     */
    public function editPedidos($numPedido)
    {
        // echo $numPedido;
        $entityManager = (new EntityManager())->get();                            //1
        $pedidoRepository = $entityManager->getRepository(Pedido::class);         //2
        $pedido = $pedidoRepository->find($numPedido);                            //3

        $this->render('update.html', [
            "info" => $pedido
        ]);
    }

    /**
     * * Funcion updatePedidos() para realizar la actualizacion del pedido.
     * - Modifica el pedido en bbdd
     * 1.Obtengo los campos de la Entidad Pedido a traves del formulario ($_POST[])
     * 2.Creo una instancia del EM, Accedo al Repositorio
     * 3.Obtengo el objeto Pedido a traves de su clave Primaria ('num' en el formulario) 
     * 4.Desde el Controlador le mando el objeto Pedido al Repositorio
     */
    public function updatePedidos()
    {
        // var_dump($_POST);
        $clienteCod = $_POST['cod'];                                                //1
        $numeroPedido = $_POST['num'];
        $pedidoTipo = $_POST['tipo'];
        $total = $_POST['total'];

        $entityManager = (new EntityManager())->get();                              //2
        $pedidoRepository = $entityManager->getRepository(Pedido::class);           //3
        $pedido = $pedidoRepository->find($_POST['num']);                           //4

        /**
         * Para poder modificar el Pedido, me hace falta el objeto entero de Cliente en el PedidoRepositoriy
         * por eso le paso el objeto a traves del metodo find() de la variable $clienteRepository
         * 
         */
        $clienteRepository = $entityManager->getRepository(Cliente::class);
        $cliente = $clienteRepository->find($_POST['cod']);

        $pedido = $pedidoRepository->update($pedido, $cliente, $numeroPedido, $pedidoTipo, $total);
        //Almaceno el pedido actualizado en la variable $pedidoActualizado
        $pedidoActualizado = $pedidoRepository->find($_POST['num']);
        //Muestro el pedido actualizado
        $this->render('update.html', [
            "info" => $pedidoActualizado
        ]);
    }

    /**
     * 1.Obtengo una nueva instancia del EM
     * 2.Accedo al Repositorio de la Entidad Pedido
     * 3.Accedo al numero de Pedido a traves del metodo find() del Repositorio, es decir, 
     * obtengo el objeto que coincide con los criterios de busqueda
     * 4.Llamo a la funcion delete($pedido) que tengo creada en el Repositorio y le paso como parametro el objeto $pedido
     * 5.Renderizo la vista 'msgBorrado.html' despues de borrar el registro
     * 5.b. Redirigo a la ruta '/profile'
     */
    public function deletePedidos($numPedido)
    {
        // echo $numPedido;
        $entityManager = (new EntityManager())->get();
        $pedidoRepository = $entityManager->getRepository(Pedido::class);
        $pedido = $pedidoRepository->find($numPedido); //$numPedido equivale lo que le concateno al template en la ruta                         //3
        $pedido = $pedidoRepository->delete($pedido);                           //4

        $this->render('msgBorrado.html', []);                                   //5
        // header('location:/profile');                                         //5.b
    }
}
