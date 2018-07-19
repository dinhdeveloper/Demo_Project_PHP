<?php
    $sql = "SELECT COUNT(MaSanPham) as total FROM sanpham";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    $total_records = $row['total'];
    // Lấy trang hiện tại
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    // Số record trên một trang
    $limit = 6;
    $total_page = ceil($total_records / $limit);
    // Kiểm tra trang hiện tại có bé hơn 1 hay không
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    // Tìm start
    $start = ($current_page - 1) * $limit;
    $sql = "SELECT * FROM sanpham LIMIT $start, $limit";
    $result = DataProvider::ExecuteQuery($sql);
?>
<!-- đổ dữ liệu vào đây-->

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
            if ($current_page > 1 && $total_page > 1) {
                echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($current_page - 1) . '">Previous</a></li>';
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($current_page < $total_page && $total_page > 1) {
                echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($current_page + 1) . '">Next</a></li>';
            }
        ?>
    </ul>
</nav>
