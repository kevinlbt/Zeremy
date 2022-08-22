<?php

require 'src/database.php';

class ArticleController extends abstractController {

    private static ?string $valideArticle = null;

    private static ?string $notValideArticle = null;

    // getter
    public static function getvalideArticle () {

        return self::$valideArticle;
    }

    public static function getnotValideArticle () {

        return self::$notValideArticle;
    }
    
    // display all article from the database in a html list
    public static function displayArticle() {

        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT * FROM `article`');
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_CLASS, 'Article');

        self::render('articles', $articles);

    
    }

    // add an new article in the database
    public static function addNewArticle () {

        self::$valideArticle = null;

        if (isset($_POST)) {
            if (isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['content']) && !empty($_POST['content'])
            && isset($_POST['link']) && !empty($_POST['link']) ) {

                $db = DataBase::getInstance();

                $query = $db->prepare('INSERT INTO `article` (`title`, `content`, `link`, `user_id`) VALUES (:title, :content, :link, :user_id);');
                $params = [
                    'title' => strip_tags($_POST['title']),
                    'content' => strip_tags($_POST['content']),
                    'link' => strip_tags($_POST['link']),
                    'user_id' => 1  //temporaire
                ];

                $query->execute($params);

                self::$valideArticle = 'article valider et sauvegarder';

            }

        }

        if (isset($_POST['title']) && empty($_POST['title'])
            || isset($_POST['content']) && empty($_POST['content'])
            || isset($_POST['link']) && empty($_POST['link']) ) {

            self::$notValideArticle = 'merci de remplir tous les champs';
            
        }

        self::render('new-article');

    }

    // update an already created article in the database
    public static function updateArticle () {
        
        $id = explode('/', $_GET['url']);

        if (isset($_POST)) {
            if (isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['content']) && !empty($_POST['content'])
            && isset($_POST['link']) && !empty($_POST['link']) ) {

                $db = DataBase::getInstance();
                $query = $db->prepare('UPDATE `article` SET `title`=:title, `content`=:content, `link`=:link WHERE `id`=:id;');
                $params = [
                    'title' => strip_tags($_POST['title']),
                    'content' => strip_tags($_POST['content']),
                    'link' => strip_tags($_POST['link']),
                    'id' => $id[1]
                ];

                $query->execute($params);

                header('location: /articles');

            }

        }

        if(isset($_GET['url']) && !empty($_GET['url'])) {

            $db = DataBase::getInstance();
            
            $query = $db->prepare('SELECT * FROM `article` WHERE `id`=:id;');
            $query->bindValue(':id', $id[1] , PDO::PARAM_INT);
            $query->execute();

            $article = $query->fetch();

        }

        self::render('update-article', $article);

    }


    // delete an article in the database with id
    public static function deleteArticle () {

        if(isset($_GET['url']) && !empty($_GET['url'])) {

            $id = explode('/', $_GET['url']);

            $db = DataBase::getInstance();
        
            $query = $db->prepare('DELETE FROM `article` WHERE `id`=:id;');
        
            $query->bindValue(':id', $id[1], PDO::PARAM_INT);
            $query->execute();
        
            header('Location: /articles');
        }
    }

    //add a categorie in the database
    public static function addCategorie () {

        if (isset($_POST)) {
            if (isset($_POST['categorie']) && !empty($_POST['categorie'])) {

                $db = DataBase::getInstance();
                $name = strip_tags($_POST['categorie']);

                $query = $db->prepare('INSERT INTO `categorie` (`name`) VALUES (:name);');
                $query->bindValue(':name', $name , PDO::PARAM_STR);

                $query->execute();

                return self::$valideArticle = 'catégorie valider et sauvegarder';
            }
        }
    }
}
