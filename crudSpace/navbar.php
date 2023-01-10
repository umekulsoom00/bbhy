<nav id="first" class="navbar navbar-expand-sm " style="border-radius: 1rem;">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="dropdown pb-2">
      <a href="#" class=" d-flex align-items-center text-white text-decoration-none dropdown-toggle nav-link" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="img1.png" alt="hugenerd" width="40" height="40" class="rounded-circle">
        <!-- <span class=" d-none d-sm-inline mx-1 nav-link" id="txt1"></span> -->
      </a>
      <ul class="dropdown-menu text-small shadow">
      <li><a class="dropdown-item" href="profile.php"> Profile</a></li>
    
        <li><a class="dropdown-item" href="logout.php"> Log Out</a></li>
      </ul>
    </div>

    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
    
      <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)" id="txt1"> Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productTable.php" id="txt1">product  </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addProduct.php" id="txt1"> Add  </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addcategory.php" id="txt1">Category  </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="subcategory.php" id="txt1">Sub Category  </a>
        </li>
   
      </ul>
      <form class="d-flex">
        <input  name="search" class="form-control me-2" type="text" placeholder="Search">
        <button class="btn" id="btn1" name="searchbtn" >Search</button>
      </form>
    </div>
  </div>
</nav>