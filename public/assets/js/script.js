$(function(){ // lecture au chargement du document

	var Jeremy = 0;

	function appelleJquery(){ // fonction pour appeler le Jquery 

		$("#create").on("click", function(e){
			cleanForm();
			$("#mdp").attr("name", "password");
			$('#formulaire').show();
			Jeremy = 0;
		})
		// End function create

		// Function delete 1 utilisateur
		$(".delete").on("click", function(e){ 
			
			if(confirm("Etes vous sur de vouloir supprimer ce membre?")){

				$.ajax({
				url: "http://localhost/adventalk2/public/api/delete/"+$(this).attr("Jeremy"),
				type: "post",
				success: function(reponse){
					totalUser(true);
					}
				})
			}

		});
		// End function delete
		

		// Function recherche 1 utilisateur
		$(".search").on("click", function(e){ 

			$.ajax({
			url: "http://localhost/adventalk2/public/api/read/"+$(this).attr("Jeremy"),
			type: "post",
			success: function(reponse){
					var utilisateur = (reponse);

					console.info(utilisateur);
					//console.log(reponse)
					$("#email").val(utilisateur.email);
					$("#mdp").removeAttr("name");
					$("#nom").val(utilisateur.nom);
					$("#prenom").val(utilisateur.prenom);
					$("#civilite").val(utilisateur.civilite);
					$("#date_naissance").val(utilisateur.date_naissance);
					$("#ville").val(utilisateur.ville);
					$("#pseudo").val(utilisateur.pseudo);
					$("#photo_actuelle").val(utilisateur.avatar);
					$("#statut").val(utilisateur.statut);
					$("#rang").val(utilisateur.rang);
					$("#id_membre").val(utilisateur.id_membre);
					$("#formulaire").show();
					Jeremy = utilisateur.id;
				}
			})

		});
		// End function search
	} // End function appelleJquery

		// Function add un utilisateur
		$("#formulaire").on("submit", function(e){ 
			// evenement à l'envoi du formmulaire -> Evenement = e

			e.preventDefault();

			var myUrl = (Jeremy != 0)?"http://localhost/adventalk2/public/api/update/"+$("#id_membre").val() : "http://localhost/adventalk2/public/api/create";
			//console.log($('#formulaire').serialize()); // test récupération champs input
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
		// End function add
	


	function totalUser(total = false){
		$.ajax({
			url: "http://localhost/adventalk2/public/api/read",
			type: "post",
			success: function(reponse){

					//reponse = JSON.parse(reponse); // Réponse est un tableau d'objet

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
							console.log(reponse);
							tableau += "<tr><td>"+reponse[elem].id_membre+"</td><td>"+reponse[elem].email+"</td><td>"+reponse[elem].nom+"</td><td>"+reponse[elem].prenom+"</td><td>"+reponse[elem].civilite+"</td><td>"+reponse[elem].date_naissance+"</td><td>"+reponse[elem].ville+"</td><td>"+reponse[elem].pseudo+"</td><td>"+reponse[elem].avatar+"</td><td>"+reponse[elem].statut+"</td><td>"+reponse[elem].rang+"</td><td><input type='submit' Jeremy='"+reponse[elem].id_membre+"' id='search' class='search' value='search'><input type='submit' Jeremy='"+reponse[elem].id_membre+"' id='delete' class='delete' value='delete'></td></tr>";
						}
						
						$("#tableau").html(tableau);
					}
				appelleJquery();
				}

		})
	} // End function totalUser()

	function cleanForm(){
		var input = $("input[type=text]");
		for(var i = 0; i < input.length; i++){
			input[i].value = "";
		}

	} // End cleanForm

	if($("#listeUser").length){
		totalUser();
	}
	else{
		totalUser(true);
	}

});	// End function chargement
