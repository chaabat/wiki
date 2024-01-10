<?php
require_once(__DIR__ . '../../model/wikiModel.php');

class wikiController
{

    public function AddWikis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addwiki'])) {
            $Wiki = new WikiModel();
    
            $categoryID = (int)$_POST['categorieID'];
            $iduser = $_SESSION['iduser'];
    
            $Wiki->setwiki($_POST['title']);
            $Wiki->setContent($_POST['content']);
            $Wiki->setCreationDate(date('Y-m-d H:i:s'));
    

           
            $wikiID = $Wiki->addWiki($iduser, $categoryID);
            if ($wikiID !== false) {
                if (!empty($_POST['selectedTagIds'])) {
                    $tagIDs = json_decode($_POST['selectedTagIds'], true);
    


               
    
                    foreach ($tagIDs as $tagID) {
                        $Wiki->addWikiTag($wikiID, $tagID);
                    }
                }
    
                header('Location: wikis.php');
                exit;
            } else {
                echo "Failed to add a new wiki.";
            }
        }
    }

    public function DisplayWikis()
    {
        $wiki = new wikiModel();
        return $wiki->DisplayWikis();
    }
    
    

}
