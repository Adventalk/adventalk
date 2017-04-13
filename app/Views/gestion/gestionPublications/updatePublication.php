<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Mise à jour d\'une publications'])
?>

<?php 
//début du bloc main_content
$this->start('main_content'); ?>

    <h1>Modifier une publication</h1>

    <a href="<?= $this->url('home')?>">Home</a>

    <form method="post" id="formulaire" display="block !important">
        <label for="categorie">Catgéorie</label>
        <select name="categorie" required>
            <option value="bon plan">Bon plan</option>
            <option value="conseil">Conseil</option>
            <option value="événement">Evénement</option>
        </select>

        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="<?= $reponse['titre']?>">

        <label for="message">Message</label>
        <textarea name="message" id="message" value="<?= $reponse['message']?>"></textarea>

        <label for="date_debut">Date de début</label>
        <input type="date" name="date_debut" id="date_debut" value="<?= $reponse['date_debut']?>">

        <label for="date_fin">Date de fin</label>
        <input type="date" name="date_fin" id="date_fin" value="<?= $reponse['date_fin']?>">

        <label for="localite">Localité</label>
        <input type="text" name="localite" id="localite" value="<?= $reponse['localite']?>">

        <label for="photo">Photo : </label>
        <input type="file" name="photo" id="photo" value="<?= $reponse['photo']?>"/><br/>

        <input type="submit" value="Mettre à jour"/>
    </form>
    

<?php 
//fin du bloc
$this->stop('main_content'); ?>