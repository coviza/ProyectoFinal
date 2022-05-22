<?php

namespace App\Repository;

use App\Entity\Pedido;
use App\Core\EntityManager;
use App\Entity\Cliente;
use Doctrine\ORM\EntityRepository;

use Doctrine\Common\Util\Debug;

// En el repositorio van todas las funciones relacionadas con la bbdd
class PedidoRepository extends EntityRepository
{
    //Le tengo que pasar un objeto Cliente 
    //En el repositorio los parametros no existen, son los parametros que recibira DESDE el CONTROLADOR
    public function add($clienteCod, $numeroPedido, $pedidoTipo, $total)
    { //Pasarle como 1er parametro el obligatorio
        /* echo '<pre>';
        Debug::dump($clienteCod);
        die(); */
        $pedido = new Pedido();
        $pedido
            ->setCliente($clienteCod) //Setear primero el que no puede ser nulo(obligatorio)
            ->setPedidoNum($numeroPedido)
            ->setPedidoFecha(new \Datetime())
            ->setFechaEnvio(new \Datetime())
            ->setPedidoTipo($pedidoTipo)
            ->setTotal($total);

        $this->getEntityManager()->persist($pedido);
        $this->getEntityManager()->flush();
        return $pedido;
    }

    /**
     * Recibo como 1er parametro el objeto Pedido proviniente del Controller
     * COmo resto de parametros le paso los campos necesarios para actualizar el Pedido
     */
    public function update($pedido, $cliente, $numeroPedido, $pedidoTipo, $total)
    {
        // echo 'hola';
        // var_dump($pedido);

        // Modifico el pedido que ya existe en bbdd
        $pedido->setCliente($cliente);
        $pedido->setPedidoNum($numeroPedido);
        $tipoa = "A";
        $tipob = "B";
        $tipoc = "C";
        //checkeo que el tipo de pedido sea estrictamente A B o C y lo persisto en la bbdd, si no saldra un error en la pantalla 
        if($pedidoTipo !== $tipoa && $pedidoTipo !== $tipob && $pedidoTipo !== $tipoc) {
            echo "<script type='text/javascript'>alert('Solamente se admiten pedidos de tipo A, B o C');
            </script>";
        }else {
            $pedido->setPedidoTipo($pedidoTipo);
        };
        //checkeo que no se exceda la cantidad maxima permitida
        if($total > 999999.99) {
            echo "<script type='text/javascript'>alert('La cantidad maxima total es de 999999.99');</script>";
        }else {
            $pedido->setTotal($total);
        }
        


        $this->getEntityManager()->persist($pedido);
        $this->getEntityManager()->flush();
        return $pedido;
    }
/**
 * Le paso como parametro el objeto $pedido proviniente del Controller
 * Si existe el NUMERO de pedido, lo elimino de la bbdd 
 * <-- ( if($pedido) exists then remove it and flush it) -->
 */
    public function delete($pedido)
    {
        if ($pedido) {
            $this->getEntityManager()->remove($pedido);
            $this->getEntityManager()->flush();
        }
        return $pedido;
    }
}
