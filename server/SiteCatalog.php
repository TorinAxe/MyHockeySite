<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 26.05.2019
 * Time: 17:19
 */
include "CatalogPage.php";

class SiteCatalog
{
    private $db;
    private $user;
    private $page;


    function __construct($dataBase, $user)
    {
        $this->db = $dataBase;
        $this->user = $user;
    }

    public function getPagesCount($item_onPages)
    {

    }

    public function getPage($pageNumber, $itemsOmPage){
        $this->page = new CatalogPage($this->user, $itemsOmPage);
        $first_item = ($pageNumber - 1) * $itemsOmPage;

        $sql = mysqli_query($this->db, "SELECT `id`, `name`, `cost` , `image` from items_list ORDER  BY cost DESC ");

        $item = 0;
        while ($result = mysqli_fetch_array($sql)) {
            if ($item < $first_item)
            {
                continue;
            }
            else{
                if ($item < $itemsOmPage)
                {
                    $this->page->addItem($result);
                    $item++;
                }
                else break;
            }
        }
        return $this->page;
    }
}