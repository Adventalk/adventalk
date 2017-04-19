<?php

namespace Controller;

use \W\Controller\Controller;
use Model\AlbumModel;

class AlbumController extends Controller
{

    public function create(){
            if(!empty($_POST)){
              $arrayAlbum = ['id_album' => $_POST['id_album'], 'membre_id_membre' => $_POST['membre_id_membre'], 'titre' => $_POST['titre'], 'description' => $_POST['description']];
        
                $dbuser = new AlbumModel();
                $album = $dbuser->ajouterAlbum($arrayAlbum);

            }
            $this->show('membre/createAlbum');
    }

    public function update($id){
        $albumModel = new AlbumModel();
        $utilisateur = $albumModel->readAlbum($id);
        
        if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('membre/createAlbum',["reponse" => $utilisateur, "erreur" => "champs manquants"]);
                }
            }
            $utilisateur = $albumModel->albumUpdate($_POST, $id);

        }
        $this->show('membre/createAlbum', ["reponse" => $utilisateur]);
    }

     public function delete($id){
        $this->setPrimaryKey("id_album");
        $albumModel = new AlbumModel();
        $utilisateur = $albumModel->readAlbum($id);
        
        if(!empty($_POST)){
            if(isset($_POST["OUI"])){
                $utilisateur = $albumModel->albumDelete($id);
            }
        }
        $this->show('membre/createAlbum', ["reponse" => $utilisateur]);
    }
}