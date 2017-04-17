<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Création d\'une publication'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>

<div class="boxed">
    <table id="tableau" style="margin:5%">


    </table>
    <h1>Gestion des publication</h1>
    <form method="post" action="#">
    
        <input type="hidden" name="id_publication" id="id_publication">
        
        <label for="categorie">Catgéorie</label>
        <select name="categorie" required>
            <option value="bon plan">Bon plan</option>
            <option value="conseil">Conseil</option>
            <option value="événement">Evénement</option>
        </select>

        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" required>

        <label for="message">Message</label>
        <textarea name="message" id="message" required></textarea>

        <label for="date_debut">Date de début</label>
        <input type="date" name="date_debut" id="date_debut" required>

        <label for="date_fin">Date de fin</label>
        <input type="date" name="date_fin" id="date_fin" required>

        <label for="localite">Localité</label>
        <input type="text" name="localite" id="localite" required>

        <label for="photo">Photo : </label>
        <input type="file" name="photo" id="photo"/><br/>

        <input type="submit"value="Créer"/><br/>
    </form> 

    
<?php 
//fin du bloc
$this->stop('main_content'); ?>