<?php

// require 'vendor/autoload.php';
require 'src/classes/router.php';

require 'src/classes/Article.php';

require 'src/classes/abstractController.php';
require 'src/controllers/ArticleController.php';


$route = $_GET['url'];

$page = new Router($route);

$page->addRoute('articles',['ArticleController','displayArticle']);

$page->addRoute('new-article',['ArticleController','addNewArticle']);

$page->addRoute('deleteArticle',['ArticleController','deleteArticle']);

$page->addRoute('update-article',['ArticleController','updateArticle']);

$page->resolve();


