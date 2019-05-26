<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 26.05.2019
 * Time: 16:13
 */

class Navigator
{

    public function show($page)
    {
        $prev_page = $page - 1;
        $next_page = $page + 1;
        echo '<br><hr><br>
        <div style="text-align: center">
        <div class="paging">';
        if ($prev_page == 0) {
            echo '<a href="#" class="paging_left_term paging_block disable"></a>';
        } else echo '<a href="index.php?page=' . $prev_page . '" class="paging_left_term paging_block enable"></a>';

        echo '<a href="index.php?page=' . $_GET['page'] . '" class="paging_block">' . $_GET['page'] . '</a>';

        if ($next_page == 0) {
            echo '<a href="#" class="paging_right_term paging_block disable"></a>';
        } else echo '<a href="index.php?page=' . $next_page . '" class="paging_right_term paging_block enable"></a>';
        echo '</div>
        </div>';
    }

}