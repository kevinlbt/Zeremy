<?php

class PortfolioController extends AbstractController {

    //display all articles when is publish
    public static function publishedArticles () {

        $articles = Article::displayPublishedArticles();

        $articles = array_reverse($articles);
        
        $category = Category::displayCategory();

        self::renderBis('portfolio', [$articles, $category]);
    }
}