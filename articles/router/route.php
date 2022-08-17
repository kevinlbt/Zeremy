<?php

$route = $_GET['p'];

if ($route === "articles") {

    $templates = "articles";
    $articles = ArticleController::displayArticle();

}

if ($route === "addArticle") {

    $templates = "new-article";
    ArticleController::addNewArticle();

}

if ($route === "updateArticle") {

    $templates = "update-article";
    $article = ArticleController::retrieveOneArticle();
    ArticleController::updateArticle();

}

if ($route === "deleteArticle") {

    ArticleController::deleteArticle();

}