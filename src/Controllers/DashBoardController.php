<?php

namespace App\Controllers;

use App\Core\AbstractController;

class DashBoardController extends AbstractController
{
   public function dashBoard()
   {
      $this->render("dashboard.html.twig", []);
   }
}
