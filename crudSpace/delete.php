<?php
include ("connection.php");
$id = $_GET["id"];
$query="delete from product where productID = '$id'";

mysqli_query($con,$query);
header("Location: productTable.php");

?>