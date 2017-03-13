<?php
require_once '../repository/AdminRepository.php';
require_once '../repository/UserRepository.php';
require_once '../repository/ImageRepository.php';
/**
 * Created by PhpStorm.
 * User: bhawks
 * Date: 13.03.2017
 * Time: 15:45
 */
class AdminController
{
    /**
     * Die index Funktion des DefaultControllers sollte in jedem Projekt
     * existieren, da diese ausgeführt wird, falls die URI des Requests leer
     * ist. (z.B. http://my-project.local/). Weshalb das so ist, ist und wann
     * welcher Controller und welche Methode aufgerufen wird, ist im Dispatcher
     * beschrieben.
     */
    public function index()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $adminRepository = new AdminRepository();
        $userRepository = new UserRepository();
        $imageRepository = new ImageRepository();

        $view = new View('admin_index');
        $view->title = 'Admin';
        $view->heading = 'Admin';
        $view->users = $userRepository->readAll();
        $view->image = $imageRepository->readAll();
        $view->display();
    }
}