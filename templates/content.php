<link href="css/items.css" media="screen" rel="stylesheet">
<?php
include "searchfield.php";
include "server/SiteCatalog.php";
include "server/Navigator.php";

function whatPage()
{
    if ($_GET["page"] != null) {
        return $_GET['page'];
    } else
    {
        return 1;
    }
}

$itemsOnPage = 15;
$page_number = whatPage();
$catalog = new SiteCatalog($db, isUser());

    $total_pages = $catalog->getPagesCount($itemsOnPage);
    $catalogPage = $catalog->getPage($page, $itemsOnPage);
    $catalogPage->show();
    $navigator = new Navigator($total_pages);
    $navigator->show($page);


?>
