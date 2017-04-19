<?php /* app/Model/CommentModel.php */
namespace Model;

use \W\Model\Model;

class AlbumModel extends Model 
{
    public function ajouterAlbum($arrayAlbum){

        $this->setPrimaryKey("id_album");
        
        $monAlbum = $this->insert($arrayAlbum);

        return array("retour"=>true, "message"=>$monAlbum);
    }

    //récupération de toute la table utilisateurs
	public function readAllAlbum(){
		$this->setPrimaryKey("id_album");
		return $this->findAll();
	}

    //récupération d'une ligne de la table
	public function readAlbum($id){
		$this->setPrimaryKey("id_album");
		return $this->find($id);
	}

     //Api delete utilisateur
    public function albumDelete($id){ 
		$this->setPrimaryKey("id_album");
        $this->delete($id);

    }
	
    //Api update utilisateur
    public function albumUpdate($arrayAlbum, $id){ 
		$this->setPrimaryKey("id_album");
        $this->update($arrayAlbum, $id);
    }
}