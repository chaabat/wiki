<?php
require_once(__DIR__ . '/../model/tagModel.php');
require_once(__DIR__ . '/../config/database.php');



class tagController
{

    public function AddTags()
    {
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addtag'])) {
            $tag = new tagModel();
            $tag->setTag($_POST['nomTag']);
           $tagCreated = $tag->addTag();

            if ($tagCreated) {
                header('Location: tags.php');
                exit;
            } else {
                return "Le tag existe déjà !";
            }
           
        }
    }


    public function DisplayTags()
    {
        $cat = new tagModel();
        return $cat->DisplayTag();
    }

    public function EditTags()
    {
        $tag = new tagModel();
        if (isset($_POST['edittag']) && isset($_POST['tagID'])) {
            $idtag = $_POST['tagID'];
            $tag->settag($_POST['nomTag']);
            $tagUpdated = $tag->editTag($idtag);

            if ($tagUpdated) {
                header('Location: tags.php');
                exit;
            } else {
                return "Le tag existe déjà !";
            }
           
           
        }

    }

    public function deletetag()
    {
        if (isset($_GET['deletetag']) && isset($_GET['tagID']) ) {
            $tagID = $_GET['tagID'];
            $tag = new tagModel();
            $tag->deletetag($tagID);
            header('Location: tags.php');
            exit();
        }
    }
}
