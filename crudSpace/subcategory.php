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
      <?php
include("navbar.php");


?>  

 
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none  d-md-block ">
              <img id="headImage" src="img1.png"
                alt="login form" class="img-fluid my-5" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" enctype=multipart/form-data>

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x " style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Add Sub Category</span>
                  </div>

             

                  <div class="form-outline mb-4">
                    <input type="text"   name="subcategoryName" id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label"  for="form2Example17">Sub Category Name</label>
                  </div>

             

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block"  name="btnSave" >Add Sub Category</button>
                  </div>

                </form>

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

if (isset($_POST['btnSave'])) {
    $subcategoryName = $_POST['subcategoryName'];
   
  
  
        
        
      
  
        if (isset($_POST['submit'])) 
        {
        //do somthing
        header("Location: subcategories.php");
        }
        
    if ($subcategoryName == "" ) {
      echo '<script>alert("Please fill the form");</script>';
    }  
    else {
  
  
      $query = mysqli_query($con, "insert into subcategory(subcategoryName) values('$subcategoryName')");
  
  
      if ($query) {
        echo '<script>alert("Sub Category Added");</script>';
  
      } else {
        echo '<script>alert ("try again");</script>';
      }
    }
  }
  ob_end_flush();
  
  ?>
