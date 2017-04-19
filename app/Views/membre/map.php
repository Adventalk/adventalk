<?php 
//hérite du fichier layout.php à la racine de app/Views/
$this->layout('layout', ['title' => 'Map'])
?>

<?php 
//début du bloc main_content
$this->start('main_content');
?>

<div id="p_map" class="container">
    <div id="map"></div>
    <form id="" method="post" action="#">

    </form>
</div>

<?php 
//fin du bloc
$this->stop('main_content');
?>