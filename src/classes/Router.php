<?php


class Router {
    
    public $routes = [];
    public $path = [];
    
    public function __construct($route) {
        
        $this->path = explode("/", $route);
    }
    
    public function addRoute ($route, $callback) {
        
        array_push($this->routes, new Route($route, $callback));
    }
    
    public function resolve () {
        
        foreach ($this->routes as $route) {
            
            if ($route->path[0] === $this->path[0]) {
                
                call_user_func($route->callback);
                
            }   
        }   
    }

    public function addAllRoutes () {

        $this->addRoute('portfolio', ['PortfolioController','publishedArticles']);

        $this->addRoute('login',['AuthController','login']);

        if (Authenticator::isLogged()) {

            $this->addRoute('logout',['AuthController','logout']);

            $this->addRoute('articles',['ArticleController','displayAllArticle']);

            $this->addRoute('new-article',['ArticleController','addNewArticle']);

            $this->addRoute('deleteArticle',['ArticleController','deleteArticle']);

            $this->addRoute('update-article',['ArticleController','updateArticle']);
            
            $this->addRoute('publishedArticle',['ArticleController','publishedArticle']);
            
            $this->addRoute('unPublishedArticle',['ArticleController','unPublishedArticle']);

        }
    }
    
}


class Route {
    
    public $path;
    public $callback;
   
    public function __construct ($route, $callback) {
        
        $this->path = explode('/', $route);
        $this->callback = $callback;
    }
    
}