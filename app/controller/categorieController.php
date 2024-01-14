<?php
require_once(__DIR__ . '/../model/categorieModel.php');
require_once(__DIR__ . '/../config/database.php');



class categorieController
{

    public function AddCategories()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addcat'])) {
            $categorie = new CategorieModel();
            $categorie->setCategorie($_POST['nomCategorie']);
            $currentDateTime = date('Y-m-d H:i');
            $categorie->setDateCategorie($currentDateTime);
            $categorieCreated = $categorie->addcategorie();

            if ($categorieCreated) {
                header('Location: categories.php');
                exit;
            } else {
                return "La catégorie existe déjà !";
            }
        }
    }


    public function DisplayCategories()
    {
        $cat = new CategorieModel();
        return $cat->DisplayCategorie();
    }

    public function EditCategories()
    {
        $categorie = new CategorieModel();
        if (isset($_POST['editcat']) && isset($_POST['categorieID'])) {
            $idcat = $_POST['categorieID'];
            $categorie->setCategorie($_POST['nomCategorie']);
            $currentDateTime = date('Y-m-d H:i');
            $categorie->setDateCategorie($currentDateTime);
            $categorieUpdated = $categorie->editCategorie($idcat);

        if ($categorieUpdated) {
            header('Location: categories.php');
            exit;
        } else {
            return "La catégorie existe déjà !";
        }
           
        }
    }

    public function deleteCategorie()
    {
        if (isset($_GET['deletecat']) && isset($_GET['categorieID']) ) {
            $categorieID = $_GET['categorieID'];
            $categorie = new CategorieModel();
            $categorie->deleteCategorie($categorieID);
            header('Location: categories.php');
            exit();
        }
    }
}
