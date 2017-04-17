<?php

namespace Controller;

use \W\Controller\Controller;
use Model\MembreModel;

class MembresController extends Controller
{
    /* 
    * Création utilisateur
    */
    public function create(){
        $msg = "" ;
        if(!empty($_POST)){

            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('gestion/gestionMembres/crudMembre');
                }
            }
            
            $dbuser = new MembreModel();
            $utilisateur = $dbuser->ajouterUtilisateur($_POST);
        }
        $this->show('gestion/gestionMembres/crudMembre', ["msg" => $msg] );
    }

    /* 
    * Update utilisateur
    */
    public function update($id){
        $msg = "" ;
        $userModel = new MembreModel();
        $utilisateur = $userModel->readUser($id);
        
        if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('gestionMembres/crudMembre',["reponse" => $utilisateur, "erreur" => "champs manquants"]);
                }
            }
            $utilisateur = $userModel->userUpdate($_POST, $id);
            $msg = "Utilisateur modifié avec succès" ;
        }
        $this->show('gestionMembres/crudMembre', ["reponse" => $utilisateur, "msg" => $msg] );
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
                $utilisateur = $userModel->userDelete($id);
            }
        }
        $this->show('gestionMembres/crudMembre', ["reponse" => $utilisateur]);
    }
    
    /*
     *  Affichage d'un membre
     */
    public function profil(){
        //$this->setPrimaryKey("id_membre");
        $userModel = new MembreModel();
        // permet de récupérer l'utilisateur
        $showProfil = $this->getUser();
        $this->show('membre/profil', ["profil" => $showProfil]);
    }
}
    