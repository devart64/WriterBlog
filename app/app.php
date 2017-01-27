<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../views',
]);
$app['twig'] = $app->extend('twig', function (Twig_Environment $twig, $app) {
    $twig->addExtension(new Twig_Extensions_Extension_Text());
    return $twig;
});
$app->register(new Silex\Provider\HttpCacheServiceProvider(), [
    'http_cache.cache_dir' => __DIR__ . '/cache/',
]);
$app->register(new Silex\Provider\AssetServiceProvider(), [
    'assets.version' => 'v1'
]);
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), [
    'security.firewalls'  => [
        'secured'       => [
            'pattern'   => '^/',
            'anonymous' => true,
            'logout'    => true,
            'form'      => ['login_path' => '/login', 'check_path' => '/login_check'],
            'users'     => function () use ($app) {
                return new WriterBlog\DAO\UserDAO($app['db']);
            },
        ],
    ],
    'security.role_hierarchy' => [
        'ROLE_ADMIN' => ['ROLE_USER'],
    ],
    'security.access_rules' => [
        ['^/admin', 'ROLE_ADMIN'],
    ],
]);

$app->register(new Silex\Provider\MonologServiceProvider(), [
    'monolog.logfile' => __DIR__ . '/../var/logs/WriterBlog.log',
    'monolog.name'    => 'WriterBlog',
    'monolog.level'   => $app['monolog.level']
]);


$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());

// Register services
$app['dao.article'] = function ($app) {
    return new WriterBlog\DAO\ArticleDAO($app['db']);
};
$app['dao.user'] = function ($app) {
    return new WriterBlog\DAO\UserDAO($app['db']);
};
$app['dao.comment'] = function ($app) {
    $commentDAO = new WriterBlog\DAO\CommentDAO($app['db']);
    $commentDAO->setArticleDAO($app['dao.article']);
    $commentDAO->setUserDAO($app['dao.user']);
    return $commentDAO;
};


// Register error handler
$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    switch ($code) {
        case 403:
            $message = 'Access denied.';
            break;
        case 404:
            $message = 'Nope, not here.';
            break;
        case 405:
            $message = 'An error has occurred. Not allowed!';
            break;
        case 500:
            $message = 'An error has occurred. Internal server error!';
            break;
        case 503:
            $message = 'An error has occurred. Service unavailable!';
            break;
        default:
            $message = "Something went wrong.";
    }
    return $app['twig']->render('error.html.twig', ['message' => $message,
                                                    'code'    => $code]);
});
