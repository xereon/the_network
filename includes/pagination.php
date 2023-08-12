<?php
    $query = "SELECT * FROM posts";
    $result = mysqli_query($connect, $query);
    // Count the total records
    $total_records = mysqli_num_rows($result);
    // Using ceil function to divide the total records per page
    $total_pages = ceil($total_records / $item_per_page);

    // Get the current page number from the query string
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Going to first page
    echo "
    <div class='pagination'>
    <a href='home.php?page=1'>First Page</a><br />
    ";

    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $page) ? 'active' : '';
        echo "<a href='home.php?page=$i' class='$active'>$i</a>";
    }

    // Going to last page
    echo "<br /><a href='home.php?page=$total_pages'>Last Page</a></div>";
?>