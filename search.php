<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "functions/mysql_func.php";
include "templates/header.php";
include "templates/menu.php";
include "templates/middle.php";
include "templates/content_begin.php";
?>
<link href="css/items.css" media="screen" rel="stylesheet">
<?php
$page;
if ($_GET["page"]!= null) {$page = $_GET['page'] - 1;} else $page = 0;
$prev_page = $_GET['page'] -1;
$next_page = $_GET['page'] +1;
$items_on_page = 15;
$i_min = $page * $items_on_page;
$i_max = $i_min + $items_on_page;

$max_page_link = 5;
$search =  explode(" ",$_POST['searchText']);
$count = count($search);
$array = array();
$i = 0;
foreach ($search as $key) {
    $i++;
    if($i <$count) $array[] =  "CONCAT (`name`, `cost`) LIKE '%".$key."%' OR "; else $array[] = "CONCAT (`name`, `cost`) LIKE '%".$key."%'";
}
    $sql = "Select * From `items_list`  where ".implode("", $array);
    $query = mysqli_query($db, $sql);
$items_count = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM items_list"));
$items_count = $items_count[0];
if ($i_max >= $items_count){$next_page = 0;}

$i = 0;
$line_closed = true;
echo '<div class="block_inline right_align">
            <form class="search_dimon_with_utochka" action="./search.php" method="post">
                <input type="text" name ="searchText" required placeholder="Что искать">
                <button class="default_btn" type="submit" name = "submit">Поиск</button>
            </form>
            <button class="btn default_btn" type="submit"  class="btn-std" onclick="location.href="index.php">Очистить</button>
      </div>';
while ($result = mysqli_fetch_array($query)) {
    if($i == $i_max) break;
    if($i < $i_min) { ++$i; continue;};

    if(($i % 3) == 0) {
        echo '<div class="items_line">';
        $line_closed = false;
    }
    if(isset($_SESSION['username'])){
        echo '  <link href="css/items.css" media="screen" rel="stylesheet">';
        echo '<div class="catalog_item">
            <div class="item_img" >
                <a href="productdetail.php?item_id='.$result['id'].'"><img src="'.$result['image'].'" alt="Product 01"  /></a>
            </div>    
            <div class="item_text" id = "myUL">
                <h3>'. $result['name'].'</h3>
                <p class="product_price">'.$result['cost'].' руб</p>
				<h4><input type=button value="В корзину" onClick="addToCart('.$result["id"].')"></h4>
            </div>
        </div>';
    }
    else{
        echo '<div class="catalog_item">
            <div class="item_img">
                <a href="productdetail.php?item_id='.$result['id'].'"><img src="'.$result['image'].'" alt="Product 01"  /></a>
            </div>    
            <div class="item_text">
                <h3>'. $result['name'].'</h3>
                <p class="product_price">'.$result['cost'].' руб</p>
            </div>
        </div>';
    }
    if(($i % 3 == 2)){echo '</div>';  $line_closed = true; }
    ++$i;
}
if(  $line_closed != true) {echo '</div>';}


/*echo '<br><br>
    <div style="text-align: center">
        <div class="paging">';
if ($prev_page == 0){
    echo '<a href="#" class="paging_left_term paging_block disable"></a>';
}
else echo '<a href="index.php?page='.$prev_page.'" class="paging_left_term paging_block enable"></a>';

echo '<a href="index.php?page='.$_GET['page'].'" class="paging_block">'.$_GET['page'].'</a>';

if ($next_page == 0){
    echo '<a href="#" class="paging_right_term paging_block disable"></a>';
}
else echo '<a href="index.php?page='.$next_page.'" class="paging_right_term paging_block enable"></a>';
echo '</div>
      </div>';*/
include "templates/content_end.php";
include "templates/footer.php";
?>



