$(function(){ // lecture au chargement du document

	var membre_id = 0;

	function appelleJquery(){ // fonction pour appeler le Jquery 

		// Fonction pour AFFICHER le formulaire de création d'un membre
		$("#create").on("click", function(e){
			cleanForm();
			$("#mdp").attr("name", "password");
			$('#formulaire').show();
			$("#form-mdp").show();
			$('#resultat-msg').text("");
			$("#mdp").attr("required", true);
			$("#mdp-confirm").attr("required", true);
			membre_id = 0;
		})
		// Fin de la fonction CREER

		// Fonction pour SUPPRIMER un utilisateur
		$(".delete").on("click", function(e){
			if(confirm("Etes vous sur de vouloir supprimer ce membre?")){
				$.ajax({
					url: "http://localhost/adventalk/public/api/delete/"+$(this).attr("membre_id"),
					type: "post",
					success: function(reponse){
						totalUser(true);
						$("#resultat-msg").text(reponse.message);
					}
				})
			}

		});
		// Fin de la fonction SUPPRIMER
		
		// Fonction pour RECHERCHER un utilisateur
		$(".search").on("click", function(e){
			$('#resultat-msg').text("");
			
			cleanForm();
			$.ajax({
				url: "http://localhost/adventalk/public/api/read/"+$(this).attr("membre_id"),
				type: "post",
				success: function(reponse){
					var utilisateur = (reponse);

					console.info(utilisateur);
					//console.log(reponse)
					
					$("#id_membre").val(utilisateur.id_membre);
					$("#nom").val(utilisateur.nom);
					$("#prenom").val(utilisateur.prenom);
					$('#civilite option[value="' + utilisateur.civilite + '"]').prop('selected', true);
					$("#date_naissance").val(utilisateur.date_naissance);
					$("#email").val(utilisateur.email);
					$("#ville").val(utilisateur.ville);
					$("#pseudo").val(utilisateur.pseudo);
					$("#avatarUser").attr("src", "http://localhost/adventalk/public/upload/avatar/" + utilisateur.avatar);
					$('#statut option[value="' + utilisateur.statut + '"]').prop('selected', true);
					$('#rang option[value="' + utilisateur.rang + '"]').prop('selected', true);	




					// $("#mdp").removeAttr("name"); // Suppression ??
					
					$("#formulaire").show();
					$("#form-mdp").hide();
					$("#mdp").attr("required", false);
					$("#mdp-confirm").attr("required", false);

					membre_id = utilisateur.id;
				}

			})

		});
		// Fin de la fonction RECHERCHE

	} // Fin fonction appelleJquery

	// Fonction pour AJOUTER ET MODIFIER un utilisateur
	$("#formulaire").on("submit", function(e){
		e.preventDefault();

		var myUrl = (membre_id != 0)?"http://localhost/adventalk/public/api/update/"+$("#id_membre").val() : "http://localhost/adventalk/public/api/create";

		var $form = $("#formulaire");
		var formdata = (window.FormData) ? new FormData($form[0]) : null;
		var data = (formdata !== null) ? formdata : $form.serialize();
		
		$.ajax({
			url: myUrl,
			type: "post",
			contentType: false, // obligatoire pour de l'upload de l'avatar
			processData: false, // obligatoire pour de l'upload de l'avatar
			data: data,
			success: function(reponse){
				totalUser(true);
				$("#resultat-msg").text(reponse.message);
			}
		})
	});
	// Fin fonction AJOUTER

	// Fonction pour AFFICHER utilisateur
	function totalUser(total = false){
		$.ajax({
			url: "http://localhost/adventalk/public/api/read",
			type: "post",
			success: function(reponse){
				if(total == false){
					var option = "";
					for(var elem in reponse){
						option += "<option value='"+reponse[elem].id+"'>"+reponse[elem].nom+"</option>";
					}
					$("#listeUser").html(option);
				}
				else{
					var tableau = "<tr><th>ID</th><th>Email</th><th>Nom</th><th>Prenom</th><th>Civilite</th><th>Date de naissance</th><th>Ville</th><th>Pseudo</th><th>Avatar</th><th>Statut</th><th>Post</th><th>Options</th></tr>";
					for(var elem in reponse){
						tableau += "<tr><td>"+reponse[elem].id_membre+"</td><td>"+reponse[elem].email+"</td><td>"+reponse[elem].nom+"</td><td>"+reponse[elem].prenom+"</td><td>"+reponse[elem].civilite+"</td><td>"+reponse[elem].date_naissance+"</td><td>"+reponse[elem].ville+"</td><td>"+reponse[elem].pseudo+"</td><td><img src='http://localhost/adventalk/public/upload/avatar/"+reponse[elem].avatar+"' /></td><td>"+reponse[elem].statut+"</td><td>"+reponse[elem].rang+"</td><td><input type='submit' membre_id='"+reponse[elem].id_membre+"' id='search' class='search' name='search' value='' '><input type='submit' membre_id='"+reponse[elem].id_membre+"' id='delete' class='delete' name='delete' value=''></td></tr>";
					}	
					$("#tableau").html(tableau);
				}
				appelleJquery();
			}
		})
	}
	// Fin fonction AFFICHER utilisateur

	function cleanForm(){
		var input = $("#formulaire > input[type!=submit]"); // Permet de clean DANS la div formulaire, sans supp le SUBMIT
		for(var i = 0; i < input.length; i++){
			input[i].value = "";
		}
	} // End cleanForm

	totalUser(true);

	// if($("#listeUser").length){
	// 	totalUser();
	// }
	// else{
	// 	totalUser(true);
	// }

});	// End function chargement

