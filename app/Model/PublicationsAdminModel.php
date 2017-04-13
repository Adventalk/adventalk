<?php namespace Model;

use \W\Model\Model;

class PublicationsAdminModel extends Model{

//ajouter une publication

    public function ajouterPublication($arrayPublication){
        $this->setPrimaryKey("id_publication");
        $maPublication = $this->insert($arrayPublication);
    }


//update une publication 

    public function updatePublication($arrayPublication, $id){
        $this->setPrimaryKey("id_publication");
        $this->update($arrayPublication, $id);
    }

//Delete une publication 

    public function deletePublication($id){
        $this->setPrimaryKey("id_publication");
        $this->delete($id);
    }

//Récupérer une publication

    public function readPublication($id){
		$this->setPrimaryKey("id_publication");
		return $this->find($id);
    }

//Récupérer toutes les publications

    public function readAllPublications(){
		$this->setPrimaryKey("id_publication");
		return $this->findAll();
    }

}