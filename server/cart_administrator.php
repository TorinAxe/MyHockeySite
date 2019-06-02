<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include 'mysql_func.php';
include "Cart.php";

$cart = new Cart($db, $_SESSION['username']);
switch ($_GET['command'])
{
    case 'addToCart':
        $itemID = $_GET['item_id'];
        if($cart->isItemInCart($itemID))
        {
            $currentCount = $cart->getItemsCountWithID($itemID);
            $currentCount++;
            $cart->updateItem($itemID, $currentCount);
        }
        else
        {
            $cart->insertItem($itemID, 1);
        }
        break;
    case 'updateCart':
        break;
    case 'showMyCart':
        $cart->show();
        break;
    case 'delFromCart':
        break;
    default:
        echo 'Unknown command';
}


?>