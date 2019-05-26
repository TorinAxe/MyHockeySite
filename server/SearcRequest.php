<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 26.05.2019
 * Time: 20:20
 */

class SearcRequest
{
    private $searchText;
    private $maximumCoast;
    private $catalogs;
    private $category_id;

    function __construct($searchText,$maximumCoast, $catalogs, $category_id)
    {
        $this->searchText = trim(strip_tags($searchText));
        $this->maximumCoast = trim(strip_tags($maximumCoast));
        $this->catalogs = trim(strip_tags($catalogs));
        $this->category_id = trim(strip_tags($category_id));
    }

    public function getCountRequest()
    {
        return "SELECT COUNT(*) FROM items_list";
    }

    public function getRequest()
    {
        if ($this->searchText){
            $search =  explode(" ",$this->searchText);
            $count = count($search);
            $array = array();
            $i = 0;
            foreach ($search as $key) {
                $i++;
                if($i <$count)
                    $array[] =  "CONCAT (`name`, `cost`) LIKE '%".$key."%' OR ";
                else
                    $array[] = "CONCAT (`name`, `cost`) LIKE '%".$key."%'";
            }
            return "Select * From `items_list`  where ".implode("", $array);
        }
        else if ($this->category_id){
            return "SELECT `id`, `name`, `cost` , `image` from items_list WHERE id_items_category = $this->category_id  ORDER  BY cost DESC ";
        }
        else{
           return "SELECT `id`, `name`, `cost` , `image` from items_list ORDER  BY cost DESC ";
        }

    }
}