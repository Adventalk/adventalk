<?php /* app/Model/CommentModel.php */
namespace Model;

use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use \W\View\Plates\PlatesExtensions;

class MembreModel extends UsersModel 
{

	//Ajouter un nouvel utilisateur
	public function ajouterUtilisateur($arrayUser)
	{
		$this->setPrimaryKey("id_membre");

		//création de l'instance
		$security = new AuthentificationModel();

		// $this->setPrimaryKey("id_utilisateur");
		if($this->emailExists($arrayUser['email']))
			return array("retour"=>false, "message"=>"Email exists");

		//Cryptage du password
		$arrayUser["mdp"] = $security->hashPassword($arrayUser["mdp"]);

		//Ajout de l'avatar
		$result = $this->avatarUpload($arrayUser, $_FILES); // $_FILES => Tableau créer par php, il contient les infos des fichiers Uploader
		$arrayUser["avatar"] = $result["filename"];
		$msg = $result["msg"];

		//Ajouter l'utilisateur
		$monUtilisateur = $this->insert($arrayUser);

		//Sauvegarder dans les variables de session
		$security->logUserIn($monUtilisateur);
		
		//retour de l'utilisateur au Controller
		return array("retour"=>true, "message"=>$monUtilisateur);
	}
	//Connexion utilisateur
	public function loginUtilisateur($arrayUser)
	{
		$this->setPrimaryKey("id_membre");
		//création de l'instance
		$security = new AuthentificationModel();
		//vérif email
		if(!$this->emailExists($arrayUser['email']))
			return array("retour"=>false, "message"=>"Email exists");

		//vérif des infos sur l'utilisateur
		$monUtilisateur = $security->isValidLoginInfo($arrayUser["email"], $arrayUser["mdp"]);

		if($monUtilisateur["id_membre"] <= 0)
			return array("retour"=>false, "message"=>"Password exists");//retour de l'utilisateur au Controller

		//Sauvegarder dans les variables de session
		$security->logUserIn($monUtilisateur);
		return array("retour"=>true, "message"=>$monUtilisateur);//retour de l'utilisateur au Controller
	}

	//récupération de toute la table utilisateurs
	public function readAllUser(){
		$this->setPrimaryKey("id_membre");
		return $this->findAll();
	}

	//récupération d'un seul utilisateur
	public function readUser($id){
		$this->setPrimaryKey("id_membre");
		return $this->find($id);
	}

	
    //Api delete utilisateur
    public function userDelete($id){ 
		$this->setPrimaryKey("id_membre");
        $this->delete($id);
    }
	
    //Api update utilisateur
    public function userUpdate($array, $arrayFile, $id){ 
		$this->setPrimaryKey("id_membre");
		$msg = "Utilisateur modifié avec succès !";
		$result = $this->avatarUpload($array, $arrayFile);

		// Ne modifie pas l'avatar si il n'est pas mis à jours
		if($result['newAvatar'] === true ){
			$array["avatar"] = $result["filename"];
			$msg = $result["msg"];
		}

        $this->update($array, $id);
		return $msg;
    }


	//Api pour ajouter AVATAR
    private function avatarUpload($array, $arrayFile){ 
		$msg = "";

		$avatar = 'default.jpg'; // Ajouter Avatar par défaut 
		$newAvatar = false; // Variable pour verifier le changement d'avatar

		if(!empty($arrayFile['avatar']['name'])){
			if($arrayFile['avatar']['error'] == 0){
				$ext = explode('/', $arrayFile['avatar']['type']);
				$ext_autorise = array('jpeg', 'jpg', 'png');

				if(in_array($ext[1], $ext_autorise)){

					// Renomme la photo pour éviter les doublons
					$avatar = $array['id_membre'] . "_" . rand(000000, 999999) . "." . pathinfo($arrayFile['avatar']['name'], PATHINFO_EXTENSION); 
					$avatar = utf8_decode($avatar);

					// enregistrer la photo dans le dossier photo/
					$plates = new PlatesExtensions;
					$chemin_photo = $plates->uploadUrl('gallery/' . $avatar);

					// Copie la photo dans le dossier spécifié
					$target_dir = "upload/avatar/";
					$target_file = $target_dir . basename($avatar);
					move_uploaded_file($arrayFile["avatar"]["tmp_name"], $target_file);
					
					$msg = "Utilisateur créé avec succès" ;
					$newAvatar = true;
					
				}
				else{
					$msg .= 'Extensions autorisées : PNG, JPG, JPEG, GIF';
				}
			}
			else{
				$msg .= 'Veuillez selectionner une autre image';
			}
		} // Fin du if

		return ['msg'=> $msg, 'filename' => $avatar, 'newAvatar' =>$newAvatar];
    }
}
