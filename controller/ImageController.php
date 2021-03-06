<?php
require_once '../repository/ImageRepository.php';
require_once '../lib/Validate.php';
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
            $validate = new Validate();
            $mistakeTitle = $validate->validateImageTitle($title);
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
            if (!$imageRepository->upload($title, $image_path)){
                header("Location: /image/upload");
            }else {
                $value = "uploaded";
                setcookie("imageUploaded", $value, time()+ 5);
                header("Location: /");
            }
        }
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

            $validate = new Validate();
            $mistakeTitle = $validate->validateImageTitle($newTitle);

            if($mistakeTitle == false){
                header('Location: ' . $_SERVER["HTTP_REFERER"]);
                return false;
            }

            $imageRepository->editTitleById($newTitle, $id);
            header("Location: /admin");
        }
    }
}
