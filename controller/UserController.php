<?php

require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user_index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function register()
    {
        $view = new View('user_registration');
        $view->title = 'Registration';
        $view->heading = 'Register to WatchMeUp';
        $view->display();
    }

    public function logout()
    {
        $userRepository = new UserRepository();

        $view = new View('user_logout');
        $view->title = 'Logout';
        $view->heading = 'Logout';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function doRegister()
    {
        if ($_POST['send']) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password  = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->register($username, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        if ($_SESSION['loggedin'] = true){
            header('Location: /');
        }
    }

    public function doLogin()
    {
        if ($_POST['send']) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->login($username, $password);
        }
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            header('Location: /');
        }
        // Anfrage an die URI /user weiterleiten (HTTP 302)
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}