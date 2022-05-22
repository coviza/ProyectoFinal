<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Cliente;
use App\Entity\Detalle;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\ClienteRepository;
use App\Repository\DetalleRepository;

class LoginController extends AbstractController
{
   public function loginAttempt()
   {
      /* if(!isset($_SESSION['nombre'])) {
         echo "You are not registered to our app. We are sorry :(";
      } */

      if (isset($_POST['nombre'])) { //Si existe $_POST le asigno el name y el password introducidos por formulario
         $username = $_POST['nombre'];
         $clienteCod = $_POST['cliente_cod'];
      } else { //Si no vengo del formulario es pq existe una sesion previa 
         $username = $_SESSION['nombre'];
         $clienteCod = $_SESSION['cliente_cod'];
      }

      $entityManager = (new EntityManager())->get();
      $clienteRepository = $entityManager->getRepository(Cliente::class);
      $cliente = $clienteRepository->findOneBy(['nombre' => $username, 'clienteCod' => $clienteCod]);

      $detalleRepository = $entityManager->getRepository(Detalle::class);
      $detalle = $detalleRepository->findAll(); 
      //$cliente->mayusculas(); hariamos uso de un metodo declarado en la entidad Cliente
      /* -El primer parametro corresponde a la variable de la entidad LITERALMENTE definido en la Entidad pero sin el $
         -El parametro se llama igual que la variable definida en la Entidad, NO COMO EL NAME DE LA BBDD */
      // var_dump($cliente->getEmp());
      if (!isset($_SESSION['nombre'])) { //Si no existe la session, creo la session   
         // $_SESSION['idAgent'] = $agent->getIdAgent();
         $_SESSION['nombre'] = $cliente->getNombre();
         $_SESSION['cliente_cod'] = $clienteCod;
      }
      //  var_dump($_SESSION);
      // var_dump($cliente->getPedido()[0]->getPedidoNum());
      $this->render('profile.html', [
         "resultados" => $cliente,
         "session" => $_SESSION["nombre"],
         "detalles" => $detalle
      ]);
   }
   /**
    * Funcion logout para salir de la sesion
    * La establezco en 'null' y destuyo la sesion
    * Redirigo a la la ruta '/' 
    */
   public function logout() {
      $_SESSION = null;
      session_destroy();
      header('location:/');
   }
}
