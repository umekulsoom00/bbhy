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
  
<section class="" style="background-color: #2E2E2E;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
      <?php
include("navbar.php");



include("connection.php");

$id = $_GET["id"];
$q = "select * from product where productId= '$id'";
$result=mysqli_query($con,$q);
while($data= mysqli_fetch_array($result))
{



?>  

 
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block pt-5">
              <img id="headImage" src="img1.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" enctype=multipart/form-data>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x " style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Update Product</span>
                  </div>

             

                  <div class="form-outline mb-4">
                    <input type="text"  value = "<?php echo $data["productName"]?>"  name="productName" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label"  for="form2Example17">Product Name</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="number"  value = "<?php echo $data["productPrice"]?>" name="productPrice" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label"  for="form2Example27">Product Price</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="number" value = "<?php echo $data["productQuantity"]?>" name="productQuantity" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label"  for="form2Example27">Product Quantity</label>
                  </div>
              
                 
    
    
    <div class="form-outline mb-4">



      <select name="category" id= "category" onchange = "categoryChange(this.value)"required  id="disabledSelect" class="form-select">
      <label  class="form-label"> Category</label>
        <option>Select Category</option>
   
                 

<br><br>
<?php
    $connection = mysqli_connect("localhost","root","","ukatlierdb");


   $queryShow= mysqli_query($connection,'SELECT * FROM category');







?>
<?php
while($r=mysqli_fetch_array($queryShow))

{
?>

<option value= "<?php echo $r["categoryId"] ?> ">

  <?php echo $r["categoryName"] ?>  

</option>

    
    <?php
}
?>
</select>
  <br>
<div class="form-outline mb-4">


  <select name="subcategory" id= "subCategory" onchange = "categoryChange(this.value)"required  id="disabledSelect" class="form-select">
  <label  class="form-label"> Sub Category</label>
    <option>Select Sub Category</option>




</select>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="file" name="productImage" id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label"  for="form2Example27">Product Image</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block"  name="btnSave" >update</button>
                  </div>

                </form>
                <?php
                    }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
<script>
  
  function categoryChange()
  {
    var category = $("#category option:selected").attr("value");

    $.ajax(
      {
        url:"ajax_subcategory.php",
        type :"post",
        data : "categoryId="+category,

        cache :false,

        success:function(html)
        {
          $("#subCategory").html(html);
        }
      }
    )
  }
</script>
<script type="text/javascript" src="jquery-3.6.3.min.js"  ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>


<?php




include("connection.php");

if (isset($_POST['btnSave'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $filename = $_FILES["productImage"]['name'];
    $tmpname = $_FILES["productImage"]['tmp_name'];
    $location="images/";
    $saveimg = $location.$filename;

    if(move_uploaded_file($tmpname,$saveimg))
    {
      $id = $_GET["id"];

      $query = " UPDATE product
      SET productName = '".$productName."', productPrice  = '".$productPrice."', productQuantity = '".$productQuantity."', productImage = '".$saveimg."',categoryId ='".$category."',subcategory ='".$subcategory."'
      WHERE productId = '".$id."'";
      
      
  
        if (isset($_POST['submit'])) 
        {
        //do somthing
        header("Location: addProduct.php");
        }
        
    if ($productName == "" || $productPrice == "" || $productQuantity == "" || $saveimg == ""  || $category == "" || $subcategory == "") {
      echo '<script>alert("Please fill the form");</script>';
    }  
    else {
  
  
      $query = mysqli_query($con, "insert into product(productName,productPrice,productQuantity,productImage,categoryId,subcategoryId)values('$productName','$productPrice','$productQuantity','$saveimg','$category','$subcategory')");
  
  
      if ($query) {
        echo '<script>alert("Product updated");</script>';
        header("Location: productTable.php");
  
      } else {
        echo '<script>alert ("try again");</script>';
      }
    }
  }
  ob_end_flush();
  }
  ?>
  
  
  
