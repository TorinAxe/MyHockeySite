<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "server/mysql_func.php";
include "templates/header.php";
include "templates/content_begin.php";
$items_count = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM items_list"));
$id = rand(1,$items_count[0]);
$ritem1 = mysqli_fetch_array(mysqli_query($db,"SELECT * from items_list WHERE id = $id" ));
$id = rand(1,$items_count[0]);
$ritem2 = mysqli_fetch_array(mysqli_query($db,"SELECT * from items_list WHERE id = $id" ));
$id = rand(1,$items_count[0]);
$ritem3 = mysqli_fetch_array(mysqli_query($db,"SELECT * from items_list WHERE id = $id" ));
$item_id = $_GET['item_id'];
$result = mysqli_fetch_array(mysqli_query($db,"SELECT * from items_list WHERE id = $item_id" ));
echo '<link href="css/items.css" media="screen" rel="stylesheet">';
if(isset($_SESSION['username'])) {
    echo '<div class="plr"><h2>' . $result['name'] . '</h2>
    <div class="catalog_item">
    <p>     </p>
    <div class="item_img">
        <a  rel="lightbox[portfolio]" href="' . $result['image'] . '"><img src="' . $result['image'] . '" alt="Image 10" /></a>
    </div>
    </div>
    <div class="col col_13" style="margin-right: 50px">
        <table>
            <tr>
                <td height="30">Наличие на складе: </td>
                <td>' . $result['quantity'] . '</td>
            </tr>
            <tr>
                <td> <button class="btn large_btn shadow_btn addToCart" type=button onClick="addToCart(' . $result["id"] . ')">
                            <img width="16px" src=\'./images/cart.png\'/>
                            <b style="font-size:18px ">&nbsp;' . $result['cost'] . '&#8381;</b>
                     </button>
                </td>
            </tr>
        </table>
    </div>
    <div class="cleaner h30"></div>
    <h5><strong>Описание: </strong></h5>
    <p align=" justify">' . $result['discription'] . '</p>';
}
else {
    echo '<div class="plr"><h2>' . $result['name'] . '</h2>
    <div class="catalog_item">
    <p>     </p>
    <div class="item_img">
        <a  rel="lightbox[portfolio]" href="' . $result['image'] . '"><img src="' . $result['image'] . '" alt="Image 10" /></a>
    </div>
    </div>
    <div class="col col_13" style="margin-right: 50px">
        <table>
            <tr>
                <td height="30" width="160">Цена: </td>
                <td>' . $result['cost'] . ' руб</td>
            </tr>
            <tr>
                <td height="30">Наличие на складе: </td>
                <td>' . $result['quantity'] . '</td>
            </tr>
        </table>
        <div class="cleaner h20"></div>
    </div>
    <div class="cleaner h30"></div>
    <h5><strong>Описание: </strong></h5>
    <p align=" justify">' . $result['discription'] . '</p>';
}
echo '<div class="cleaner h50"></div>
    <h4>Другие товары</h4>
    <div class="items_line">
        <div class="catalog_item">
                <div class="item_img">
                    <a href="productdetail.php?item_id='.$ritem1['id'].'"><img src="'.$ritem1['image'].'""  /></a>
                </div>    
                <div class="item_text">
                    <h3>'. $ritem1['name'].'</h3>
                    <p class="product_price">'.$ritem1['cost'].' руб</p>
                </div>
         </div>
          <div class="catalog_item">
                <div class="item_img">
                    <a href="productdetail.php?item_id='.$ritem2['id'].'"><img src="'.$ritem2['image'].'""  /></a>
                </div>    
                <div class="item_text">
                    <h3>'. $ritem2['name'].'</h3>
                    <p class="product_price">'.$ritem2['cost'].' руб</p>
                </div>
         </div>
          <div class="catalog_item">
                <div class="item_img">
                    <a href="productdetail.php?item_id='.$ritem3['id'].'"><img src="'.$ritem3['image'].'""  /></a>
                </div>    
                <div class="item_text">
                    <h3>'. $ritem3['name'].'</h3>
                    <p class="product_price">'.$ritem3['cost'].' руб</p>
                </div>
         </div>
     </div>

    <div class="cleaner"></div>
    </div>';

include "templates/content_end.php";
include "templates/footer.php";
?>