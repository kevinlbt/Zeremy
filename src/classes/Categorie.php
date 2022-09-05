<?php

class Categorie {

    private int $id;
    private ?string $name = null;


//setter and getter 

    public function getId () {

        return $this->id;
    }

    public function setId ($id) {

        $this->$id = $id;
        return $this;

    }

    public function getName () {

        return $this->name;
    }

    public function setName ($name) {

        $this->$name = $name;
        return $this;

    }

//methods categorie

    public static function addCategorie () {

        if (isset($_POST)) {
            if (isset($_POST['addCategorie']) && !empty($_POST['addCategorie'])) {

                $db = DataBase::getInstance();
                $name = strip_tags($_POST['addCategorie']);

                $query = $db->prepare('INSERT INTO `categorie` (`name`) VALUES (:name);');
                $query->bindValue(':name', $name , PDO::PARAM_STR);

                $query->execute();

                return 'catégorie valider et sauvegarder';

            }
        }
    }

    public static function displayCategories () {

        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT * FROM `categorie`');
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_CLASS, 'Categorie');

        return $categories;
    }

    public static function retrieveArticleCategories ($id) {

        $db = DataBase::getInstance();
            
        $query = $db->prepare('SELECT name, categorie.id FROM `article_categorie` JOIN `article` ON article.id = article_categorie.article_id JOIN `categorie` ON categorie.id = article_categorie.categorie_id WHERE article.id = :id;');
        $query->bindValue(':id', $id[1] , PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'Categorie');
        $catArticle = $query->fetchAll();

        return $catArticle;
    }

    //insert into the junction table the article_id and categorie_id in the database
    public static function insertJunctionTableCategorie ($lastId, $categorie) {

        $db = DataBase::getInstance();

        $query = $db->prepare('INSERT INTO `article_categorie` (`article_id`, `categorie_id`) VALUES (:article_id, :categorie_id);');
        $params = [
            'article_id' => $lastId[0],
            'categorie_id' => $categorie
        ];
        $query->execute($params);

        return true;
    }
    
    public static function retrieveIdArticleCategories ($id) {

        $db = DataBase::getInstance();
            
        $query = $db->prepare('SELECT categorie.id FROM `article_categorie` JOIN `article` ON article.id = article_categorie.article_id JOIN `categorie` ON categorie.id = article_categorie.categorie_id WHERE article.id = :id;');
        $query->bindValue(':id', $id[1] , PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_COLUMN, 0);
        
        $catIdArticle = $query->fetchAll();

        return $catIdArticle;
    }
    
}