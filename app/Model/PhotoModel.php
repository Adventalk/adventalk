<?php namespace Model;

use \W\Model\Model;

class PhotoModel extends Model{

//ajouter une Photo

    public function ajouterPhoto($arrayPhoto){
        $this->setPrimaryKey("id_Photo");
        $maPhoto = $this->insert($arrayPhoto);
    }


//update une Photo 

    public function updatePhoto($arrayPhoto, $id){
        $this->setPrimaryKey("id_photo");
        $this->update($arrayPhoto, $id);
    }

//Delete une Photo 

    public function deletePhoto($id){
        $this->setPrimaryKey("id_photo");
        $this->delete($id);
    }

//Récupérer une Photo

    public function readPhoto($id){
		$this->setPrimaryKey("id_photo");
		return $this->find($id);
    }

//Récupérer toutes les Photos

    public function readAllPhotos(){
		$this->setPrimaryKey("id_photo");
		return $this->findAll();
    }

}