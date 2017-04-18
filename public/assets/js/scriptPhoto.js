$(function(){ // lecture au chargement du document

	var Jeremy = 0;

		$(".delete").on("click", function(e){ 
			
			if(confirm("Etes vous sur de vouloir supprimer cette photo?")){

				$.ajax({
				url: "http://localhost/adventalk/public/api/deletephoto"+$(this).attr("Jeremy"),
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
			url: "http://localhost/adventalk/public/album/photo/readphoto"+$(this).attr("Jeremy"),
			type: "post",
			success: function(reponse){
					var utilisateur = (reponse);

					console.info(utilisateur);
					//console.log(reponse)
                    $("#album_id_album").val(utilisateur.album_id_album);
					$("#titre").val(utilisateur.titre);
                    $("#photo").val(utilisateur.photo);
					$("#description").val(utilisateur.description);
					$("#statut").val(utilisateur.statut);
					$("#localite").val(utilisateur.localite);
					$("#id_photo").val(utilisateur.id_photo);
					Jeremy = utilisateur.id;
				}
			})

		});
		// End function search

		// Function add un utilisateur
		$("#formulairePhoto").on("submit", function(e){ 
			// evenement à l'envoi du formmulaire -> Evenement = e

			e.preventDefault();

			var myUrl = (Jeremy != 0)?"http://localhost/adventalk/public/api/updatephoto"+$("#id_photo").val() :"http://localhost/adventalk/public/api/createphoto";
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
});	// End function chargement
