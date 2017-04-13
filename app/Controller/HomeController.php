<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UtilisateurModel;

class HomeController extends Controller
{

    /**
    * Page d'accueil
    */
    public function accueil(){
        $this->show('home/accueil');
    }
}