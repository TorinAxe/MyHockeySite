<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once "functions/mysql_func.php";
include "templates/header.php";
include "templates/menu.php";
include "templates/content_begin.php";
?>
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/MyCart.js"></script>
		<?php
        $id_items_category = $_GET['category_id'];
		$ru = mysqli_query($db, "SELECT `name` from items_category WHERE id= $id_items_category");
		$sds = mysqli_fetch_array($ru);
		echo '<h2>' . $sds['name'] . '</h2>'
		?>
		<?php
		$id_items_category = $_GET['category_id'];
        $sql = mysqli_query($db, "SELECT `id`, `name`, `cost` , `image` from items_list WHERE id_items_category = $id_items_category  ORDER  BY cost DESC ");
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
        ?>
<?php
include "templates/content_end.php";
include "templates/footer.php"
?>