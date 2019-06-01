<link href="css/items.css" media="screen" rel="stylesheet">
<?php
include "searchfield.php";
include "server/CatalogPage.php";
include "server/Navigator.php";
include "server/SearcRequest.php";
include "server/SearchMachine.php";

function whatPage()
{
    if ($_GET["page"] != null)
    {
        return $_GET['page'];
    }
    else
    {
        return 1;
    }
}

$itemsOnPage = 15;
$page_number = 0;
$total_pages = 0;

$page_number = whatPage();

$searchText = $_GET["searchText"];
$maximumCoast = $_GET["maximumCoast"];
$catalogs = (!empty( $_GET["catalogs"])) ? implode(',', $_GET["catalogs"]) : array();
$category_id = $_GET["category_id"];

$request = new SearcRequest($searchText, $maximumCoast, $catalogs, $category_id);

$search = new SearchMachine($db, isUser());
$total_pages = $search->getPagesCount($itemsOnPage, $request);
$searchPage = $search->getPage($page_number, $itemsOnPage, $request);
$searchPage->show();

if ($total_pages == 0)
{
    echo "Шел бы ты с такими то запросами!";
    echo '<br><hr><br>';
}
else if ($total_pages > 1)
{
    echo '<br><hr><br>';
    $navigator = new Navigator($total_pages);
    $navigator->show($page_number);
}
else
{
    echo '<br><hr><br>';
}
?>
