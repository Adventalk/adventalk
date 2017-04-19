<?php

namespace Controller;

use \W\Controller\Controller;
use Model\SearchModel;

class SearchController extends Controller
{
    public function search(){
        $searchModel = new SearchModel();
        $arrayData = [];
        if(!empty($_GET)){
            if(!empty($_GET['search'])){
                $this->show('home/search', ['search' => $searchModel->searchMembres($_GET['search'])]);
            }
        }
        $this->show('home/search', ["search" => $searchModel->searchMembres($_GET['search'])]);
    }   

    
}    