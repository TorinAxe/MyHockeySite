<div id="sidebar">
    <h3>Товар по Категориям</h3>
    <ul class="sidebar_menu">
        <?php
            $category_list = mysqli_query($db,"Select * From items_category");
            while ($row = hasNext($category_list))
            {
                echo '<li><a href='.'"'.'./view_cat.php?category_id='.$row['id'].'"'.'>'.$row['name'].'</a>';
            }
        ?>
    </ul>
</div>