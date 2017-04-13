<?php namespace Model;

use \W\Model\Model;

class MessageModel extends Model{
    
//ajouter un Message

    public function ajouterMessage($arrayMessage){
        $this->setPrimaryKey("id_message");
        $maPublication = $this->insert($arrayMessage);
    }

//update un Message 

    public function updateMessage($arrayMessage, $id){
        $this->setPrimaryKey("id_message");
        $this->update($arrayMessage, $id);
    }

//Delete un Message 

    public function deleteMessage($id){
        $this->setPrimaryKey("id_message");
        $this->delete($id);
    }

//Récupérer un Message

    public function readMessage($id){
		$this->setPrimaryKey("id_message");
		return $this->find($id);
    }

//Récupérer tous les Messages

    public function readAllMessages(){
		$this->setPrimaryKey("id_message");
		return $this->findAll();
    }


}