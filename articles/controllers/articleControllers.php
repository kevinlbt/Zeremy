<?php

require_once './database.php';

class ArticleController {

    private static ?string $valideArticle = null;

    private static ?string $notValideArticle = null;

    // getter
    public static function getvalideArticle () {

        return self::$valideArticle;
    }

    public static function getnotValideArticle () {

        return self::$notValideArticle;
    }
    
    // display all article from the database in a list html
    public static function displayArticle() {

        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT * FROM `article`');
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_CLASS, get_class());

        return $articles;
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

                return self::$valideArticle = 'article valider et sauvegarder';

            }
         
        }

        if (isset($_POST['title']) && empty($_POST['title'])
            || isset($_POST['content']) && empty($_POST['content'])
            || isset($_POST['link']) && empty($_POST['link']) ) {

            return self::$notValideArticle = 'merci de remplir tous les champs';
        }

    }

    // update an already created article in the database
    public static function updateArticle () {

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
                    'id' => strip_tags($_GET['id'])
                ];

                $query->execute($params);

                header('location: /articles?p=articles');

            }

        }

    }

    // find an article in the database with id
    public static function retrieveOneArticle () {

        if(isset($_GET['id']) && !empty($_GET['id'])) {

            $db = DataBase::getInstance();
            $id = strip_tags($_GET['id']);

            $query = $db->prepare('SELECT * FROM `article` WHERE `id`=:id;');
            $query->bindValue(':id', $id , PDO::PARAM_INT);
            $query->execute();
            $article = $query->fetch();
    
            return $article;

        }
    }

    // delete an article in the database with id
    public static function deleteArticle () {

        if(isset($_GET['id']) && !empty($_GET['id'])) {

            $db = DataBase::getInstance();
            $id = strip_tags($_GET['id']);
        
            $query = $db->prepare('DELETE FROM `article` WHERE `id`=:id;');
        
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();
        
            header('Location: /articles?p=articles');
        }
    }
}


