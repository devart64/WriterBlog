<?php

namespace WriterBlog\Controller;

use WriterBlog\Domain\User;
use WriterBlog\Form\Type\RegisterType;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WriterBlog\Domain\Comment;
use WriterBlog\Form\Type\CommentType;

class HomeController
{

    /**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app)
    {
        $articles = $app['dao.article']->findAll();
        return $app['twig']->render('index.html.twig', ['articles' => $articles]);
    }

    public function aboutAction(Application $app)
    {
        return $app['twig']->render('about.html.twig');
    }

    /**
     * Article details controller.
     *
     * @param integer $id Article id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function articleAction($id, Request $request, Application $app)
    {
        $article = $app['dao.article']->find($id);
        $commentFormView = null;
        if ($app['security.authorization_checker']->isGranted('IS_AUTHENTICATED_FULLY')) {
            // A user is fully authenticated : he can add comments
            $comment = new Comment();
            $comment->setArticle($article);
            $user = $app['user'];
            $comment->setAuthor($user);
            $commentForm = $app['form.factory']->create(CommentType::class, $comment);
            $commentForm->handleRequest($request);
            if ($commentForm->isSubmitted() && $commentForm->isValid()) {
                $app['dao.comment']->save($comment);
                $app['session']->getFlashBag()->add('success', 'Your comment was successfully added.');
            }
            $commentFormView = $commentForm->createView();
        }
        $comments = $app['dao.comment']->findAllByArticle($id);

        return $app['twig']->render('article.html.twig', [
            'article'     => $article,
            'comments'    => $comments,
            'commentForm' => $commentFormView
        ]);
    }

    /**
     * User login controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function loginAction(Request $request, Application $app)
    {
        return $app['twig']->render('login.html.twig', [
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
        ]);
    }


    /**
     * User registration controller.
     *
     * @param Request $request
     * @param Application $app Silex application
     * @return Response
     */
    public function registerAction(Request $request, Application $app)
    {
        $user = new User();
        $userForm = $app['form.factory']->create(RegisterType::class, $user);
        $userForm->handleRequest($request);
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            // generate a random salt value
            $salt = substr(md5(time()), 0, 23);
            $user->setSalt($salt);
            $plainPassword = $user->getPassword();
            // find the default encoder
            $encoder = $app['security.encoder.bcrypt'];
            // compute the encoded password
            $password = $encoder->encodePassword($plainPassword, $user->getSalt());
            $user->setPassword($password);
            $user->setRole('ROLE_USER');
            $app['dao.user']->save($user);

            return $app->redirect($app['url_generator']->generate('login'));
        }
        return $app['twig']->render('register.html.twig', [
            'title'    => 'New user',
            'userForm' => $userForm->createView()
        ]);
    }
}
