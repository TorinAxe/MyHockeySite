<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 26.05.2019
 * Time: 17:10
 */

class CatalogPage
{
    private $user;
    private $pageItems;

    function __construct($user)
    {
        $this->user = $user;
        $this->pageItems = array();
    }

    public function addItem($item)
    {
        array_push($this->pageItems, $item);
    }

    public function show()
    {
        $item = 0;
        $itemsInRow = 3;
        for($row = 0; $item < count($this->pageItems); $row++)
        {
            echo '<div class="items_line">';
            for ($colomn = 0; $colomn < $itemsInRow; $colomn++)
            {
                $itemNumber = $itemsInRow * $row + $colomn;
                if ($this->pageItems[$itemNumber]) {
                    $this->printItem($this->pageItems[$itemNumber]);
                    $item++;
                }
                else{
                    break;
                }
            }
            echo '</div>';
        }
    }

    private function printItem($item)
    {
        if (isset($_SESSION['username'])){
            echo '
                <div class="catalog_item">
                    <div class="item_img" >
                        <a href="productdetail.php?item_id=' . $item['id'] . '"><img src="' . $item['image'] . '" alt="Product 01"  /></a>
                    </div>    
                    <div class="item_text" id = "myUL">
                        <h3>' . $item['name'] . '</h3>
                            <button id="addToCartBtn" class="btn large_btn shadow_btn addToCart" type=button onClick="addToCart(' . $item["id"] . ')">
                            <img width="16px" src=\'./images/cart.png\'/>
                            <b style="font-size:18px ">&nbsp;' . $item['cost'] . '&#8381;</b>
                        </button>
                    </div>
                </div>';
        } else {
            echo '
                <div class="catalog_item">
                    <div class="item_img">
                        <a href="productdetail.php?item_id=' . $item['id'] . '"><img src="' . $item['image'] . '" alt="Product 01"  /></a>
                    </div>    
                    <div class="item_text">
                        <h3>' . $item['name'] . '</h3>
                        <p class="product_price">' . $item['cost'] . ' руб</p>
                    </div>
                </div>';
        }
    }
}