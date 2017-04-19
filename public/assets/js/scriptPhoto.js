$(function(){ // lecture au chargement du document

	var Jeremy = 0;
	
	var url = window.location.pathname.split("/");
	var last_element = url[url.length - 1];
	$("#album_id_album").val(last_element);

	function appelleJquery(){ // fonction pour appeler le Jquery 	
	
		// End function create

		$(".delete_photo").on("click", function(e){ 
			
			if(confirm("Etes vous sur de vouloir supprimer cette photo?")){
				$.ajax({
				url: "http://localhost/adventalk/public/api/deletephoto/"+$(this).attr("Jeremy"),
				type: "post",
				success: function(reponse){
					}
				})
			}

		});
		// End function delete
		

		// Function recherche 1 utilisateur
		$(".update_photo").on("click", function(e){ 
			$.ajax({
			url: "http://localhost/adventalk/public/api/readphoto/"+$(this).attr("Jeremy"),
			type: "post",
			success: function(reponse){
					var utilisateur = (reponse);

					console.info(utilisateur);
					//console.log(reponse)
                    $("#album_id_album").val(utilisateur.album_id_album);
					$("#titre").val(utilisateur.titre);
					$("#id_photo").val(utilisateur.id_photo);
					$("#description").val(utilisateur.description);
					$("#statut").val(utilisateur.statut);
					$("#localite").val(utilisateur.localite);
					$("#photo").val(utilisateur.photo);
					Jeremy = utilisateur.id_photo;
				}
			})

		});
	} // End function appelle jquery
		// End function search
		$(function(e){  
			$.ajax({
				url: "http://localhost/adventalk/public/api/readphoto",
				type: "post",
				success: function(reponse){
						var photo ="";
						var url = window.location.pathname.split("/");
						// console.log (url);
						var last_element = url[url.length - 1];
						// console.log(last_element);
							
							for(var elem in reponse){
								// console.log(reponse);
								if(last_element == reponse[elem].album_id_album){
								//photo += "<div><img src='../../upload/gallery/"+reponse[elem].album_id_album+'_'+reponse[elem].titre+'_'+reponse[elem].photo+"'></div>";
								photo += "<div class='one_third'><figure class='single-item-effect'><img src='../../../upload/gallery/"+reponse[elem].album_id_album+'_'+reponse[elem].titre+'_'+reponse[elem].photo+"'/><figcaption><div class='figcaption-border'><h2>"+reponse[elem].titre+"</h2><p>"+reponse[elem].description+"</p><div class='figure-overlay'></div></div></figcaption></figure><input type='submit' Jeremy='"+reponse[elem].id_photo+"' id='delete_photo' class='delete_photo' value='delete_photo'><input type='submit' Jeremy='"+reponse[elem].id_photo+"' id='update_photo' class='update_photo' value='update_photo'></div>";
								}
							}		
						
						$(".photo").append(photo);
						appelleJquery();
				}
				
			})

		});
		// Function add un utilisateur
		$("#formulairePhoto").on("submit", function(e){ 
			// evenement à l'envoi du formmulaire -> Evenement = e
			
			e.preventDefault();
			
			var myUrl = (Jeremy != 0)?"http://localhost/adventalk/public/api/updatephoto/"+$("#id_photo").val() :"http://localhost/adventalk/public/api/createphoto";
			//console.log($('#formulaire').serialize()); // test récupération champs input
			var $form = $("#formulairePhoto");
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
			console.log(data)

			$.ajax({
				url: myUrl,
				type: "post",
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
           		dataType: 'json', // selon le retour attendu
				// data: "typePost=Ajax&"+data,
				data: data,
				success: function(reponse){
						console.log("typePost=Ajax&"+$('#formulaire').serialize());
						
				}
			})

		});

		function cleanForm(){
		var input = $("input[type=text]");
		for(var i = 0; i < input.length; i++){
			input[i].value = "";
		}

	} 
		
});	// End function chargement


