<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MembreModel;
use Model\PhotoModel;

class ApiController extends Controller
{

    /**
    * API CREATE
    */
    public function create(){  
        $arrayPost = [ 'id_membre' => $_POST['id_membre'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'],  'civilite' => $_POST['civilite'], 'date_naissance' => $_POST['date_naissance'], 'email' => $_POST['email'], 'ville' => $_POST['ville'], 'pseudo' => $_POST['pseudo'], 'mdp' => $_POST['mdp'],  'statut' => $_POST['statut'], 'rang' => $_POST['rang']];
        $userModel = new MembreModel();
        $this->showJson($userModel->ajouterUtilisateur($arrayPost, $_FILES));
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
        $this->showJson($userModel->userUpdate($_POST, $_FILES, $id));
    }
    /**
    * API DELETE
    */
    public function delete($id){
        $userModel = new MembreModel();
        $this->showJson($userModel->userDelete($id));
    }




        //////////////////// PHOTO ////////////////////
    /**
    * API CREATE
    */
    public function createPhoto(){
        $arrayPost = ['album_id_album' => $_POST['album_id_album'], 'id_photo' => $_POST['id_photo'], 'photo' => $_FILES['photo']["name"], 'titre' => $_POST['titre'], 'description' => $_POST['description'],  'statut' => $_POST['statut'], 'localite' => $_POST['localite']];
        $photoModel = new PhotoModel();
        $this->showJson($photoModel->ajouterPhoto($arrayPost, $_FILES));
    }

    /**
    * API READAll
    */
    public function readAllPhotos(){
        $photoModel = new PhotoModel();
        $this->showJson($photoModel->readAllPhotos());
    }
    /**
    * API READ
    */
    public function readPhoto($id){
        $photoModel = new PhotoModel();
        $this->showJson($photoModel->readPhoto($id));
    }
    /**
    * API UPDATE
    */
    public function updatePhoto($id){
        $photoModel = new PhotoModel();
        $this->showJson($photoModel->photoUpdate($arrayPost, $id));
    }
    /**
    * API DELETE
    */
    public function deletePhoto($id){
        $photoModel = new PhotoModel();
        $this->showJson($photoModel->photoDelete($id));
    }
}