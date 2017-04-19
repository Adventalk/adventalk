$(function(){ // lecture au chargement du document

	var Jeremy = 0;

	var url = window.location.pathname.split("/");
	var last_element = url[url.length - 1];
	// console.log(last_element)
	$("#membre_id_membre").val(last_element);

	function appelleJquery(){ // fonction pour appeler le Jquery 


		$(".delete_album").on("click", function(e){ 
			
			if(confirm("Etes vous sur de vouloir supprimer cet album?")){

				$.ajax({
				url: "http://localhost/adventalk/public/api/deletealbum/"+$(this).attr("Jeremy"),
				type: "post",
				success: function(reponse){
					}
				})
			}

		});
		// End function delete
		

		// Function recherche 1 utilisateur
		$(".update_album").on("click", function(e){ 

			$.ajax({
			url: "http://localhost/adventalk/public/api/readalbum/"+$(this).attr("Jeremy"),
			type: "post",
			success: function(reponse){
					var utilisateur = (reponse);

					console.info(utilisateur);
					//console.log(reponse)
                    $("#id_album").val(utilisateur.id_album);
                    $("#membre_id_membre").val(utilisateur.membre_id_membre);
					$("#titre").val(utilisateur.titre);
					$("#description").val(utilisateur.description);
					Jeremy = utilisateur.id_album;
				}
			})

		});
	}
		// End function search
		$(function(e){ 
			$.ajax({
				url: "http://localhost/adventalk/public/api/readalbum",
				type: "post",
				success: function(reponse){
						var album ="";
						var url = window.location.pathname.split("/");
						// console.log (url);
						var last_element = url[url.length - 1];
						// console.log(last_element);
						for(var elem in reponse){
							// console.log(reponse);
							if(last_element == reponse[elem].membre_id_membre){
							//photo += "<div><img src='../../upload/gallery/"+reponse[elem].album_id_album+'_'+reponse[elem].titre+'_'+reponse[elem].photo+"'></div>";
								album += "<div class='one_third'><figure class='single-item-effect'><img src='../../upload/album.jpg'><figcaption><div class='figcaption-border'><h2>"+reponse[elem].titre+"</h2><p>"+reponse[elem].description+"<a href='../../album/photo/create/"+reponse[elem].id_album+"'></a></p><div class='figure-overlay'></div></div></figcaption></figure><input type='submit' Jeremy='"+reponse[elem].id_album+"' id='delete_album' class='delete_album' value='delete_album'><input type='submit' Jeremy='"+reponse[elem].id_album+"' id='update_album' class='update_album' value='update_album'></div>";
								
							}
						}		
						
						$(".album").append(album);
						appelleJquery();
				}
			})

		});
		// Function add un utilisateur
		$("#formulaireAlbum").on("submit", function(e){ 
			// evenement à l'envoi du formmulaire -> Evenement = e

			e.preventDefault();
			
			var myUrl = (Jeremy != 0)?"http://localhost/adventalk/public/api/updatealbum/"+$("#id_album").val() :"http://localhost/adventalk/public/api/createalbum";
			//console.log($('#formulaire').serialize()); // test récupération champs input
			var $form = $("#formulaireAlbum");
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


});	// End function chargement


