<?php

class ArticleController extends AbstractController {

    private static ?string $validArticle = null;

    private static ?array $notValidArticle = [];

    // getter
    public static function getValidArticle () {

        return self::$validArticle;
    }

    public static function getnotValidArticle () {

        return self::$notValidArticle;
    }
    
    // display all article from the database in a html list
    public static function displayAllArticle() {

        $articles = Article::displayArticle();

        $articles = array_reverse($articles);

        self::render('articles', $articles);

    }

    // add an new article in the database with add categorie
    public static function addNewArticle () {

        self::$validArticle = null;
        
        if (Errors::checkErrorAddArticle()) {
        
            self::$notValidArticle = Errors::getErrors();
        }
        
        else {
            
            $result = Article::newArticle();
            
            if ($result)
                $lastId = Article::retrievelastArticleId();
    
            if (isset($_POST['category']) && !empty($_POST['category']) && $result) {
    
                //use foreach for the case where we have more than 1 categorie
                foreach($_POST['category'] as $category) {
    
                    $result = Category::insertJunctionTableCategory($lastId, $category);
                }
            }
    
            if ($result === true) {
    
                self::$validArticle = 'article valider et sauvegarder';
            }
        }
        
        // add a categorie
        if (isset($_POST['addCategory']))
            self::$validArticle = Category::addCategory();
        
        // display all categorie in a select html
        $category = Category::displayCategory();

        //render
        self::render('new-article',$category);

    }

    // update an already created article in the database
    public static function updateArticle () {
        
        if(isset($_GET['url']) && !empty($_GET['url'] )) {
            
            $id = explode('/', $_GET['url']);
        
        }
        $article = Article::getArticleContent($id);

        //display all categorie in a select html
        $allcategory = Category::displayCategory();

        //retrieve categories of the select article
        $categoryArticle = Category::retrieveArticleCategory($id);

        //return a object table categories without the selected article categories
        $allcategory = array_udiff($allcategory, $categoryArticle, function($a, $b) {return $a <=> $b;});

        Article::updateArticle($id);

        self::render('update-article', [$article, $allcategory, $categoryArticle]);

    }

    // delete an article in the database with id
    public static function deleteArticle () {

        Article::deleteArticle();
        
    }

    //insert article.id into published table and know which articles is published
    public static function publishArticle () {

        if(isset($_GET['url']) && !empty($_GET['url'] )) {

            $db = DataBase::getInstance();

            $id = explode('/', $_GET['url']);
            
            Article::publishArticleId($id);
            
            header('location: /Zeremy-website/articles');

        }
    }
    
    //delete article.id from published table
    public static function unPublishArticle () {
        
        if(isset($_GET['url']) && !empty($_GET['url'] )) {
                    
            $db = DataBase::getInstance();

            $id = explode('/', $_GET['url']);
            
            Article::unPublishArticle($id);
            
            header('location: /Zeremy-website/articles');
        }    
    }
    
    //retrieve published id articles and show publish button if not publish, else show unpublish button
    public static function publishButton ($id) {
        
        $pubIdArticle = Article::retrieveAllPublishArticle();
        
        if (in_array($id, $pubIdArticle)) {
            return false;
        }
        else {
            return true;
        }

    }
}
