<?php /* app/Model/CommentModel.php */
namespace Model;

use \W\Model\Model;

class SearchModel extends Model 
{

    // 	public function recherche($arrayData)
	// {
	// 	$this->setTable('membre');
	// 	$this->searchMembres($arrayData);
	// }


    public function searchMembres($search, $operator = 'OR', $stripTags = true){

		// Sécurisation de l'opérateur
		$operator = strtoupper($operator);
		if($operator != 'OR' && $operator != 'AND'){
			die('Error: invalid operator param');
		}

		$this->setTable('membre');

        $sql = 'SELECT * FROM ' . $this->table.' WHERE prenom LIKE :'.$search.' OR nom LIKE :'.$search.' OR pseudo LIKE :'.$search ;
		// Supprime les caractères superflus en fin de requète

		$sth = $this->dbh->prepare($sql);

        $search = ($stripTags) ? strip_tags($search) : $search;
        $sth->bindValue(':'.$search, '%'.$search.'%');

		if(!$sth->execute()){
			return false;
		}
        return $sth->fetchAll();
	}
}