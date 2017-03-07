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

        $view = new View('user_index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->image = $imageRepository->readAll();
        $view->display();
    }

    public function upload()
    {
        $imageRepository = new ImageRepository();

        $view = new View('image_upload');
        $view->title = 'Upload';
        $view->heading = 'Upload to WatchMeUp';
        $view->image = $imageRepository->readAll();
        $view->display();
    }

    public function doUpload()
    {
        if ($_POST['post']) {
            $title = $_POST['title'];
            $image = $_POST['image'];

            $imageRepository = new ImageRepository();
            $imageRepository->upload($title, $image);
        }
    }


}