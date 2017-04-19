<?php /* app/Model/CommentModel.php */
namespace Model;

use \W\Model\Model;
use \W\View\Plates\PlatesExtensions;

class PhotoModel extends Model 
{
    //Ajouter un nouvel utilisateur
	public function ajouterPhoto($arrayPost, $fileFiles)
	{

		$this->setPrimaryKey("id_photo");

		$maPhoto = $this->registerFilePhoto($arrayPost, $fileFiles);

		//retour de l'utilisateur au Controller
		return array("retour"=>true, "message"=>$maPhoto);
    }
	
	//récupération de toute la table utilisateurs
	public function readAllPhotos(){
		$this->setPrimaryKey("id_photo");
        
		    return $this->findAll();
	}

	//récupération des infos d'une photo
	public function readPhoto($id){
		$this->setPrimaryKey("id_photo");
		return $this->find($id);
	}


	
    //Api delete utilisateur
    public function photoDelete($id){ 
		$this->setPrimaryKey("id_photo");
        $this->delete($id);

    }
	
    //Api update utilisateur
    public function photoUpdate($arrayPost, $id){ 
		$this->setPrimaryKey("id_photo");
        $this->update($arrayPost, $id);

    }

    public function registerFilePhoto($array, $files){
             $msg = "";

            // Traitement sur les photos :
            $nom_photo = 'default.jpg';

            $arrayPost = ['album_id_album' => $_POST['album_id_album'], 'id_photo' => $_POST['id_photo'],  'titre' => $_POST['titre'], 'description' => $_POST['description'],  'statut' => $_POST['statut'], 'localite' => $_POST['localite']];
            $fileFiles = ['photo' => $files['photo']['name']];

            if(!empty($files['photo']['name'])){ // Si l'utilisateur a utilisé le champ file
                if($files['photo']['error'] == 0){
                    $ext = explode('/', $files['photo']['type']);
                    $ext_autorise = array('jpeg', 'jpg', 'png');

                    if(in_array($ext[1], $ext_autorise)){

                        // Renomme la photo pour éviter les doublons
                        $nom_photo = $_POST['album_id_album'] . '_' . $_POST['titre']  . '_' .  $files['photo']['name'];; 
                        //$nom_photo = utf8_decode($nom_photo);

                        // enregistrer la photo dans le dossier photo/
                        $plates = new PlatesExtensions();
                        $chemin_photo = $plates->uploadUrl('gallery/' . $nom_photo);

                        // Copie la photo dans le dossier spécifié
                        $target_dir = "upload/gallery/";
                        $target_file = $target_dir . basename($nom_photo);
                        move_uploaded_file($files["photo"]["tmp_name"], $target_file);

                    }
                    else{
                        $msg .= '<div class="error">Extensions autorisées : PNG, JPG, JPEG, GIF</div>';
                    }
                }
                else{
                    $msg .= '<div class="error">Veuillez selectionner une autre image</div>';
                }
            } // Fin du if(!empty($files['photo']['name']))

            $array["photo"] = $files['photo']['name'];
            $utilisateur = $this->insert($array, $fileFiles);
            return $utilisateur;
     
    }

    
}
