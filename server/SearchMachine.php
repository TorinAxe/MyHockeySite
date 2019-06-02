<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 26.05.2019
 * Time: 17:15
 */

class SearchMachine
{
    private $db;
    private $user;
    private $page;

    function __construct($dataBase, $user)
    {
        $this->db = $dataBase;
        $this->user = $user;
    }

    public function getPagesCount($itemsOnPages, $request)
    {
        $items_count = mysqli_fetch_array(mysqli_query($this->db, $request->getCountRequest()));
        return ceil($items_count[0] / $itemsOnPages);
    }

    public function getPage($pageNumber, $itemsOnPage, $request){
        $this->page = new CatalogPage($this->user, $itemsOnPage);
        $first_item = ($pageNumber - 1) * $itemsOnPage;

        $sql = mysqli_query($this->db, $request->getRequest());

        $currentItem = 0;
        while ($result = mysqli_fetch_array($sql)) {
            if ($currentItem < $first_item)
            {
                $currentItem++;
                continue;
            }
            else{
                if ($currentItem - $first_item < $itemsOnPage)
                {
                    $this->page->addItem($result);
                    $currentItem++;
                }
                else break;
            }
        }
        return $this->page;
    }
}