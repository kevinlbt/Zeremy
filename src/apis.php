<?php

require 'DataBase.php';

$db = DataBase::getInstance();

$param = [];
$query = null;

if (isset($_GET['id']) && $_GET['id'] !== "all") {
    $param = ['id' => $_GET['id']];
    $query = $db->prepare("SELECT article.* FROM `article` JOIN article_categorie ON article_categorie.article_id = article.id JOIN articles_publier ON articles_publier.article_id = article.id WHERE article_categorie.categorie_id = :id;");
}
else { 
    $query = $db->prepare ("SELECT article.* FROM `article` JOIN articles_publier ON articles_publier.article_id = article.id");
}

$query->execute($param);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$result = array_reverse($result);

echo json_encode($result);
     
