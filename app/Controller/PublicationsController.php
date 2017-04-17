<?php

namespace Controller;

use \W\Controller\Controller;
use Model\PublicationsAdminModel;

class PublicationsController extends Controller
{

    /* 
    * Création publication
    */
    public function create(){
        if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('gestion/gestionPublications/crudPublication');
                }
            }
            $dbPublication = new PublicationsAdminModel();
            $publication = $dbPublication->ajouterPublication($_POST);

        }
        $this->show('gestion/gestionPublications/crudPublication');
    }

    /* 
    * Update publication
    */
    public function update($id){
        $dbPublication = new PublicationsAdminModel();
        $publication = $dbPublication->readPublication($id);
        
        if(!empty($_POST)){
            foreach($_POST as $elem){
                if(empty($elem)){
                    $this->show('gestionPublications/crudPublication',["reponse" => $publication, "erreur" => "champs manquants"]);
                }
            }
            $publication = $dbPublication->updatePublication($_POST, $id);

        }
        $this->show('gestionPublications/crudPublication', ["reponse" => $publication]);
    }


    /* 
    * Delete utilisateur
    */
    public function delete($id){
        $this->setPrimaryKey("id_publication");
        $dbPublication = new PublicationsAdminModel();
        $publication = $dbPublication->readPublication($id);
        
        if(!empty($_POST)){
            if(isset($_POST["OUI"])){
                $publication = $dbPublication->deletePublication($id);
            }
        }
        $this->show('gestionMembres/crudMembre', ["reponse" => $utilisateur]);
    }

}
    