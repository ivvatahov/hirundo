<?php

class uploadController extends baseController
{

    public function index()
    {

        $this->authentication->sec_session_start();
        if($this->authentication->login_check() == false) 
        { 
            redirect("login");
        }

        $username = htmlentities($_SESSION['username']);
        $id = uniqid();
   
   /* //$target_dir = "/resources/submissions/";
   // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   // $uploadOk = 1;
// Check if image file is a actual image or fake image

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "zip" && $imageFileType != "rar") {
        echo "Sorry, only ZIP and RAR files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}*/
        $desk = $this->registry->userRepository->getUserByUsername($username)->getDesk();

        $document = new Document();

        //LOCATION!!!
        $document->setLocation("here");
        $document->setId($id);
        $document->setDate(new MongoDate());

        //S_POST['comment'] !!!!
        $document->setComment("Comment");

        // add to mongo
        $this->registry->userRepository->addDocument($username, $document);
        
        // change current version
        $this->registry->userRepository->setCurrent($username, $document);
    }
}
?>