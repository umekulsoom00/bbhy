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
            <div class="col-md-6 col-lg-5 d-none d-md-block mb-5">
            
            
            
            <img id="headImage" src="img1.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">



                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x " style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">UKATLIER</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">User Profile</h5>

                  <div class="form-outline mb-4">
           
                    <label class="form-label"  for="form2Example17">Email address</label>


                    <?php  
                    include("connection.php");

                    $queryShow= mysqli_query($con,'SELECT *
                    FROM user');
$r=mysqli_fetch_array($queryShow)


                    
                    ?>
                    <br>
                    <label class="form-label"  for="form2Example17"><?php echo $r["userEmail"]?> </label>
                  </div>

                  <div class="form-outline mb-4">
                
                    <label class="form-label"  for="form2Example27">Password</label>
                    <br>
                    <label class="form-label"  for="form2Example27"><?php echo $r["userPassword"]?>  </label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button  class="btn btn-dark btn-lg btn-block    "  name="sub" > <a  href="editProfile.php?id=<?php echo $r["userId"] ?>" style="text-decoration: none; color:white;"> Edit</a></button>
                  </div>
                 
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
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



ob_end_flush();

?>