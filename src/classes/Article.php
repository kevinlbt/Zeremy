<?php

class Article {

    private int $id;
    private ?string $title = null;
    private ?string $content = null;
    private ?string $date = null;
    private ?string $link = null;
    private ?string $user_id = null;


// getter 

    public function getId () {

        return $this->id;
    }

    public function getTitle () {

        return $this->title;
    }

    public function getContent () {

        return $this->content;
    }

    public function getDate () {

        return $this->date;
    }

    public function getLink () {

        return $this->link;
    }

    public function getUserId () {

        return $this->user_id;
    }
    
// methods article
    
    //sanitized input data 
    private static function sanitizing ($data) {
        
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        return $data;
        
    }
    
    //Display all articles
    public static function displayArticle () {

        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT * FROM `article`');
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_CLASS, 'Article');

        return $articles;
    }
    
    //display articles sort by category
    public static function displayArticleByCategory ($id) {
        
        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT article.* FROM `article` JOIN article_categorie ON article.id = article_categorie.article_id WHERE article_categorie.categorie_id = :id;');
        $query->bindValue('id', $id[0], PDO::PARAM_INT);
        $query->execute();
        
        $articles = $query->fetchAll(PDO::FETCH_CLASS, 'Article');

        return $articles;
    }
    
    //add article in database
    public static function newArticle () {
        
        if (isset($_POST)) {
            if (isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['content']) 
            && isset($_POST['link']) && !empty($_POST['link'])
            && isset($_POST['category']) && !empty($_POST['category']) ) {
                
                $title = self::sanitizing($_POST['title']);
                $content = self::sanitizing($_POST['content']);
                $link = self::sanitizing($_POST['link']);
                
                $db = DataBase::getInstance();
            
                //first request, insert article into database
                $query = $db->prepare('INSERT INTO `article` (`title`, `content`, `link`, `user_id`) VALUES (:title, :content, :link, :user_id);');
                $params = [
                    'title' => $title,
                    'content' => $content,
                    'link' => $link,
                    'user_id' => $_SESSION['logged_userid']
                ];
                $query->execute($params);

                return true;
            }
        }

    }
    
    //retrieve last article id send in database
    public static function retrieveLastArticleId () {

        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT LAST_INSERT_ID();');
        $query->execute();
        return $lastId = $query->fetch();
    
    }
    
    //retrieve article content with article id
    public static function getArticleContent ($id) {

        if(isset($_GET['url']) && !empty($_GET['url'])) {

            $db = DataBase::getInstance();
            
            $query = $db->prepare('SELECT * FROM `article` WHERE `id`=:id;');
            $query->bindValue(':id', $id[1] , PDO::PARAM_INT);
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, 'Article');
            return  $article = $query->fetch();

        }
    }
    
    //update the select article
    public static function updateArticle ($id) {

        if (isset($_POST)) {
            if (isset($_POST['title']) && !empty($_POST['title'])
            && isset($_POST['content'])
            && isset($_POST['link']) && !empty($_POST['link']) 
            && isset($_POST['category']) && !empty($_POST['category']) ) {

                $title = self::sanitizing($_POST['title']);
                $content = self::sanitizing($_POST['content']);
                $link = self::sanitizing($_POST['link']);

                $db = DataBase::getInstance();
                
                $query = $db->prepare('UPDATE `article` SET `title`=:title, `content`=:content, `link`=:link WHERE `id`=:id;');
                $params = [
                    'title' => $title,
                    'content' => $content,
                    'link' => $link,
                    'id' => $id[1]
                ];
                $query->execute($params);

                // retrieve new categorie id and old categories id for the update article
                $newCategory = $_POST['category'];
                $currentCategory = Category::retrieveIdArticleCategory($id);

                //compare array from each other
                $addCate = array_udiff($newCategory, $currentCategory, function ($a, $b) {return (int)$a <=> (int)$b ;});
                $deleteCate = array_udiff($currentCategory, $newCategory, function ($a, $b) {return (int)$a <=> (int)$b ;});
               
                // insert new categorie id
                $query = $db->prepare('INSERT INTO `article_categorie` (`article_id`, `categorie_id`) VALUES (:article_id, :categorie_id);');
                foreach($addCate as $addcategory) {

                    $params = [
                        'article_id' => $id[1],
                        'categorie_id' => (int)$addcategory
                    ];
                    $query->execute($params);

                }
                // delete old categorie id
                $query = $db->prepare('DELETE article_categorie FROM article_categorie JOIN article ON article_categorie.article_id = article.id WHERE article.id =:id AND article_categorie.categorie_id = :categorie_id');
                foreach($deleteCate as $delcategory) {

                    $params = [
                        'id' => $id[1],
                        'categorie_id' => $delcategory
                    ];
                    $query->execute($params);

                }

                header('location: /Zeremy-website/articles');

            }
        }
    }

    //delete the select article
    public static function deleteArticle () {

        if(isset($_GET['url']) && !empty($_GET['url'])) {

            $id = explode('/', $_GET['url']);
            
            $db = DataBase::getInstance();
            
            //first request, for deleting article_categorie from the database
            $query = $db->prepare('DELETE article_categorie FROM article_categorie JOIN article ON article_categorie.article_id = article.id WHERE article.id =:id;');
            $query->bindValue('id', $id[1], PDO::PARAM_INT);
            $query->execute();
            
            //second request, for deleting article_publier
            $query = $db->prepare('DELETE articles_publier FROM articles_publier JOIN article ON articles_publier.article_id = article.id WHERE article.id =:id;');
            $query->bindValue('id', $id[1], PDO::PARAM_INT);
            $query->execute();
            
            //third request, for deleting article from the database
            $query = $db->prepare('DELETE FROM `article` WHERE `id`=:id;');
            $query->bindValue('id', $id[1], PDO::PARAM_INT);
            $query->execute();
        
            header('Location: /Zeremy-website/articles');
        }
    }
 
    //insert article id in article_publier table from the database
    public static function publishArticleId ($id) {
        
        $db = DataBase::getInstance();
        
        $query = $db->prepare('INSERT INTO `articles_publier`(`article_id`) VALUES (:id); ');
        $query->bindValue(':id', $id[1], PDO::PARAM_INT);
        $query->execute();
        
    }
    
    //delete article id in article_publier table from the database
    public static function unPublishArticle ($id) {
        
        $db = DataBase::getInstance();
        
        $query = $db->prepare('DELETE articles_publier FROM articles_publier JOIN article ON articles_publier.article_id = article.id WHERE article.id =:id;');
        $query->bindValue(':id', $id[1], PDO::PARAM_INT);
        $query->execute();
        
    }
    
    //display publish article on realisation page
    public static function displayPublishedArticles () {

        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT article.* FROM `article` JOIN articles_publier ON articles_publier.article_id = article.id');
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);

        return $articles;

    }
    
    //retrieve all article id in article_publier table from the database
    public static function retrieveAllPublishArticle () {
        
        $db = DataBase::getInstance();
        
        $query = $db->prepare('SELECT article_id FROM `articles_publier`');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_COLUMN, 0);
        
        $pubIdArticle = $query->fetchAll();
        
        return $pubIdArticle;
    }
}