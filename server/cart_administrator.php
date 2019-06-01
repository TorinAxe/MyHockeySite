<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include 'mysql_func.php';

function showMyCart($db)
{
    if (!(isset($_SESSION["cart"]))) {
        echo ' У вас нет заказов';
        exit;
    };
    $cart = $_SESSION['cart'];
    if (count($cart) == 0) {
        echo 'У вас нет заказов';
        exit;
    }
    echo ' <link href="css/items.css" media="screen" rel="stylesheet">
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
            </thead><tbody>
    ';
    $kol = 1;
    $sum = 0;
    for ($i = 0; $i < count($cart); $i++){
        $idProduct = $cart[$i]["idProduct"];
        $query = 'select * from items_list where id = '.$idProduct;
        $results = mysqli_query($db, $query);
        while($row = mysqli_fetch_array($results)){

            echo '  <tr class="order_item"> 
                        <td class="item_img" xmlns="http://www.w3.org/1999/html"><a href="productdetail.php?item_id=' .$row['id'].'"><img src="'.$row["image"].'" class="item_img" alt=""></a></td>
                        <td class="item_text">'.$row["name"].'</td>
                        <td align ="center"><input class="count" type ="number" autocomplete ="on" min="1" onchange="onCountItemsChange(this)" max="'.$row["quantity"].'" value="1"></td>
                        <td class="product_price" name="price" align = "center ">'.$row["cost"].' &#8381;</td>
                        <td id="totalPrice" class="totalSum"></td>
                        <td align ="center"> <button class="btn large_btn shadow_btn" type=button  onClick="delFromCart(this, '.$row["id"].')">Удалить</button></td>
                    </tr>
           ';
            $kol1 =
            $sum +=  $row["cost"];
        }

    }echo '    </tbody>
            </table>
            <br>
            <br>
            <p class="final_sum rus_style" id="orderCost">Игого:'.$sum.' &#8381;</p>
            <a href="order.php" class="final_sum rus_style">Перейти к оплате</a>
';
}

function addToCart($id)
{
    $cart = $_SESSION['cart'];
    $newProduct["idProduct"] = $id;
    $cart[count($cart)] = $newProduct;
    $_SESSION['cart'] = $cart;
}

function deleteFromCart($id)
{
    $newCart = array();
    $cart = $_SESSION['cart'];
    for ($i = 0; $i < count($cart); $i++){
        $idProduct = $cart[$i]["idProduct"];
        if ($id != $idProduct){
            $newCart[count($newCart)] = $cart[$i];
        }
    }
    $_SESSION['cart'] = $newCart;
}

switch ($_GET['command'])
{
    case 'addToCart':
        addToCart($_GET['item_id']);
        echo $_GET['item_id']." ".$_SESSION['username'];
        break;
    case 'showMyCart':
        showMyCart($db);
        break;
    case 'delFromCart':
        deleteFromCart($_GET['item_id']);
        echo "Deleted";
    default:
        echo 'Unknown command';
}


?>