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

             $msg = "";

            // Traitement sur les photos :
            $nom_photo = 'default.jpg';

            if(isset($_POST['userfile'])){ 
                $nom_photo = $_POST['userfile'];
            }

            if(!empty($_FILES['userfile']['name'])){ // Si l'utilisateur a utilisé le champ file
                if($_FILES['userfile']['error'] == 0){
                    $ext = explode('/', $_FILES['userfile']['type']);
                    $ext_autorise = array('jpeg', 'jpg', 'png');

                    if(in_array($ext[1], $ext_autorise)){

                        // Renomme la photo pour éviter les doublons
                        $nom_photo = rand(000000, 999999) . '_' . $_FILES['userfile']['name']; 
                        $nom_photo = utf8_decode($nom_photo);

                        // enregistrer la photo dans le dossier photo/
                        $plates = new PlatesExtensions;
                        $chemin_photo = $plates->uploadUrl('gallery/' . $nom_photo);
                        // C:\xampp\htdocs\GoOut_W\public

                        // Copie la photo dans le dossier spécifié
                        $target_dir = "upload/gallery/";
                        $target_file = $target_dir . basename($nom_photo);
                        move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file);

                    }
                    else{
                        $msg .= '<div class="error">Extensions autorisées : PNG, JPG, JPEG, GIF</div>';
                    }
                }
                else{
                    $msg .= '<div class="error">Veuillez selectionner une autre image</div>';
                }
            } // Fin du if(!empty($_FILES['photo']['name']))

            $dbuser = new PhotoModel();
            $_POST["photo"] = $_FILES['userfile']['name'];
            $utilisateur = $dbuser->ajouterPhoto($_POST);

           

        }
        $this->show('membre/createPhotoAlbum');
    }

    /* 
    * Update utilisateur
    */
    public function update($id){
        $userModel = new PhotoModel();
        $utilisateur = $userModel->readPhoto($id);
        
        if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('membre/createPhotoAlbum',["reponse" => $utilisateur, "erreur" => "champs manquants"]);
                }
            }
            $utilisateur = $userModel->photoUpdate($_POST, $id);

        }
        $this->show('membre/createPhotoAlbum', ["reponse" => $utilisateur]);
    }


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
    