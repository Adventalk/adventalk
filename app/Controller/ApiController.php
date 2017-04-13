<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MembreModel;

class ApiController extends Controller
{

    /**
    * API CREATE
    */
    public function create(){
        
            $arrayPost = [ 'id_membre' => $_POST['id_membre'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'],  'civilite' => $_POST['civilite'], 'date_naissance' => $_POST['date_naissance'], 'email' => $_POST['email'], 'ville' => $_POST['ville'], 'pseudo' => $_POST['pseudo'], 'avatar' => $_POST['avatar'], 'mdp' => $_POST['mdp'],  'rang' => $_POST['rang']];
        $userModel = new MembreModel();
        $this->showJson($userModel->ajouterUtilisateur($arrayPost));
    }

    /**
    * API READAll
    */
    public function readAll(){
        $userModel = new MembreModel();
        $this->showJson($userModel->readAllUser());
}
    /**
    * API READ
    */
    public function read($id){
        $userModel = new MembreModel();
        $this->showJson($userModel->readUser($id));
}
    /**
    * API UPDATE
    */
    public function update($id){
        $userModel = new MembreModel();
        $this->showJson($userModel->userupdate($_POST, $id));
        }
    /**
    * API DELETE
    */
    public function delete($id){
        $userModel = new MembreModel();
        $this->showJson($userModel->userDelete($id));
    }
}