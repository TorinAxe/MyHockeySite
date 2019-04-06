<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include 'functions/mysql_func.php';


$action = $_POST["action"];
if ($action == 'show') {
    if (!(isset($_SESSION["cart"]))) {
        echo ' У вас нет заказов';
        exit;
    };
    $cart = $_SESSION['cart'];
    if (count($cart) == 0) {
        echo 'У вас нет заказов';
        exit;
    }
}

    echo ' <link href="css/items.css" media="screen" rel="stylesheet">
        <table class="super_table" width="700px" cellpadding="5px"  >
            <thead>
                <tr>
                    <th width="90" >Изображение</th>
                    <th width="110">Назание</th>
                    <th width="90" >Количество</th>
                    <th width="90" >Цена</th>
					<th width="90" ></th>
                </tr>
            </thead><tbody>
    ';
	$kol = 1;
    $sum = 0;
    for ($i = 0; $i < count($cart); $i++){
        $idProduct = $cart[$i]["idProduct"];

        $query = 'select * from items_list where id = '.$idProduct;
        $results = $db->query($query);
        while($row = $results->fetch_assoc()){

            echo '  <td class="item_img"><a href="productdetail.php?item_id='.$row['id'].'"><img src="'.$row["image"].'" class="item_img" alt=""></a></td>
					<td class="item_text">'.$row["name"].'</td>
					<td align ="center"><input  id ="kol'.$row['id'].'" type ="number" autocomplete ="on" min="1" max="'.$row["quantity"].'" value="1" ></td>
                    <td class="product_price" align = "center ">'.$row["cost"].' руб.</td>
					<td align ="center"> <input type="button" value="Убрать" onClick="delFromCart('.$row["id"].')"</td>
                <tr></tr>
           ';
		 $kol =  
         $sum +=  $row["cost"];
        }
		
    }echo '    </tbody>
            </table>
            <br>
            <br>
            <p class="final_sum">Игого:'.$sum.' руб.</p>
';

############################
if ($action == 'add'){
    $cart = $_SESSION['cart'];

    $id = $_POST['id'];

    $newProduct["idProduct"] = $id;

    $cart[count($cart)] = $newProduct;

    $_SESSION['cart'] = $cart;
}

###########################
if ($action == 'del'){
    $id = $_POST["id"];
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

?>