<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Gestion des membres'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>
    <h1>Gestion des membres</h1>
		<div class="boxed">
			<table id="tableau" style="margin:5%">


			</table>
			<input type="submit" id="create" value="Create" >
			<br>
			
			<form method="post" id="formulaire" style="display:none" >
				<input type="hidden" name="id_membre" id="id_membre">
				<input type="hidden" name="photo_actuelle" id="photo_actuelle" value="<?= $photo ?>"/>
				<label for="nom">Nom</label>
				<input type="text" name="nom" id="nom" required><br>

				<label for="prenom">Prénom</label>
				<input type="text" name="prenom" id="prenom" required><br>

				<label for="civilite">Civilité</label>
				<select name="civilite" required>
					<option value="f">Femme</option><br>
					<option value="m">Homme</option><br>
				</select><br>

				<label for="date_naissance">Date de naissance</label>
				<input type="date" name="date_naissance" id="date_naissance" required><br>

				<label for="email">Email</label>
				<input type="email" name="email" id="email" required><br>

				<label for="ville">Ville</label>
				<input type="ville" name="ville" id="ville"><br>

				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" required><br>

				<label for="avatar">Avatar</label>
				<input type="file" name="avatar" id="avatar"/><br/>
				
				<label for="mdp">Mot de passe</label>
				<input type="password" name="mdp" id="mdp" required><br>

				<label for="mdp">Confirmez votre mot de passe</label>
				<input type="password" name="mdp" id="mdp" required><br>
				
				<label for="statut">Statut</label>
				<select name="statut" required>
					<option value="0">Membre</option><br>
					<option value="1">Admin</option> <br>
				</select><br>

				<label for="rang">Rang</label>
				<select name="rang" required>
					<option value="Aspirant Voyageur">Aspirant Voyageur</option><br>
					<option value="Voyageur Amateur">Voyageur Amateur</option><br>
					<option value="Globe Trotter">Globe Trotter</option><br>
					<option value="Grand Explorateur">Grand Explorateur</option><br>
					<option value="Voyageur Intergalactique">Voyageur Intergalactique</option><br>
				</select><br>
				

				<input type="submit" value="Enregistrer">
			</form>

		</div>
<?php 
//fin du bloc
$this->stop('main_content'); ?>


<!-- JAVASCRIPT / CONTROLLER
    $(function(){ // lecture au chargement du document

	var Jeremy = 1;

	function appelleJquery(){ // fonction pour appeler le Jquery 

		$("#create").on("click", function(e){
			cleanForm();
			$('#formulaire').show();
			Jeremy = 2;
		})
		// End function create

		// Function delete 1 utilisateur ///////////////////////////////////
		$(".delete").on("click", function(e){ 

			var mydata = "id="+$(this).attr("Jeremy");
			
			if(confirm("Etes vous sur de vouloir supprimer ce membre?")){

				$.ajax({
				url: "http://localhost/php_objet/CRUD/delete.php",
				type: "post",
				data: mydata,
				success: function(reponse){
					totalUser(true);
					}
				})
			}

		});
		// End function delete /////////////////////////////////////////////
		

		// Function recherche 1 utilisateur ////////////////////////////////////
		$(".search").on("click", function(e){ 

			var mydata = "id="+$(this).attr("Jeremy");
			
			$.ajax({
			url: "http://localhost/php_objet/CRUD/read.php",
			type: "post",
			data: mydata,
			success: function(reponse){
					var utilisateur = JSON.parse(reponse);

					console.info(utilisateur);
					console.log(reponse)
					$("#nom").val(utilisateur.nom);
					$("#prenom").val(utilisateur.prenom);
					$("#post").val(utilisateur.post);
					$("#id").val(utilisateur.id);
					$("#formulaire").show();
					Jeremy = 1;
				}
			})

		});
		// End function search ////////////////////////////////////
	} // End function appelleJquery ///////////////////////////////////

		// Function add un utilisateur ///////////////////////////////////////
		$("#formulaire").on("submit", function(e){ 
			// evenement à l'envoi du formmulaire -> Evenement = e

			e.preventDefault();

			var myUrl = (Jeremy == 1)?"http://localhost/php_objet/CRUD/update.php" : "http://localhost/php_objet/CRUD/create.php"
			// console.log($('#formulaire').serialize()); // test récupération champs input
			$.ajax({
				url: myUrl,
				type: "post",
				data: $("#formulaire").serialize(),
				success: function(reponse){
						console.log(reponse)
						totalUser(true);
					
				}
			})

		});
		// End function add ////////////////////////////////////////
	


	function totalUser(total = false){
		$.ajax({
			url: "http://localhost/php_objet/CRUD/read.php",
			type: "post",
			success: function(reponse){

					reponse = JSON.parse(reponse); // Réponse est un tableau d'objet

					if(total == false){
						var option = "";
						for(var elem in reponse){
							option += "<option value='"+reponse[elem].id+"'>"+reponse[elem].nom+"</option>";
						}
						
						$("#listeUser").html(option);
					}
					else{
						var tableau = "<tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Post</th><th>Options</th></tr>";
						for(var elem in reponse){
							tableau += "<tr><td>"+reponse[elem].id+"</td><td>"+reponse[elem].nom+"</td><td>"+reponse[elem].prenom+"</td><td>"+reponse[elem].post+"</td><td><input type='submit' Jeremy='"+reponse[elem].id+"' id='search' class='search' value='search'><input type='submit' Jeremy='"+reponse[elem].id+"' id='delete' class='delete' value='delete'></td></tr>";
						}
						
						$("#tableau").html(tableau);
					}
				appelleJquery();
				}

		})
	} // End function totalUser() //////////////////////////////////////

	function cleanForm(){
		var input = $("input[type=text]");
		for(var i = 0; i < input.length; i++){
			input[i].value = "";
		}

	} // End cleanForm ///////////////////////////////////////////

	if($("#listeUser").length){
		totalUser();
	}
	else{
		totalUser(true);
	}

});	// End function chargement ////////////////////////////////////////



