<nav class="navbar navbar-expand-md bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">
     <img src="../assets/ei-icon.jpg" height="30" class="me-2">
     EI Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav ms-auto">


        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa text-primary fa-cash-register me-1"></i> Sales</a>
         <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Service</a></li>
          <li><a class="dropdown-item" href="#">Product</a></li>
          <li><a class="dropdown-item" href="#">Discounts</a></li>
          <li><a class="dropdown-item" href="#">Packages</a></li>
          <li><a class="dropdown-item" href="#">Vouchers</a></li>
          <li><a class="dropdown-item" href="#">Payments</a></li>
         </ul>
        </li>


        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa text-danger fa-users me-1"></i> Clients</a>
         <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">New</a></li>
          <li><a class="dropdown-item" href="#">Retained</a></li>
          <li><a class="dropdown-item" href="#">Referred</a></li>
          <li><a class="dropdown-item" href="#">RFM</a></li>
          <li><a class="dropdown-item" href="#">Lapsed</a></li>
          <li><a class="dropdown-item" href="#">No Show</a></li>
         </ul>
        </li>

        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa text-warning fa-user-clock me-1"></i> Staff</a>
         <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Performance</a></li>
          <li><a class="dropdown-item" href="#">Commissions</a></li>
          <li><a class="dropdown-item" href="#">Retention Rate</a></li>
          <li><a class="dropdown-item" href="#">Sales Targets</a></li>
          <li><a class="dropdown-item" href="#">Service Time</a></li>
          <li><a class="dropdown-item" href="#">Schedule</a></li>
         </ul>
        </li>

        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa text-primary fa-box-archive me-1"></i> LBO</a>
         <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="discounts.php">Discounts</a></li>
          <li><a class="dropdown-item" href="5plus1.php">5 + 1 Report</a></li>
          <li><a class="dropdown-item" href="10plus3.php">10 + 3 Report</a></li>
          <li><a class="dropdown-item" href="new-clients.php">New Clients</a></li>
          <li><a class="dropdown-item" href="sales-service.php">Service Sales</a></li>
          <li><a class="dropdown-item" href="sales-product.php">Product Sales</a></li>
         </ul>
        </li>

        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa fa-gear text-success me-1"></i> Settings</a>
         <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Branches</a></li>
          <li><a class="dropdown-item" href="#">Services</a></li>
          <li><a class="dropdown-item" href="#">Products</a></li>
          <li><a class="dropdown-item" href="#">Technicians</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Lookup</a></li>
          <li><a class="dropdown-item" href="#">Vouchers</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Users</a></li>
         </ul>
        </li>

        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa text-danger fa-user me-1"></i> <?=$ses_Fullname?> </a>
         <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#" onclick="modalpage('pwd.php','sm')">Password</a></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
         </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>