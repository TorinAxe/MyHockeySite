<?php
echo '
<div class="block_inline right_align">
    <form class="search_dimon_with_utochka"action="index.php" method="get">
        <input id="search_edit" type="text" name ="searchText"  placeholder="Что искать">
        <button class="default_btn"type="submit" name = "search" value="true">Поиск</button>
        <div class="line">
            <input id="filter" type="checkbox" onclick="specify_filter_handler()"> <p>Фильтр</p>
        </div>
        <div id="filter_option">
            <div class="block_250 block_inline block_left">';
                $category_list = mysqli_query($db,"Select * From items_category");
                while ($row = hasNext($category_list))
                {
                    echo '<div class="line"><input name="catalogs[]" value="'.$row['id'].'" type="checkbox" id="category_='.$row['id'].'" checked><p>'.$row['name'].'</p></div>';
                }
                $max_cost = mysqli_fetch_assoc(mysqli_query($db, "Select MAX(`cost`) as 'max_cost'from items_list"));
                $max_cost = $max_cost['max_cost'];
                $min_cost = mysqli_fetch_assoc(mysqli_query($db, "Select MIN(`cost`) as 'min_cost'from items_list"));
                $min_cost = $min_cost['min_cost'];

                echo '
            </div>
            <div class="block_inline">
                <div class="line">
                    <p>'.$min_cost.'</p>
                    <input name="maximumCoast" class="range" type="range" min="'.$min_cost.'" max="'.$max_cost.'" step="10" value="'.$max_cost.'" oninput="range_handler(this)">
                    <p>'.$max_cost.'</p>
                </div>
                <p  id="filter_option_cost">'.$max_cost.'</p>    
            </div>
        </div>
    </form>
</div>';
?>