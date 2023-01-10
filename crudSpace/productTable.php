<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
  
<section class="vh-100" style="background-color: #2E2E2E;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="d-none d-md-block">
         

            <?php
include("navbar.php");


    $connection = mysqli_connect("localhost","root","","ukatlierdb");

   $queryShow= mysqli_query($connection,'SELECT *
   FROM product
   INNER JOIN category
   ON product.categoryId = category.categoryId;'
   );


   $queryShow2= mysqli_query($connection,'SELECT *
   FROM product
   INNER JOIN subcategory
   ON product.subcategoryId = subcategory.subcategoryId;'
   );

?>  


<div class="d-flex text-align-center align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x " style="color: #ff6219; padding-left:360px;"></i>
                    <span class="h1 fw-bold mb-0">Product Table</span>
                  </div>

            
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Category</th>
      <th scope="col">sub Category</th>
      <th scope="col">update</th>
      <th scope="col">delete</th>
    </tr>
  </thead>

  <?php



while($r=mysqli_fetch_array($queryShow))


while($r2=mysqli_fetch_array($queryShow2))

{ 
?>

<tr class="record" >
    
    <td class="record" ><?php echo $r["productId"] ?></td>
    <td class="record"><?php echo $r["productName"]?></td>
    <td class="record"><?php echo $r["productPrice"]?></td>
    <td class="record"><?php echo $r["productQuantity"]?></td>

    <td class=" record"><img class="rec" src=" <?php echo $r["productImage"]?> " alt=""  height="70px" width="70px"> </td>
  
    <td class="record"><?php echo $r["categoryName"]?></td>
      
    <td class="record"><?php echo $r2["subcategoryName"]?></td>
    <td>

    <form class="d-flex">
       
        <button class="btn" id="btn1" >   <a class="del" href="update.php?id= <?php echo $r["productId"] ?> " style="height:20px; width:25px; text-decoration: none; color:white;"> Update </a></button>
  <form>
</td>
<td>
  <form>
        <button class="btn" id="btn1" >    <a class="del" href="delete.php?id= <?php echo $r["productId"] ?>" style="height:20px; width:25px; text-decoration: none; color:white;" > delete </a></button>
      </form>

</td>
    
    
</tr>
<?php
}


?>


</table>


<?php
ob_start();

// if (isset($_POST["searchbtn"])) {
// 	$str = $_POST["search"];
// 	$sth = $con->prepare("SELECT * FROM `product` WHERE productName = '$str'");

// 	$sth->setFetchMode(PDO:: FETCH_OBJ);
// 	$sth -> execute();

// 	if($row = $sth->fetch())
// 	{
// 		
?>
<!-- // 		<br><br><br>
// 		<table>
// 			<tr>
// 				<th>Name</th>
// 				<th>Description</th>
// 			</tr>
// 			<tr>
// 				<td>
  <?php
   // echo $row->productName; 
   ?>
</td>
// 				<td>
  <?php 
 
 //echo $row->Description;
  ?>
</td>
// 			</tr>

// 		</table> -->
<?php 
// 	}
		
		
// 		else{
// 			echo "Name Does not exist";
// 		}


// }








if(isset($_POST['btnSave']))
{

    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];

    $filename = $_FILES["productImage"]['name'];
    $tmpname = $_FILES["productImage"]['tmp_name'];
    $location="images/";
    $saveimg = $location.$filename;
    $category = $_POST['category'];
    if(move_uploaded_file($tmpname,$saveimg))
    {

        $queryInsert= 'INSERT INTO product(productName,productPrice,productQuantity,productImage,categoryId) VALUES("'.$productName.'" , "'.$productPrice.'", "'.$productQuantity.'","'.$saveimg.'",,"'.$category.'")';
        $insertQuery= mysqli_query($con,$queryInsert);
        
        
        
        
      

        if (isset($_POST['submit'])) 
        {
        //do somthing
        header("Location: adminBoard.php");
        }
        
     //   if($insertQuery){
            
       //     echo "done";
         //   header("Location: $current_url");
           // header("Location:registration.php");
        //}
    }

    if(isset($_POST['btndelete']))
    {
      $id = $_POST['uid'];
      $delete = mysqli_query($con,"delete from product where productID = '$id'");
  
    }
    

}
ob_end_flush();

?>



            </div>
        </div>
    </div>













            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

       

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>


<?php




include("connection.php");


ob_end_flush();

?>