<?php

class PortfolioController extends AbstractController {

    //display all articles when is publish
    public static function publishedArticles () {

        $articles = Article::displayPublishedArticles();

        $articles = array_reverse($articles);

        self::renderBis('portfolio', $articles);
    }
}