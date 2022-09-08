<?php

class Category {

    private int $id;
    private ?string $name = null;


//setter and getter 

    public function getId () {

        return $this->id;
    }

    public function setId (int $id) {

        $this->$id = $id;

    }

    public function getName () {

        return $this->name;
    }

    public function setName (string $name) {

        $this->$name = $name;

    }

//methods categorie
    
    //Add a new category
    public static function addCategory () {

        if (isset($_POST)) {
            if (isset($_POST['addCategory']) && !empty($_POST['addCategory'])) {

                $db = DataBase::getInstance();
                $name = strip_tags($_POST['addCategory']);

                $query = $db->prepare('INSERT INTO `categorie` (`name`) VALUES (:name);');
                $query->bindValue(':name', $name , PDO::PARAM_STR);

                $query->execute();

                return 'catégorie valider et sauvegarder';

            }
        }
    }

    //display all category
    public static function displayCategory () {

        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT * FROM `categorie`');
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_CLASS, 'Category');

        return $categories;
    }

    //retrieve the category of the selected item
    public static function retrieveArticleCategory ($id) {

        $db = DataBase::getInstance();
            
        $query = $db->prepare('SELECT name, categorie.id FROM `article_categorie` JOIN `article` ON article.id = article_categorie.article_id JOIN `categorie` ON categorie.id = article_categorie.categorie_id WHERE article.id = :id;');
        $query->bindValue(':id', $id[1] , PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'Category');
        $catArticle = $query->fetchAll();

        return $catArticle;
    }

    //insert into the junction table the article_id and categorie_id in the database
    public static function insertJunctionTableCategory ($lastId, $category) {

        $db = DataBase::getInstance();

        $query = $db->prepare('INSERT INTO `article_categorie` (`article_id`, `categorie_id`) VALUES (:article_id, :categorie_id);');
        $params = [
            'article_id' => $lastId[0],
            'categorie_id' => $category
        ];
        $query->execute($params);

        return true;
    }
    
    //retrieve id category from the selected article
    public static function retrieveIdArticleCategory ($id) {

        $db = DataBase::getInstance();
            
        $query = $db->prepare('SELECT categorie.id FROM `article_categorie` JOIN `article` ON article.id = article_categorie.article_id JOIN `categorie` ON categorie.id = article_categorie.categorie_id WHERE article.id = :id;');
        $query->bindValue(':id', $id[1] , PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_COLUMN, 0);
        
        $catIdArticle = $query->fetchAll();

        return $catIdArticle;
    }
    
}