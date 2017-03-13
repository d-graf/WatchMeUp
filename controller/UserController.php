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
            $confpassword = $_POST['confpassword'];

            $mistakeName = $this->validateName($username);
            if($mistakeName == false){
                $_SESSION["errorName"] = '<p style="color:red;">Invalid username!</p>';
            }

            $mistakeEmail = $this->validateEmail($email);
            if($mistakeEmail == false){
                $_SESSION["errorEmail"] = '<p style="color:red;">Invalid Email!</p>';
            }

            $mistakePw = $this->validatePw($password);
            if($mistakePw == false){
                $_SESSION["errorPw"] = '<p style="color:red;">Invalid password!</p>';
            }

            $mistakeconfPw = $this->confirmPw($confpassword);
            if($mistakeconfPw == false){
                $_SESSION["errorconfPw"] = '<p style="color:red;">Not the same password!</p>';
            }

            if($mistakeName == false){
                header('Location: /user/register');
                return false;
            }if($mistakeEmail == false){
                header('Location: /user/register');
                return false;
            }if($mistakePw == false){
                header('Location: /user/register');
                return false;
            }if($mistakeconfPw == false){
                header('Location: /user/register');
                return false;
            }

            $userRepository = new UserRepository();
            $userRepository->register($username, $email, $password);

        }
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        if ($_SESSION['loggedin'] = true){
            header('Location: /');
        }
    }

    /*Validate functions to validate registration*/

    public function validateName($username)
    {
        if(strlen($username) > 0){
            return true;
        }
        return false;
    }

    public function validatePw($password)
    {
        if(preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)){
            return true;
        }
        return false;
    }

    public function confirmPw($confpassword)
    {
        if($confpassword == $_POST['password']){
            return true;
        }
        return false;
    }

    public function validateEmail($email)
    {
        if(strlen($email) > 0){
            return true;
        }
        return false;
    }

    /*--------------------------------------------*/

    public function doLogin()
    {
        if ($_POST['send']) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->login($username, $password);
        }
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            header('Location: /');
        }
        else{
            $_SESSION["errorLogin"] = '<p style="color:red;">Wrong username or password!</p>';
            header('Location: /user');
        }
        // Anfrage an die URI /user weiterleiten (HTTP 302)
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: '. $_SERVER["HTTP_REFERER"]);
    }
}