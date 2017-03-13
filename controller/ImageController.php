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
            $userid = 1;
            $imageRepository = new ImageRepository();

            $mistakeTitle = $this->validateTitle($title);
            if($mistakeTitle == false){
                $_SESSION["errorTitle"] = '<p style="color:red;">Invalid title!</p>';
            }
            if($mistakeTitle == false){
                header('Location: /image/upload');
                return false;
            }
            $imageFileType = pathinfo($image,PATHINFO_EXTENSION);
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $_SESSION["errorImage"] = '<p style="color:red;">Invalid filetype (filetype must be: jpg, png, jpeg)!</p>';
                header('Location: /image/upload');
                return false;
            }
            if (!$imageRepository->upload($title, $image, $image_path, $userid)){
                header("Location: /image/upload");
            }else {
                $value = "uploaded";
                setcookie("imageUploaded", $value, time()+ 5);
                header("Location: /");
            }
        }
    }
    public function validateTitle($title)
    {
            return true;
        }
        return false;
    }
}