************************ PHP *********************************************
/////////////////////////// UPDATE /////////////////////////
    header("Access-Control-Allow-Origin: *");
	require "connexion.php";
	$con = new Connect();
	$con->update($_POST["id"], $_POST["nom"], $_POST["prenom"], $_POST["post"]);



/////////////////////////// DELETE /////////////////////////
	header("Access-Control-Allow-Origin: *");
	require "connexion.php";
	$con = new Connect();

	// fonctions pour supprimer un utilisateur
	$con->delete($_POST["id"]);


/////////////////////////// CREATE /////////////////////////
    header("Access-Control-Allow-Origin: *");
	require "connexion.php";
	$con = new Connect();
	$con->insert($_POST["nom"], $_POST["prenom"], $_POST["post"]);



/////////////////////////// READ /////////////////////////
    header("Access-Control-Allow-Origin: *");
        require "connexion.php";
        $con = new Connect();

        // fonctions pour lecture un/des utilisateur(s)
        if(isset($_POST["id"])){
            
            echo json_encode($con->read($_POST["id"]));
        }
        else{
            echo json_encode($con->readAll());
        }

/////////////////////////// CONNEXION /////////////////////////
    class Connect{

	private $connt; // variable de connexion

	function __construct(){ // constructeur
		$this -> connt = new PDO ("mysql:host=localhost;dbname=personne", "root", ""); // instance PDO -> Connexion BDD
		$this -> connt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs
		return $this->connt; // return variable
	}


	// inserer un utilisateur
	/*
		* Fonction d'insertion dans la table utilisateur
		* $nom est un string
		* $prenom est un string
		* $post est un string
		* return l'id de l'utilisateur = integer
	*/
	function insert($nom, $prenom,$post){
		$this -> connt-> query(
			"INSERT INTO `utilisateurs`(`nom`,`prenom`, `post`) 
			VALUES ('".$nom."', '".$prenom."', '".$post."')");
		return $this->connt->lastInsertId();
	}


	// update d'un utilisateur
	/*
		* Fonction de modification d'un utilisateur
		* $nom est un string
		* $prenom est un string
		* $post est un string
		* $id est un integer
	*/
	function update($id, $nom, $prenom, $post){
		$this -> connt-> query(
			"UPDATE `utilisateurs` SET `nom` = '$nom', `prenom` = '$prenom', `post` = '$post' WHERE `id` = $id");
	}

	// delete un utilisateur
	/*
		* Fonction de suppression dans la table utilisateur
		* $nom est un string
		* $prenom est un string
		* $post est un string
		* return l'id de l'utilisateur = integer
	*/
	function delete($id){
		$this->connt->query(
			"DELETE FROM `utilisateurs` WHERE `id` = $id");
	}

	// récupérer les infos d'un utilisateur
	/*
		* Fonction de récupération des infos d'un utilisateur
		* $id est un integer
		* retourne les infos d'un utilisateurs
	*/
	function read($id){
		$data = $this -> connt-> query(
			"SELECT * FROM `utilisateurs` WHERE `id` = $id");
		$result = $data -> fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	// récupérer les infos de tous les utilisateurs
	/*
		* Fonction de récupération des infos d'un utilisateurs
		* retourne les infos de tous les utilisateurs
	*/
	function readAll(){
		$data = $this -> connt-> query(
			"SELECT * FROM `utilisateurs`");
		$result = $data -> fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}


	
}
-->