<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.06.2019
 * Time: 11:42
 */
include "Storehouse.php";

class Cart
{
    private $db;
    private $userCart;
    private $storehouse;

    function __construct($db , $userName)
    {
        $this ->db = $db;
        $this->storehouse = new Storehouse($db);
        /**
          1. Проверить что пользователь имеет корзину
          2. Если пользователь не имеет корзину создать
          3. Если имеет то заносим имя корзины в переменею usercart
          4. Инициализация завершена
         */
        $request = mysqli_fetch_array(mysqli_query($db , "SELECT `cart_name` FROM `users_list` WHERE `nick_name` =  '$userName'"));
        if ($request[0] === 'NULL')
        {
            $this->create($userName);
        }
        else
        {
            $this ->userCart = $request[0];
        }
    }

    public function show()
    {
       if ($this->isEmpty())
       {
          echo "Корзина пуста";
          return;
       }

       echo '
       <link href="css/items.css" media="screen" rel="stylesheet">
           <table class="super_table" width="700px" cellpadding="5px">
                <thead>
                    <tr>
                        <th width="90" >Изображение</th>
                        <th width="110">Назание</th>
                        <th width="90" >Количество</th>
                        <th width="90" >Цена</th>
                        <th width="90"> Полная</th>
                        <th width="90" ></th>
                    </tr>
                </thead>
                <tbody>
        ';

        $totalCost = 0;
        $cartList = $this->getItemIDList();
        while($row = mysqli_fetch_array($cartList))
        {
            $item = $this->storehouse->getItemByID($row['item_id']);
            $quality = $row['count'];
            echo '
                        <tr class="order_item"> 
                            <td class="item_img" xmlns="http://www.w3.org/1999/html"><a href="productdetail.php?item_id=' .$item['id'].'"><img src="'.$item["image"].'" class="item_img" alt=""></a></td>
                            <td class="item_text">'.$item["name"].'</td>
                            <td align ="center"><input class="count" type ="number" autocomplete ="on" min="1" onchange="onCountItemsChange(this)" max="'.$item['quantity'].'" value="'.$quality.'"></td>
                            <td class="product_price" name="price" align = "center ">'.$item["cost"].' &#8381;</td>
                            <td id="totalPrice" class="totalSum"></td>
                            <td align ="center"> <button class="btn large_btn shadow_btn" type=button  onClick="delFromCart(this, '.$item["id"].')">Удалить</button></td>
                        </tr>';
            $totalCost +=  $item["cost"] * $quality;
        }

        echo '
                </tbody>
            </table>
        <br>
        <br>
        <p class="final_sum rus_style" id="orderCost">Игого:'.$totalCost.' &#8381;</p>
        <a href="order.php" class="final_sum rus_style">Перейти к оплате</a>';
    }

    public function updateItem($id, $count)
    {
        if (!($this->storehouse->isNecessaryItems($id, $count))) return;
        $query = "UPDATE $this->userCart SET `count` = '$count' WHERE `item_id` = '$id'";
        mysqli_query($this->db, $query);
        echo "товар был добавлен в корзину";
    }

    public function insertItem($id, $count)
    {
        if (!($this->storehouse->isNecessaryItems($id, $count))) return;
        $query = "INSERT INTO `".$this->userCart."` (`item_id`, `count`) VAlUE ('$id' , '$count')";
        mysqli_query($this->db, $query);
        echo "товар был добавлен в корзину";
    }

    public function deleteItem($id)
    {
        
    }

    public function isEmpty()
    {
        return ($this->getItemListSize()) ? false : true;
    }

    public function  isItemInCart($id)
    {
        $result = $this->getItemID($id);
        return ($result['item_id']) ? true : false;
    }

    public function getItemListSize()
    {
        $query = "SELECT COUNT(*) FROM `".$this->userCart."`";
        $result = mysqli_fetch_array(mysqli_query($this->db, $query));
        return $result[0];
    }

    public function getItemsCountWithID($id)
    {
        $result = $this->getItemID($id);
        return $result['count'];
    }

    private function getItemID($id)
    {
        $query = "SELECT * FROM `".$this->userCart."` WHERE `item_id` = '$id' ";
        return mysqli_fetch_array(mysqli_query( $this ->db, $query));
    }

    public function getItemIDList()
    {
        $query = "SELECT * FROM `".$this->userCart."`";
        return mysqli_query($this->db, $query);
    }

    private function create($userName)
    {
        $this ->userCart = $userName."_cart";
        $query = "CREATE TABLE `".$this->userCart."` (`item_id` INT(4) , `count` INT(4))";
        mysqli_query($this->db, $query);
        $query = "UPDATE `users_list` SET `cart_name`= '".$this->userCart."' WHERE `nick_name` ='$userName'";
        mysqli_query($this->db, $query);
    }

    private function destroy($userName)
    {

    }

}