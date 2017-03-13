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
            if (!$imageRepository->upload($title, $image, $image_path, $userid)){
                header("Location: /image/upload");
            }else {
                header("Location: /");
            }
            

        }

    }
}