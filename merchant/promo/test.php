<?php
// require "../connetion.php";
$conn = new mysqli("localhost", "root", "", "test") or die("Couldn't connect to database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}echo "Connected successfully";
  
if (isset($_POST['submit'])) {
    $ptitle = $_POST['ptitle'];
    $pcode = $_POST['pcode'];
    $discount = $_POST['discount'];
    $pdesc = $_POST['pdesc'];
    $ptype1 = $_POST['ptype1'];
    $ptype2 = $_POST['ptype2'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $status = $_POST['status'];
    $sql = "INSERT INTO `promo_usage` (`id`, `ptitle`, `pcode`, `date`) VALUES ('$ptitle', '$pcode', '$sdate')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: ";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="number" name="ptitle">name
        <input type="number" name="pcode">code
        <input type="date" name="sdate">date
        <input type="submit" value="submit">
    </form>
</body>

</html>