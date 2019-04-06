<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

include_once "functions/mysql_func.php";
include "functions/utils.php";
include "templates/header.php";
include "templates/menu.php";
include "templates/middle.php";
include "templates/content_begin.php";
echo '<form action="./search.php" method="post"><input type="text" name ="searchText" required placeholder="Что искать"><input type="submit" value="Поиск" name = "submit"></form>' ;
$cat = $_GET["category_id"];
$cat = strip_tags($cat);//удаление html and php tags
$cat =trim($cat);//удаление пробелов
$sql = mysqli_query($db, "SELECT `id`, `name`, `cost` , `image` from items_list WHERE id_items_category = $cat  ORDER  BY cost DESC ");
while ($result = mysqli_fetch_array($sql)) {
    if(isset($_SESSION['username'])){
        echo '  <link href="css/items.css" media="screen" rel="stylesheet">';
        echo '<div class="catalog_item">
            <div class="item_img">
                <a href="productdetail.php?item_id='.$result['id'].'"><img src="'.$result['image'].'" alt="Product 01"  /></a>
            </div>    
            <div class="item_text">
                <h3>'. $result['name'].'</h3>
                <p class="product_price">'.$result['cost'].' руб</p>
				<h4><input type=button value="В корзину" onClick="addToCart('.$result["id"].')"></h4>
            </div>
        </div>';
    }
    else{
        echo '<link href="css/items.css" media="screen" rel="stylesheet">';
        echo '<div class="catalog_item" >
            <div class="item_img">
                <a href="productdetail.php?item_id='.$result['id'].'"><img src="'.$result['image'].'" alt="Product 01"  /></a>
            </div>    
            <div class="item_text">
                <h3>'. $result['name'].'</h3>
                <p class="product_price">'.$result['cost'].' руб</p>
             </div>
        </div>';
    }
    echo '<link href="css/items.css" media="screen" rel="stylesheet">';
}
include "templates/content_end.php";
include "templates/footer.php";
?>