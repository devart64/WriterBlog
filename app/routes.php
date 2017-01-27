<?php

// Home page
$app->get('/', "WriterBlog\Controller\HomeController::indexAction")
    ->bind('home');

// Detailed info about an article
$app->match('/article/{id}', "WriterBlog\Controller\HomeController::articleAction")
    ->bind('article');

// Login form
$app->get('/login', "WriterBlog\Controller\HomeController::loginAction")
    ->bind('login');

$app->match('/register', "WriterBlog\Controller\HomeController::registerAction")
    ->bind('register')
    ->method('GET|POST');

// Admin zone
$app->get('/admin', "WriterBlog\Controller\AdminController::indexAction")
    ->bind('admin');

// Add a new article
$app->match('/admin/article/add', "WriterBlog\Controller\AdminController::addArticleAction")
    ->bind('admin_article_add');

// Edit an existing article
$app->match('/admin/article/{id}/edit', "WriterBlog\Controller\AdminController::editArticleAction")
    ->bind('admin_article_edit');

// Remove an article
$app->get('/admin/article/{id}/delete', "WriterBlog\Controller\AdminController::deleteArticleAction")
    ->bind('admin_article_delete');

// Edit an existing comment
$app->match('/admin/comment/{id}/edit', "WriterBlog\Controller\AdminController::editCommentAction")
    ->bind('admin_comment_edit');

// Remove a comment
$app->get('/admin/comment/{id}/delete', "WriterBlog\Controller\AdminController::deleteCommentAction")
    ->bind('admin_comment_delete');

// Add a user
$app->match('/admin/user/add', "WriterBlog\Controller\AdminController::addUserAction")
    ->bind('admin_user_add');

// Edit an existing user
$app->match('/admin/user/{id}/edit', "WriterBlog\Controller\AdminController::editUserAction")
    ->bind('admin_user_edit');

// Remove a user
$app->get('/admin/user/{id}/delete', "WriterBlog\Controller\AdminController::deleteUserAction")
    ->bind('admin_user_delete');


$app->get('/about', "WriterBlog\Controller\HomeController::aboutAction")
    ->bind('about');
