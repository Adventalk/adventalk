<?php namespace Model;

use \W\Model\Model;

class AlbumsModel extends Model{
    
//ajouter un album

    public function ajouterAlbum($arrayAlbum){
        $this->setPrimaryKey("id_album");
        $maPublication = $this->insert($arrayAlbum);
    }

//update un album 

    public function updateAlbum($arrayAlbum, $id){
        $this->setPrimaryKey("id_album");
        $this->update($arrayAlbum, $id);
    }

//Delete un album 

    public function deleteAlbum($id){
        $this->setPrimaryKey("id_album");
        $this->delete($id);
    }

//Récupérer un album

    public function readAlbum($id){
		$this->setPrimaryKey("id_album");
		return $this->find($id);
    }

//Récupérer tous les albums

    public function readAllAlbums(){
		$this->setPrimaryKey("id_album");
		return $this->findAll();
    }


}