<?php
// require "../connection.php";
    if(isset($_GET['deleteid'])) {
        $pid = $_GET['deleteid'];
    $sql = "DELETE from `promos` where promo_id=$pid";
    $result = $conn->query($sql);
    if ($result) {
        echo "Delete the value Successfully";
    }
    }else {
    echo "Erorr";
    }
?>