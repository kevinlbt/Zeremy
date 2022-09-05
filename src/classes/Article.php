<?php


class Article {

    private int $id;
    private ?string $title = null;
    private ?string $content = null;
    private ?string $date = null;
    private ?string $link = null;
    private ?string $user_id = null;



// setter and getter 

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

    //Display all articles
    public static function displayArticle () {

        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT * FROM `article`');
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
            && isset($_POST['categorie']) && !empty($_POST['categorie']) ) {

                $db = DataBase::getInstance();
                $query = $db->prepare('UPDATE `article` SET `title`=:title, `content`=:content, `link`=:link WHERE `id`=:id;');
                $params = [
                    'title' => strip_tags($_POST['title']),
                    'content' => strip_tags($_POST['content']),
                    'link' => strip_tags($_POST['link']),
                    'id' => $id[1]
                ];
                $query->execute($params);

                // retrieve new categorie id and old categories id for the update article
                $newCategories = $_POST['categorie'];
                $currentCategories = Categorie::retrieveIdArticleCategories($id);

                //compare array from each other
                $addCate = array_udiff($newCategories, $currentCategories, function ($a, $b) {return (int)$a <=> (int)$b ;});
                $deleteCate = array_udiff($currentCategories, $newCategories, function ($a, $b) {return (int)$a <=> (int)$b ;});
               
                // insert new categorie id
                foreach($addCate as $addcategorie) {

                    $query = $db->prepare('INSERT INTO `article_catégorie` (`article_id`, `categorie_id`) VALUES (:article_id, :categorie_id);');
                    $params = [
                        'article_id' => $id[1],
                        'categorie_id' => (int)$addcategorie
                    ];
                    $query->execute($params);

                }
                // delete old categorie id
                foreach($deleteCate as $delcategorie) {

                    $query = $db->prepare('DELETE article_catégorie FROM article_catégorie JOIN article ON article_catégorie.article_id = article.id WHERE article.id =:id AND article_catégorie.categorie_id = :categorie_id');
                    $params = [
                        'id' => $id[1],
                        'categorie_id' => $delcategorie
                    ];
                    $query->execute($params);

                }

                header('location: /Zeremy-website/articles');

            }
        }
    }

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
 
    public static function displayPublishedArticles () {

        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT article.* FROM `article` JOIN articles_publier ON articles_publier.article_id = article.id');
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_CLASS, 'Article');

        return $articles;

    }
}