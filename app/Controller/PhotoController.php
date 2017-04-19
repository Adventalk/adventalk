<?php

namespace Controller;

use \W\Controller\Controller;
use Model\PhotoModel;
use \W\View\Plates\PlatesExtensions;

class PhotoController extends Controller
{

    /* 
    * Ajout photo
    */
    public function create(){

        
        
        if(!empty($_POST)){

            $arrayPost = ['album_id_album' => $_POST['album_id_album'], 'id_photo' => $_POST['id_photo'],  'titre' => $_POST['titre'], 'description' => $_POST['description'],  'statut' => $_POST['statut'], 'localite' => $_POST['localite']];
            $fileFiles = ['photo' => $_FILES['photo']['name']];
            
            

            $dbuser = new PhotoModel();
            $_POST["photo"] = $_FILES['photo']['name'];
            $utilisateur = $dbuser->ajouterPhoto($arrayPost, $fileFiles);
        }


        $this->show('membre/createPhotoAlbum');
    }

    /* 
    * Update utilisateur
    */
    public function update($id){
        $arrayPost = ['album_id_album' => $_POST['album_id_album'], 'id_photo' => $_POST['id_photo'],  'titre' => $_POST['titre'], 'description' => $_POST['description'],  'statut' => $_POST['statut'], 'localite' => $_POST['localite']];
            $fileFiles = ['photo' => $_FILES['photo']['name']];
            
            

            $dbuser = new PhotoModel();
            $_POST["photo"] = $_FILES['photo']['name'];
            $utilisateur = $dbuser->ajouterPhoto($arrayPost, $fileFiles);
        
        if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('membre/createPhotoAlbum',["reponse" => $utilisateur, "erreur" => "champs manquants"]);
                }
            }
            $utilisateur = $photoModel->photoUpdate($_POST, $id);

        }
        $this->show('membre/createPhotoAlbum', ["reponse" => $utilisateur]);
    }

    // public function readAlbum($id){
    //     $this->setPrimaryKey("album_id_membre");
    //     $photoModel = new PhotoModel();
    //     $utilisateur = $photoModel->read($id);
    //     $this->show('membre/createPhotoAlbum', ["reponse" => $utilisateur]);
    // }
    /* 
    * Delete utilisateur
    */
    public function delete($id){
        $this->setPrimaryKey("id_photo");
        $userModel = new PhotoModel();
        $utilisateur = $userModel->readPhoto($id);
        
        if(!empty($_POST)){
            if(isset($_POST["OUI"])){
                $utilisateur = $userModel->photoDelete($id);
            }
        }
        $this->show('membre/createPhotoAlbum', ["reponse" => $utilisateur]);
    }

}
    