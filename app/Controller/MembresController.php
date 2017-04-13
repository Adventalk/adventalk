<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UtilisateurModel;

class MembresController extends Controller
{

    /* 
    * Création utilisateur
    */
    public function create(){
        if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('gestion/gestionMembres/crudMembre');
                }
            }
            $dbuser = new MembreModel();
            $utilisateur = $dbuser->ajouterUtilisateur($_POST);

        }
        $this->show('gestion/gestionMembres/crudMembre');
    }

    /* 
    * Update utilisateur
    */
    public function update($id){
        $userModel = new MembreModel();
        $utilisateur = $userModel->readUser($id);
        
        if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('gestionMembres/crudMembre',["reponse" => $utilisateur, "erreur" => "champs manquants"]);
                }
            }
            $utilisateur = $userModel->update($_POST, $id);

        }
        $this->show('gestionMembres/crudMembre', ["reponse" => $utilisateur]);
    }


    /* 
    * Delete utilisateur
    */
    public function delete($id){
        $this->setPrimaryKey("id_membre");
        $userModel = new MembreModel();
        $utilisateur = $userModel->readUser($id);
        
        if(!empty($_POST)){
            if(isset($_POST["OUI"])){
                $utilisateur = $userModel->delete($id);
            }
        }
        $this->show('gestionMembres/crudMembre', ["reponse" => $utilisateur]);
    }

}
    