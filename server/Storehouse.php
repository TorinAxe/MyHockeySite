<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.06.2019
 * Time: 16:25
 */

class Storehouse
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getItemByID($id)
    {
        return mysqli_fetch_array(mysqli_query($this->database,"SELECT * from items_list WHERE id = $id"));
    }


    public function isNecessaryItems($id, $count)
    {
        $availableItemsCount = $this->getAvaliableItemsByID($id);
        if ( $availableItemsCount < $count)
        {
            echo "извините но необходимого колличества товара нет на складе. Всего на складе ".$availableItemsCount;
            return false;
        }
        return true;
    }

    public function getAvaliableItemsByID($id)
    {
        $query = "SELECT `quantity` from items_list WHERE id = $id";
        $result = mysqli_fetch_array(mysqli_query($this->database,$query));
        return $result['quantity'];
    }

}