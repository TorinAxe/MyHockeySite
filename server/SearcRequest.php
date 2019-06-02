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
        $this->catalogs = $catalogs;
        $this->category_id = trim(strip_tags($category_id));
    }

    public function getCountRequest()
    {
        return $this->getTemplateRequest("COUNT(*)");
    }

    public function getRequest()
    {
        return $this->getTemplateRequest("`id`, `name`, `cost` , `image`");
    }

    private function getTemplateRequest($wtf)
    {
        if (!empty($this->searchText) OR !empty($this->maximumCoast) OR !empty($this->catalogs))
        {
            $query_catalog = "";
            $query_max_cost = "";
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
            if (!empty($this->maximumCoast)) $query_max_cost = "AND cost <= $this->maximumCoast";
            if (!empty($this->catalogs)) $query_catalog = "AND id_items_category IN ($this->catalogs)";

            return "Select $wtf From `items_list`  where ".implode("", $array)." $query_catalog $query_max_cost ORDER  BY cost DESC";
        }
        else if (!empty($this->category_id))
        {
            return "SELECT $wtf from items_list WHERE id_items_category = $this->category_id  ORDER  BY cost DESC ";
        }
        else
        {
            return "SELECT $wtf from items_list ORDER  BY cost DESC ";
        }
    }
}