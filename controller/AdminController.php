<?php
require_once '../repository/UserRepository.php';
require_once '../repository/PostImageRepository.php';
/**
 * Siehe Dokumentation im DefaultController.
 */

class AdminController
{
    public function index()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "admin_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $userRepository = new UserRepository();
        $postRepository = new PostImageRepository();

        $view = new View('admin_index');
        $view->title = 'Admin';
        $view->heading = 'Admin';
        $view->users = $userRepository->readAll();
        $view->post = $postRepository->readAll();
        $view->display();
    }
}