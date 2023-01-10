<?php
include("connection.php");

if(!empty($_POST["categoryId"]))
{
    $categoryId  = $_POST["categoryId"];
    $q = "select * from subcategory where categoryId = '".$categoryId."'";
    $r = mysqli_query($con,$q);

    while($data = mysqli_fetch_array($r))
    {
        ?>
    <option value="<?php echo $data["subcategoryId"]?>"><?php echo $data["subcategoryName"]?></option>

<?php


    }
}


?>