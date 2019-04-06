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

$sql = mysqli_query($db,"SELECT `id`, `name`, `cost` , `image` from items_list ORDER  BY cost DESC " );

$items_count = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM items_list"));
$items_count = $items_count[0];
if ($i_max >= $items_count){$next_page = 0;}

$i = 0;
$line_closed = true;
echo '<div class="block_inline right_align">
            <form class="search_dimon_with_utochka"action="./search.php" method="post">
                <input type="text" name ="searchText" required placeholder="Что искать">
                <button class="default_btn"type="submit" name = "submit">Поиск</button>
            </form>
      </div>'  ;
while ($result = mysqli_fetch_array($sql)) {
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
				    <button class="btn large_btn shadow_btn" type=button onClick="addToCart('.$result["id"].')">
				    <img width="16px" src=\'./images/cart.png\'/>
				    <b style="font-size:18px ">&nbsp;'.$result['cost'].'&#8381;</b>
				</button>
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


echo '<br><hr><br>
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
      </div>';

?>
