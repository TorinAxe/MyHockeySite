<?php
echo '
<div class="block_inline right_align">
    <form class="search_dimon_with_utochka"action="./search.php" method="post">
        <input id="search_edit" type="text" name ="searchText" required placeholder="Что искать">
        <button class="default_btn"type="submit" name = "submit">Поиск</button>
        <div class="line">
            <input id="filter" type="checkbox" onclick="specify_filter_handler()"> <p>Фильтр</p>
        </div>
        <div id="filter_option">
            <div class="block_250 block_inline block_left">';
                $category_list = mysqli_query($db,"Select * From items_category");
                while ($row = hasNext($category_list))
                {
                    echo '<div class="line"><input type="checkbox" id="category_'.$row['id'].'"><p>'.$row['name'].'</p></div>';
                }
                echo'
            </div>
            <div class="block_inline">
                <div class="line">
                    <p>0</p>
                    <input class="range" type="range" min="0" max="6000" oninput="range_handler(this)">
                    <p>6000</p>
                </div>
                <p id="filter_option_cost">0</p>      
            </div>
        </div>
    </form>
</div>';
?>