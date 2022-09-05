<?php

class ArticleController extends AbstractController {

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
    public static function displayAllArticle() {

        $articles = Article::displayArticle();

        $articles = array_reverse($articles);

        self::render('articles', $articles);

    }

    // add an new article in the database with add categorie
    public static function addNewArticle () {

        self::$valideArticle = null;

        $result = null;

        $result = Article::newArticle();

        if ($result)
            $lastId = Article::retrievelastArticleId();

        if (isset($_POST['categorie']) && !empty($_POST['categorie']) && $result) {

             //use foreach for the case where we have more than 1 categorie
            foreach($_POST['categorie'] as $categorie) {

                $result = Categorie::insertJunctionTableCategorie($lastId, $categorie);
            }
        }

        if ($result) {

            self::$valideArticle = 'article valider et sauvegarder';

        }
     
        // if one or all of this field is empty 
        if (isset($_POST['title']) && empty($_POST['title']) 
            || isset($_POST['link']) && empty($_POST['link']) 
            || isset($_POST['categorie']) && empty ($_POST['categorie']) ) {

                self::$notValideArticle = 'merci de remplir les champs obligatoires';
            
        }

        // add a categorie
        if (isset($_POST['addCategorie']))
            self::$valideArticle = Categorie::addCategorie();
        
        // display all categorie in a select html
        $categories = Categorie::displayCategories();

        //render
        self::render('new-article',$categories);

    }

    // update an already created article in the database
    public static function updateArticle () {
        
        if(isset($_GET['url']) && !empty($_GET['url'] )) {
            
            $id = explode('/', $_GET['url']);
        }
        
        $article = Article::getArticleContent($id);

        //display all categorie in a select html
        $allcategories = Categorie::displayCategories();

        //retrieve categories of the select article
        $categoriesArticle = Categorie::retrieveArticleCategories($id);

        //return a object table categories without the selected article categories
        $allcategories = array_udiff($allcategories, $categoriesArticle, function($a, $b) {return $a <=> $b;});

        Article::updateArticle($id);

        self::render('update-article', [$article, $allcategories, $categoriesArticle]);

    }

    // delete an article in the database with id
    public static function deleteArticle () {

        Article::deleteArticle();
        
    }

    //insert article.id into published table and know which articles is published
    public static function publishedArticle () {

        if(isset($_GET['url']) && !empty($_GET['url'] )) {

            $db = DataBase::getInstance();

            $id = explode('/', $_GET['url']);
            
            $query = $db->prepare('INSERT INTO `articles_publier`(`article_id`) VALUES (:id); ');
            $query->bindValue(':id', $id[1], PDO::PARAM_INT);
            $query->execute();
            
            header('location: /Zeremy-website/articles');

        }
    }
    
    //delete article.id from published table
    public static function unPublishedArticle () {
        
        if(isset($_GET['url']) && !empty($_GET['url'] )) {
                    
            $db = DataBase::getInstance();

            $id = explode('/', $_GET['url']);
            
            $query = $db->prepare('DELETE articles_publier FROM articles_publier JOIN article ON articles_publier.article_id = article.id WHERE article.id =:id;');
            $query->bindValue(':id', $id[1], PDO::PARAM_INT);
            $query->execute();
            
            header('location: /Zeremy-website/articles');
        }    
    }
    
    //retrieve published id articles and show publish button if not publish
    public static function publishedButton ($id) {
        
        $db = DataBase::getInstance();

        $query = $db->prepare('SELECT article_id FROM `articles_publier`');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_COLUMN, 0);
        
        $pubIdArticle = $query->fetchAll();
        
        if (in_array($id, $pubIdArticle)) {
            return false;
        }
        else {
            return true;
        }
    }
}
