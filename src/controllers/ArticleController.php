<?php

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

    // add an new article in the database with add categorie
    public static function addNewArticle () {

        self::$valideArticle = null;

        if (isset($_POST)) {
            if (isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['content']) && !empty($_POST['content'])
            && isset($_POST['link']) && !empty($_POST['link'])
            && isset($_POST['categorie']) && !empty($_POST['categorie']) ) {

                $db = DataBase::getInstance();

                //first request, insert article into database
                $query = $db->prepare('INSERT INTO `article` (`title`, `content`, `link`, `user_id`) VALUES (:title, :content, :link, :user_id);');
                $params = [
                    'title' => strip_tags($_POST['title']),
                    'content' => strip_tags($_POST['content']),
                    'link' => strip_tags($_POST['link']),
                    'user_id' => $_SESSION['logged_userid']
                ];
                $query->execute($params);

                //second request, retrieve last article id
                $query = $db->prepare('SELECT LAST_INSERT_ID();');
                $query->execute();
                $lastId = $query->fetch();

                //third request, insert into the junction table the article_id and categorie_id in the database
                //use foreach for the case where we have more than 1 categorie
                foreach($_POST['categorie'] as $categorie) {

                    $query = $db->prepare('INSERT INTO `article_catégorie` (`article_id`, `categorie_id`) VALUES (:article_id, :categorie_id);');
                    $params = [
                        'article_id' => $lastId[0],
                        'categorie_id' => $categorie
                    ];
                    $query->execute($params);

                }

                self::$valideArticle = 'article valider et sauvegarder';
            }

        }
        // if one/all of this field is empty 
        if (isset($_POST['title']) && empty($_POST['title'])
            || isset($_POST['content']) && empty($_POST['content'])
            || isset($_POST['link']) && empty($_POST['link']) ) {

                self::$notValideArticle = 'merci de remplir tous les champs';
            
        }

        // add a categorie
        if (isset($_POST)) {
            if (isset($_POST['addCategorie']) && !empty($_POST['addCategorie'])) {

                $db = DataBase::getInstance();
                $name = strip_tags($_POST['addCategorie']);

                $query = $db->prepare('INSERT INTO `categorie` (`name`) VALUES (:name);');
                $query->bindValue(':name', $name , PDO::PARAM_STR);

                $query->execute();

                self::$valideArticle = 'catégorie valider et sauvegarder';

            }
        }
        // display all categorie in a select html
        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT * FROM `categorie`');
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_CLASS, 'categorie');

        self::render('new-article',$categories);

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
            $query->setFetchMode(PDO::FETCH_CLASS, 'Article');
            $article = $query->fetch();

        }

        self::render('update-article', $article);

    }

    // delete an article in the database with id
    public static function deleteArticle () {

        if(isset($_GET['url']) && !empty($_GET['url'])) {

            $id = explode('/', $_GET['url']);

            $db = DataBase::getInstance();
            
            //first request, for deleting article_categorie from the database
            $query = $db->prepare('DELETE article_catégorie FROM article_catégorie JOIN article ON article_catégorie.article_id = article.id WHERE article.id =:id;');
            $query->bindValue(':id', $id[1], PDO::PARAM_INT);
            $query->execute();
            
            //second request, for deleting article from the database
            $query = $db->prepare('DELETE FROM `article` WHERE `id`=:id;');
            $query->bindValue(':id', $id[1], PDO::PARAM_INT);
            $query->execute();
        
            header('Location: /articles');
        }
    }

}
