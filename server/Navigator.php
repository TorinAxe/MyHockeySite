<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 26.05.2019
 * Time: 16:13
 */

class Navigator
{
    private $totalPages;
    private $maxDisplayedPages = 5;
    function  __construct($totalPages)
    {
        $this->totalPages = $totalPages;
    }

    private function addPreviousPageButton($previousPageNumber, $disable)
    {
        if ($disable)
            echo '<a href="#" class="paging_left_term paging_block disable"></a>';
        else
            echo '<a href="index.php?page='.$previousPageNumber.'" class="paging_left_term paging_block enable"></a>';
    }

    private function addNextPageButton($nextPageNumber, $disable)
    {
        if ($disable)
            echo '<a href="#" class="paging_right_term paging_block disable"></a>';
        else
            echo '<a href="index.php?page='.$nextPageNumber.'" class="paging_right_term paging_block enable"></a>';
    }

    private function addLinkPage($pageNumber, $current){
        echo '<a href="index.php?page='.$pageNumber .'" class="paging_block">'.$pageNumber.'</a>';
    }

    public function show($page)
    {
        $prev_page = $page - 1;
        $next_page = $page + 1;

        echo '<div style="text-align: center"><div class="paging">';

        $this->addPreviousPageButton($prev_page,$prev_page == 0);
        $this->addLinkPage($page, true);
        $this->addNextPageButton($next_page, $page == $this->totalPages);

        echo '</div></div>';
    }

}