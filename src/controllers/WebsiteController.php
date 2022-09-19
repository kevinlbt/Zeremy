<?php

class WebsiteController extends AbstractController {

    //display all articles when is publish
    public static function publishedArticles () {
        
        $category = Category::displayCategory();

        self::renderBis('portfolio', $category);
    }
    
    public static function home () {
        
        self::renderBis('home');
    }
    
    public static function contact () {
        
        self::renderBis('contact');
        
    }
}