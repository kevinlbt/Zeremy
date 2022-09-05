<?php

class PortfolioController extends AbstractController {


    public static function publishedArticles () {

        $articles = Article::displayPublishedArticles();

        $articles = array_reverse($articles);

        self::renderz('portfolio', $articles);
    }
}