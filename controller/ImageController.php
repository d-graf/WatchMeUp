<?php
require_once '../repository/ImageRepository.php';
/**
 * Siehe Dokumentation im DefaultController.
 */
class ImageController
{
    public function index()
    {
        $imageRepository = new ImageRepository();
        $view = new View('image_index');
        $view->title = 'Upload';
        $view->heading = 'Upload ';
        $view->image = $imageRepository->readAll();
        $view->display();
    }
    public function upload()
    {
        $imageRepository = new ImageRepository();
        $view = new View('image_upload');
        $view->title = 'Upload';
        $view->heading = 'Upload';
        $view->image = $imageRepository->readAll();
        $view->display();
    }
    public function doUpload()
    {
        if ($_POST['post']) {
            $title = $_POST['title'];
            $image = $_FILES['image']['name'];
            $image_path = $_FILES['image']['tmp_name'];
            $imageRepository = new ImageRepository();

            /**
             *
             * Validations Funktionen werden aufgerufen, falls nicht valide wird eine Session Variable erstellt welche
             * im image_upload.php aufgerufen wird.
             *
             */
            $mistakeTitle = $this->validateTitle($title);
            if($mistakeTitle == false){
                $_SESSION["errorTitle"] = '<p style="color:red;">Invalid title!</p>';
            }
            if($mistakeTitle == false){
                header('Location: /image/upload');
                return false;
            }
            /**
             *
             * Validiert ob File ein jpg, jpeg, png oder gif ist
             * Falls dies der Fall ist wird ein Cookie gesetzt welches im image_upload.php aufgerufen wird.
             *
             */
            $imageFileType = pathinfo($image,PATHINFO_EXTENSION);
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $_SESSION["errorImage"] = '<p style="color:red;">Invalid filetype (filetype must be: jpg, png, jpeg)!</p>';
                header('Location: /image/upload');
                return false;
            }
            if (!$imageRepository->upload($title, $image, $image_path)){
                header("Location: /image/upload");
            }else {
                $value = "uploaded";
                setcookie("imageUploaded", $value, time()+ 5);
                header("Location: /");
            }
        }
    }
    /**
     * Validiert den Titel des Posts und gibt demnach eine Fehlermeldung zurück
     *
     * @param $title Wert für den Titel
     */
    public function validateTitle($title)
    {
        if(strlen($title) > 0 && strlen($title)<= 10){
            return true;
        }
        return false;
    }
    public function delete()
    {
        $imageRepository = new ImageRepository();
        $imageRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: '. $_SERVER["HTTP_REFERER"]);
    }

    public function edit()
    {
        if(!isset($_GET['id'])){
            header("Location: /");
        }
        $id = $_GET['id'];

        $imageRepository = new ImageRepository();
        $view = new View('image_edit');
        $view->title = 'Edit';
        $view->heading = 'Edit';
        $view->image = $imageRepository->readById($id);
        $view->display();

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        //header('Location: /admin');
    }

    /**
     *
     * Funktion des Admin (Edit), validiert den Titel nach 10 Zeichen und ruft dann editTitleById() auf
     *
     */
    public function doEdit() {
        if ($_POST['edit']) {
            $newTitle = $_POST['newTitle'];
            $id = $_POST['id'];

            $imageRepository = new ImageRepository();

            $mistakeTitle = $this->validateTitle($newTitle);
            if($mistakeTitle == false){
                $_SESSION["errorTitle"] = '<p style="color:red;">Invalid title!</p>';
            }
            if($mistakeTitle == false){
                header('Location: ' . $_SERVER["HTTP_REFERER"]);
                return false;
            }

            $imageRepository->editTitleById($newTitle, $id);
            header("Location: /admin");
        }
    }
}