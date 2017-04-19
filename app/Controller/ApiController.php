<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MembreModel;
use Model\PhotoModel;
use Model\AlbumModel;

class ApiController extends Controller
{

/*************************************************************************************
//////////////////////////////////////// MEMBRES ////////////////////////////////////*
/**********************************************************************************/

    /**
    * API CREATE
    */
    public function create(){  
        $arrayPost = [ 'id_membre' => $_POST['id_membre'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'],  'civilite' => $_POST['civilite'], 'date_naissance' => $_POST['date_naissance'], 'email' => $_POST['email'], 'ville' => $_POST['ville'], 'localite_actuelle' => $_POST['localite_actuelle'], 'pseudo' => $_POST['pseudo'], 'mdp' => $_POST['mdp'],  'statut' => $_POST['statut'], 'rang' => $_POST['rang']];
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

/*************************************************************************************
////////////////////////////////////////// PHOTO ////////////////////////////////////*
/**********************************************************************************/
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
        $arrayPost = ['album_id_album' => $_POST['album_id_album'], 'id_photo' => $_POST['id_photo'], 'photo' => $_FILES['photo']["name"], 'titre' => $_POST['titre'], 'description' => $_POST['description'],  'statut' => $_POST['statut'], 'localite' => $_POST['localite']];
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

     //////////////////// ALBUM ////////////////////
    /**
    * API CREATE
    */
    public function createAlbum(){
        $arrayAlbum = ['id_album' => $_POST['id_album'], 'membre_id_membre' => $_POST['membre_id_membre'], 'titre' => $_POST['titre'], 'description' => $_POST['description']];
        $albumModel = new AlbumModel();
        $this->showJson($albumModel->ajouterAlbum($arrayAlbum));
    }
    /**
    * API READAll
    */
    public function readAllAlbum(){
        $albumModel = new AlbumModel();
        $this->showJson($albumModel->readAllAlbum());
    }

      /**
    * API READ
    */
    public function readAlbum($id){
        
        $albumModel = new AlbumModel();
        $this->showJson($albumModel->readalbum($id));
    }

     /**
    * API UPDATE
    */
    public function updateAlbum($id){
        $arrayAlbum = ['id_album' => $_POST['id_album'], 'membre_id_membre' => $_POST['membre_id_membre'], 'titre' => $_POST['titre'], 'description' => $_POST['description']];
        $albumModel = new AlbumModel();
        $this->showJson($albumModel->albumUpdate($arrayAlbum, $id));
    }

    /**
    * API DELETE
    */
     public function deleteAlbum($id){
        $albumModel = new AlbumModel();
        $this->showJson($albumModel->albumDelete($id));
    }
   
/*************************************************************************************
///////////////////////////////////// GOOGLE MAP ////////////////////////////////////*
/**********************************************************************************/
    
    /*
    API récupération des données membres à afficher sur la map Google
    */
       
	public function maps(){	
		 $localiteBDD = new MembreModel();
         $this->showJson($localiteBDD->googleMap());
	}
}